<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
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
}
