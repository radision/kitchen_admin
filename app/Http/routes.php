<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('/home', 'HomeController@index');

// 商户
Route::get('/merchant', 'MerchantController@index');
Route::get('/merchant/create', 'MerchantController@create');
Route::post('/merchant/create', 'MerchantController@save');
Route::get('/merchant/edit/{id}', 'MerchantController@edit');
Route::post('/merchant/edit/{id}', 'MerchantController@update');

//商品
Route::get('/goods', 'GoodsController@index');
Route::get('/goods/create', 'GoodsController@create');
Route::post('/goods/create', 'GoodsController@save');
Route::get('/goods/edit/{id}', 'GoodsController@edit');
Route::post('/goods/edit/{id}', 'GoodsController@update');

// 订单
Route::get('/order', 'OrderController@index');
Route::get('/order/detail/{id}', 'OrderController@detail');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
