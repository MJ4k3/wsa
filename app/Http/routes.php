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

Route::get('/', 'HomeController@index');
Route::get('/taylor', 'PageController@taylor');
Route::auth();
Route::get('/list' , 'ListController@index') ;
Route::post('/list' , 'ListController@store');
Route::get('/home', 'HomeController@index');
Route::get('social/login/redirect/facbook', ['uses' => 'Auth\AuthController@redirectToProvider', 'as' => 'social.login']);
Route::get('social/login/facebook', 'Auth\AuthController@handleProviderCallback');
Route::get('/search' , 'HomeController@public_search');
Route::post('/add/date/{id}' , 'BookingController@add_cart');
Route::get('/cart/{id}' , 'BookingController@index_cart');
Route::get('/add/date/{id}' , 'BookingController@add_book');
Route::delete('/cart/delete/{id}' ,'BookingController@del_book');
Route::post('/cart/checkout/{id}' , 'BookingController@checkout');
Route::get('/checkout/success/', 'BookingController@success');
Route::get('/setting/booking' ,'HomeController@booking');

Route::get('social/login/{provider}', 'Auth\AuthController@handleProviderCallback');
Route::group(['prefix' => 'admin' ] , function(){
    Route::get('/' , 'AdminController@index');
    Route::get('/merchant' , 'AdminController@merchant');
    Route::get('/merchant/edit/{id}' , 'MerchantController@edit');
    Route::post('/merchant/{id}' , 'MerchantController@update');
    Route::delete('/merchant/{id}' , ['uses'=>'MerchantController@destroy', 'as' => 'merchant.destroy']);
    Route::get('/category', 'AdminController@Category');
    Route::post('/category/add' , 'AdminController@add_cat');
    Route::delete('/category/{id}' , 'AdminController@del_cat');
    Route::get('/user' , 'AdminController@user_list');
    Route::get('/product','AdminController@product');
    Route::post('/product' , 'ProductController@store');
    Route::get('/booking' , 'AdminController@booking');
    Route::get('/booking/{type}/{id}' , 'AdbookController@status');
});
Route::get('/{id}' , 'MerchantController@show');
