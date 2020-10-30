<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\AddCartRequest;
use App\Services\CartService;


class CartController extends Controller
{

    protected  $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService =$cartService;
    }

    /**
     * Notes:购物车新增
     * User: bingo
     * Date: 2020/10/27
     * Time: 14:18
     * @param AddCartRequest $request
     * @return array
     */
    public function add(AddCartRequest $request)
    {
        $skuId  = $request->input('sku_id');
        $amount = $request->input('num');

        // 从数据库中查询该商品是否已经在购物车中
        $this->cartService->add($skuId,$amount);

        return [];
    }

    public function index(Request $request)
    {
        $cartItems = $this->cartService->get();

        $addresses = $request->user()->addresses()->orderBy('last_used_at','desc')->get();

        return view('products.cart',['cartItems' => $cartItems,'addresses'=>$addresses]);
    }

    public function remove(Product $sku,Request $request)
    {
        $this->cartService->remove($sku->id);
        return [];
    }
}
