<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->get('users', 'UsersController@index');
    $router->get('users/{id}', 'UsersController@show');
    $router->get('users/{id}/edit', 'UsersController@edit');

    $router->get('categories/', 'CategoriesController@index');
    $router->get('categories/create', 'CategoriesController@create');
    $router->get('categories/{id}', 'CategoriesController@show');
    $router->get('categories/{id}/edit', 'CategoriesController@edit');
    $router->get('api/categories', 'CategoriesController@apiIndex');
    $router->post('categories', 'CategoriesController@store'); # 添加数据提交按钮


    $router->get('audit', 'AuditProductController@index'); # 商品审核
    $router->get('audi/{id}/edit', 'AuditProductController@edit'); # 商品审核
    $router->get('audit/{id}', 'AuditProductController@show'); # 商品审核


    $router->resource('audit', AuditProductController::class);
    $router->resource('products', ProductsController::class);
    $router->resource('shops', ShopController::class);




});
