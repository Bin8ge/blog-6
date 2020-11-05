<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\UserOrder;
use App\Services\OrderService;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\UserAddress;
use App\Models\Order;

class OrdersController extends Controller
{
    public function store(Request $request,OrderService $orderService)
    {

        $user  = $request->user();
        $userAddress  = UserAddress::find($request->input('address_id'));
        return $orderService->addOrder($user,$userAddress,$request->input('remark'),$request->input('items'),$request->input('shop_id'));

    }


    public function index(Request $request)
    {
        $OrderId = UserOrder::query()->where('user_id',$request->user()->id)->get();
        $OrderInfo = [];
        foreach ($OrderId as $key => $values) {
            $orders = Order::query()->where('id',$values->order_id)->first()->toArray();
            $OrderInfo[$key]['order'] = $orders;
            $OrderItems = OrderItem::query()->where('order_id',$orders['id'])->get()->toArray();
            foreach ($OrderItems as $keys => $value) {
                $products = Product::query()->with('skus')->where('id',$value['product_id'])->first()->toArray();
                $OrderInfo[$key]['order']['items'][$keys] = $value;
                $OrderInfo[$key]['order']['items'][$keys]['product'] = $products;
            }
            dd($OrderInfo);
        }
    }
}
