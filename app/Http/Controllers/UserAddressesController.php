<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAddressesController extends Controller
{
    public function index(Request $request)
    {
        return view('member.memberAddress',[
            'addresses' => $request->user()->addresses,
        ]);
    }
}
