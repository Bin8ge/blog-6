<?php
namespace App\Services;

use App\Exceptions\InternalException;
use App\libraries\pdo;
use App\Models\User;
use App\Models\UserAddress;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderService
{
   public $Order;  //订单表相关信息


    protected $db1;
    protected $db2;
    protected $db3;

    public function __construct()
    {
        $this->Order = $this->TableOrderId();
        $this->db1 = new pdo('192.168.1.87', 'root', 'root123', 'lms');
        $this->db2 = new pdo('192.168.1.87', 'root', 'root123', 'lms_products');
        $this->db3 = new pdo('192.168.1.87', 'root', 'root123', 'lms_orders');




    }


    /**
     * Notes:
     * User: bingo
     * Date: 2020/10/29
     * Time: 19:16
     * @param User $user
     * @param UserAddress $userAddress
     * @param $remark
     * @param $items
     * @param $shop
     * @return array
     * @throws InternalException
     */
    public function addOrder(User $user, UserAddress $userAddress, $remark, $items, $shop)
    {
        $XA1 = uniqid('', true);
        $XA2 = uniqid('', true);
        $XA3 = uniqid('', true);

        #开启事务
        $this->Start($XA1, $XA2, $XA3);

        try {
            $userAddressRestful = $this->userAddress($userAddress);
            $orderRestful = $this->commitOrder($user, $userAddress, $remark);


            $totalAmount = 0;

            foreach ($items as $data) {
                //查询商品sku
                $ProductSkuData = [
                    'table' => 'lms_product_skus',
                    'field' => 'id,price,product_id,stock',
                    'where' => 'id ='.$data['sku_id'],
                ];
                $ProductRestful = $this->db2->getOne($ProductSkuData);

                //拆分订单到订单详情
                $OrderItemsData = [
                    'table' => 'lms_order_items'.$this->Order['random'],
                    'data' => [
                        'order_id' => $this->Order['id'],
                        'product_id' => $ProductRestful['product_id'],
                        'product_sku_id' => $data['sku_id'],
                        'amount' => $data['amount'],
                        'price' => $ProductRestful['price'],
                    ]
                ];

                $OrderItemsRestful = $this->db3->add($OrderItemsData);

                if (!in_array($OrderItemsRestful, [0, 1], true)) {
                    throw new InternalException('订单详情新增失败', 102);
                }

                $totalAmount += $ProductRestful['price'] * $data['amount'];

                //更新库存
                if (!($ProductRestful['stock'] <= $data['amount'])) {
                    $stock_amount = $ProductRestful['stock'] - $data['amount'];

                    $StockData = [
                        'table' => 'lms_product_skus',
                        'data' => [
                            'stock' => $stock_amount
                        ],
                        'where' => 'id = ' .$data['sku_id']
                    ];

                    $StockRestful = $this->db2->update($StockData);
                    if (!in_array($StockRestful, [0,1], true)) {
                        throw new InternalException('更新库存失败', 103);
                    }
                }else{
                    throw new InternalException('该商品库存不足', 104);
                }
            }

            //更新订单总金额
            $totalAmountData = [
                'table' => 'lms_orders'.$this->Order['random'],
                'data' => [
                    'total_amount' => $totalAmount
                ],
                'where' => 'id = '.$this->Order['id']
            ];

            $OrderAmountRestful = $this->db3->update($totalAmountData);
            if (!in_array($OrderAmountRestful, [0,1], true)) {
                throw new InternalException('更新订单总金额失败', 105);
            }

            $this->UserOrder($user);
            $this->ShopOrder($shop);




            //阶段1：事务停止准备提交
            $this->End($XA1, $XA2, $XA3);
            $this->Prepare($XA1, $XA2, $XA3);

            //阶段2：提交
            $this->Commit($XA1, $XA2, $XA3);
        } catch (\Exception $e) {

            //阶段1：事务停止准备回滚
            $this->End($XA1, $XA2, $XA3);
            $this->Prepare($XA1, $XA2, $XA3);
            //阶段2：回滚
            $this->Rollback($XA1, $XA2, $XA3);
            die('Exception:' . $e->getMessage());
        }
        return ['id' => $this->Order['id'],'table'=>'lms_orders'.$this->Order['random']];
    }



    /**
     * Notes: 订单id 生成
     * User: bingo
     * Date: 2020/10/29
     * Time: 18:15
     * @return array
     * @throws \Exception
     */
    public function TableOrderId()
    {
        $data = Carbon::now()->timestamp.now()->micro;
        $userId = Auth::user()->id;
        $random = str_pad(random_int(0,999999),6,0,STR_PAD_LEFT);
        return ['id' =>$data.$userId.$random,'random'=>$random%32];
    }


    /**
     * Notes:订单编号  生成
     * User: bingo
     * Date: 2020/10/29
     * Time: 18:36
     * @return bool|string
     */
    public function findAvailableNo()
    {
        $prefix = date('YmdHis');

        for( $i = 0; $i < 10; $i++){
            try {
                return $prefix . str_pad(random_int(0, 999999), 6, 0, STR_PAD_LEFT);
            } catch (\Exception $e) {
            }
        }
         log::warning('find order no failed');

        return false;
    }


    public function commitOrder($user,$address,$remark)
    {
        $OrderData = [
            'table' => 'lms_orders'. $this->Order['random'],
            'data'  => [
                'id'      => $this->Order['id'],
                'no'      => $this->findAvailableNo(),
                'user_id' => $user->id,
                'address' => json_encode([
                    'address' => $address->full_address,
                    'zip' => $address->zip,
                    'contact_name' => $address->contact_name,
                    'contact_phone' => $address->contact_phone,
                ], JSON_THROW_ON_ERROR, 512),
                'remark' => $remark,
                'total_amount' =>0,
            ],
        ];
        $OrderRestful = $this->db3->add($OrderData);
        if (!$OrderRestful || !in_array($OrderRestful, [0, 1], true)) {
            throw new InternalException('订单数据的生成出现异常',101);
        }
        return true;
    }


    /**
     * Notes:修改用户收货地址 最后一次使用的时间
     * User: bingo
     * Date: 2020/10/29
     * Time: 18:46
     * @param $userAddress
     * @return bool
     * @throws InternalException
     */
    public function userAddress($userAddress)
    {
        $userAddressData = [
            'table' => 'lms_user_address',
            'data'  => [
                'last_used_at' => Carbon::now()
            ],
            'where' =>'id = '.$userAddress->id,
        ];

        $userAddressRestful = $this->db1->update($userAddressData);

        if (!$userAddressRestful || !in_array($userAddressRestful, [0, 1], true)) {
            throw new InternalException('修改地址回收错误',100);
        }
        return true;
    }


    /**
     * Notes: 用户订单索引
     * User: bingo
     * Date: 2020/10/30
     * Time: 21:12
     * @param $user
     * @return bool
     * @throws InternalException
     */
    public function UserOrder($user)
    {
        $random = $user->id % 32;

        $data = [
            'table' => 'lms_user_orders'.$random,
            'data' => [
                'user_id' => $user->id,
                'order_id' => $this->Order['id']
            ]
        ];

        $UserOrderRestful = $this->db3->add($data);
        if (!in_array($UserOrderRestful, [0, 1], true)) {
            throw new InternalException('新增用户订单索引错误！',106);
        }else{
            return true;
        }
    }

    /**
     * Notes:商家订单索引
     * User: bingo
     * Date: 2020/10/30
     * Time: 21:13
     * @param $shopId
     * @return bool
     * @throws InternalException
     */
    public function ShopOrder($shopId)
    {
        $random = $shopId% 32;

        $data = [
            'table' => 'lms_shop_orders'.$random,
            'data' => [
                'shop_id' => $shopId,
                'order_id' => $this->Order['id']
            ]
        ];

        $UserOrderRestful = $this->db3->add($data);
        if (!in_array($UserOrderRestful, [0, 1], true)) {
            throw new InternalException('新增商家订单索引错误！',107);
        }else{
            return true;
        }
    }

    /**
     * Notes:XA 开始事务
     * User: bingo
     * Date: 2020/10/29
     * Time: 18:46
     * @param $XA1
     * @param $XA2
     * @param $XA3
     */
    public function Start($XA1,$XA2,$XA3)
    {
        $this->db1->exec("XA START '$XA1'");//准备事务1
        $this->db2->exec("XA START '$XA2'");//准备事务2
        $this->db3->exec("XA START '$XA3'");//准备事务3
    }

    /**
     * Notes:提交事务
     * User: bingo
     * Date: 2020/10/29
     * Time: 19:20
     * @param $XA1
     * @param $XA2
     * @param $XA3
     */
    public function Commit($XA1,$XA2,$XA3)
    {
        $this->db1->exec("XA COMMIT '$XA1'");
        $this->db2->exec("XA COMMIT '$XA2'");
        $this->db3->exec("XA COMMIT '$XA3'");

    }

    /**
     * Notes:回滚事务
     * User: bingo
     * Date: 2020/10/29
     * Time: 19:20
     * @param $XA1
     * @param $XA2
     * @param $XA3
     */
    public function Rollback($XA1,$XA2,$XA3)
    {
        $this->db1->exec("XA ROLLBACK '$XA1'");
        $this->db2->exec("XA ROLLBACK '$XA2'");
        $this->db3->exec("XA ROLLBACK '$XA3'");
    }

    /**
     * Notes:结束事务
     * User: bingo
     * Date: 2020/10/29
     * Time: 19:22
     * @param $XA1
     * @param $XA2
     * @param $XA3
     */
    public function End($XA1,$XA2,$XA3)
    {
        $this->db1->exec("XA END '$XA1'");
        $this->db2->exec("XA END '$XA2'");
        $this->db3->exec("XA END '$XA3'");
    }

    /**
     * Notes:事务 准备
     * User: bingo
     * Date: 2020/10/29
     * Time: 19:23
     * @param $XA1
     * @param $XA2
     * @param $XA3
     */
    public function Prepare($XA1,$XA2,$XA3)
    {
        $this->db1->exec("XA PREPARE '$XA1'");
        $this->db2->exec("XA PREPARE '$XA2'");
        $this->db3->exec("XA PREPARE '$XA3'");
    }
}
