<?php
namespace App\Services;

use  App\Models\CartItem;
use Illuminate\Support\Facades\Auth;


class CartService
{
    /**
     * Notes:获取
     * User: bingo
     * Date: 2020/10/27
     * Time: 14:41
     * @return mixed
     */
    public function get()
    {
        return Auth::user()->cartItems()->with(['productSku.product','productSku.product.shop'])->get();
    }

    /**
     * Notes:添加
     * User: bingo
     * Date: 2020/10/27
     * Time: 14:41
     * @param $skuId
     * @param $amount
     * @return CartItem
     */
    public function add($skuId,$amount)
    {
        $user = Auth::user();
        if ($cart = $user->cartItems()->where('product_sku_id', $skuId)->first()){
            // 如果存在则直接叠加商品数量
            $cart->update([
                'amount' =>  $amount,
            ]);
        }else {
            // 否则创建一个新的购物车记录
            $cart = new CartItem(['amount' => $amount]);
            $cart->user()->associate($user);
            $cart->productSku()->associate($skuId);
            $cart->save();
        }

        return $cart;
    }

    /**
     * Notes:移除
     * User: bingo
     * Date: 2020/10/27
     * Time: 14:41
     * @param $skuId
     */
    public function remove($skuId)
    {
        if(!is_array($skuId)){
            $skuId = [$skuId];
        }
        Auth::user()->cartItems()->whereIn('product_sku_id',$skuId)->delete();

    }
}
