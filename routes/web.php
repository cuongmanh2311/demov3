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
Route::get('/','HomeController@index');

Route::group(['prefix'=>'products'],function(){
	Route::get('/','ProductsController@index');
	Route::get('/show/{id}','ProductsController@show');
	Route::post('/store','ProductsController@store');
	Route::post('/update','ProductsController@update');
	Route::get('/destroy/{id}','ProductsController@destroy');
	Route::get('/search','ProductsController@search');
	Route::get('/cate_product','ProductsController@cate_product');
	Route::get('/paging','ProductsController@paging');
	Route::get('/soft_cate','ProductsController@soft_cate');
});

Route::group(['prefix'=>'categories'],function(){
	Route::get('/','CategoriesController@index');
	Route::get('/show/{id}','CategoriesController@show');
	Route::post('/store','CategoriesController@store');
	Route::post('/update','CategoriesController@update');
	Route::get('/destroy/{id}','CategoriesController@destroy');
	Route::get('/search','CategoriesController@search');
	Route::get('/parent','CategoriesController@parent');
	// Route::get('/cate_product','CategoriesController@cate_product');
	// Route::get('/paging','CategoriesController@paging');
});

Route::group(['prefix'=>'users'],function(){
	Route::get('/','UsersController@index');
	Route::get('/show/{id}','UsersController@show');
	Route::post('/login','UsersController@login');
	Route::post('/store','UsersController@store');
	Route::post('/update','UsersController@update');
	Route::get('/destroy/{id}','UsersController@destroy');
	Route::get('/search','UsersController@search');
	Route::get('/permission','UsersController@permission');
	Route::get('/user_permission','UsersController@user_permission');
});

Route::group(['prefix'=>'permission'],function(){
	Route::get('/','PermissionController@index');
	Route::get('/show/{id}','PermissionController@show');
	Route::post('/store','PermissionController@store');
	Route::post('/update','PermissionController@update');
	Route::get('/destroy/{id}','PermissionController@destroy');
});

Route::group(['prefix'=>'rent'],function(){
	Route::get('/','RentController@index');
	Route::get('/show/{id}','RentController@show');
	Route::post('/store','RentController@store');
	Route::post('/update','RentController@update');
	Route::get('/destroy/{id}','RentController@destroy');
	Route::get('/user','RentController@get_user_rent');
	Route::get('/user_rent','RentController@get_rent');
	Route::get('/pro','RentController@get_rent_pro');
	route::get('/status','RentController@get_status');
});

Route::group(['prefix'=>'bills'],function(){
	Route::get('/','BillsController@index');
	Route::post('/store','BillsController@store');
	Route::post('/update','BillsController@update');
	Route::get('/destroy/{id}','BillsController@destroy');
	route::get('/user','BillsController@get_bill_user');
});

Route::group(['prefix'=>'bill_detail'],function(){
	Route::get('/','BillsController@get_detail');
	Route::post('/store','BillsController@store_detail');
	Route::get('/destroy','BillsController@destroy_detail');
	Route::get('/pro','BillsController@get_detail_pro');
});
