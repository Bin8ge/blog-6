<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('wxcode', 'WeChateController@wxcode');
Route::get('wxtoken', 'WeChateController@wxtoken');

Route::get('wechat/auth', function(){
    $wechat = session('wechat.oauth_user.default'); //拿到授权用户资料
    var_dump($wechat);
    dd($wechat); //打印出授权用户资料
})->middleware('Auth.WeChat');




Route::auth();
Route::redirect('login','/WeChat')->name('wechat');
Route::redirect('/','/index')->name('root');





Route::get('WeChat','WeChatController@auth')->middleware('Auth.WeChat')->name('Login.WeChat');
//商品的列表 or 商城首页  不登录也能访问
Route::get('index','ProductController@index')->name('products.index');
Route::post('uploadFile','UploadsController@uploadImg')->name('admin.uploadImg');

Route::group(['middleware'=> ['auth']],function(){
    //商品的详情页路由
    Route::get('products/{product}','ProductController@show')->name('products.show');
    Route::post('cart','CartController@add')->name('cart.add');
    Route::get('cart','CartController@index')->name('cart.index');

    //收货地址相关路由
    Route::get('user_addresses','UserAddressesController@index')->name('user.addresses');
    Route::get('orders','OrdersController@store')->name('orders.store');
    Route::post('orders', 'OrdersController@store')->name('orders.add');
    Route::get('orderList', 'OrdersController@index')->name('orders.index');
});


