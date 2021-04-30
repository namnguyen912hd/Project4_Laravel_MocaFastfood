<?php

use Illuminate\Support\Facades\Route;

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

// Route Log In

Route::get('/', 'AdminController@login')->name('login');
Route::post('/', 'AdminController@postLogin');



// Route Admin Page

Route::prefix('adminMoca')->group(function () {

	Route::get('/', function () {
		return view('adminPage');
	});

	Route::prefix('setting')->group(function () {
		Route::get('/', [
			'as' => 'settings.index',
			'uses' => 'SettingController@index'
		]);

		Route::get('/create', [
			'as' => 'settings.create',
			'uses' => 'SettingController@create'
		]);

		Route::post('/store', [
			'as' => 'settings.store',
			'uses' => 'SettingController@store'
		]);

		Route::get('/edit/{id}', [
			'as' => 'settings.edit',
			'uses' => 'SettingController@edit'
		]);

		Route::post('/update/{id}', [
			'as' => 'settings.update',
			'uses' => 'SettingController@update'
		]);

		Route::get('/delete/{id}', [
			'as' => 'settings.delete',
			'uses' => 'SettingController@delete'
		]);
	});

	// source Admin_Route: routes/admin/
	
	// route Order in admin
	
	Route::prefix('orders')->group(function () {
		Route::get('/', [
			'as' => 'orders.index',
			'uses' => 'OrderController@index'
		]);

		Route::get('/getOrderDetail/{id}', [
			'as' => 'orders.getOrderDetail',
			'uses' => 'OrderController@getOrderDetail'
		]);

		Route::get('/confirmOrder/{id}', [
			'as' => 'orders.confirmOrder',
			'uses' => 'OrderController@confirmOrder'
		]);

		

		Route::get('/delete/{id}', [
			'as' => 'orders.delete',
			'uses' => 'OrderController@deleteOrder'
		]);

		// route shiper
		Route::get('/getOrderShipping', [
			'as' => 'orders.getOrderShipping',
			'uses' => 'OrderController@getOrderShipping'
		]);

		Route::get('/boomOrder/{id}', [
			'as' => 'orders.boomOrder',
			'uses' => 'OrderController@boomOrder'
		]);

		Route::get('/deliveredOrder/{id}', [
			'as' => 'orders.deliveredOrder',
			'uses' => 'OrderController@deliveredOrder'
		]);




	});


});

// Route Home Page

Route::prefix('MocaFastfood')->group(function () {

	Route::get('/', [
		'as' => 'Mocafastfood.index',
		'uses' => 'HomeController@index'
	]);

	Route::get('/about', [
		'as' => 'Mocafastfood.about',
		'uses' => 'HomeController@about'
	]);

	Route::get('/getProducts/{id}', [
		'as' => 'Mocafastfood.products',
		'uses' => 'HomeController@getProductsbyCate'
	]);

	Route::get('/shopping', [
		'as' => 'Mocafastfood.shopping',
		'uses' => 'HomeController@shopping'
	]);

	Route::get('/ProductsDetail/{id}', [
		'as' => 'Mocafastfood.productdetail',
		'uses' => 'HomeController@getProductDetail'
	]);

	Route::get('/addToCart/{id}', [
		'as' => 'Mocafastfood.addToCart',
		'uses' => 'HomeController@addToCart'
	]);

	Route::get('/showCart', [
		'as' => 'Mocafastfood.showCart',
		'uses' => 'HomeController@showCart'
	]);

	Route::get('/updateCart', [
		'as' => 'Mocafastfood.updateCart',
		'uses' => 'HomeController@updateCart'
	]);

	Route::get('/deleteCart', [
		'as' => 'Mocafastfood.deleteCart',
		'uses' => 'HomeController@deleteCart'
	]);

	Route::get('/getProductsbyTag/{id}', [
		'as' => 'Mocafastfood.getProductsbyTag',
		'uses' => 'HomeController@getProductsbyTag'
	]);

	// route log in
	Route::get('/LogIn', [
		'as' => 'Mocafastfood.LogIn',
		'uses' => 'HomeController@LogIn'
	]);

	Route::post('/LogIn', [
		'as' => 'Mocafastfood.postLogIn',
		'uses' => 'HomeController@postLogIn'
	]);

	// route sign up
	Route::get('/SignUp', [
		'as' => 'Mocafastfood.SignUp',
		'uses' => 'HomeController@SignUp'
	]);

	Route::post('/SignUp', [
		'as' => 'Mocafastfood.postSignUp',
		'uses' => 'HomeController@postSignUp'
	]);

	// route log out
	Route::get('LogOut', [
		'as' => 'Mocafastfood.LogOut',
		'uses' => 'HomeController@LogOut'
	]);

	// route account
	Route::get('/Account', [
		'as' => 'Mocafastfood.Account',
		'uses' => 'HomeController@showAccount'
	]);

	Route::post('/updateAccount/{id}', [
		'as' => 'Mocafastfood.updateAccount',
		'uses' => 'HomeController@updateAccount'
	]);

	// route order
	Route::post('/addOrder', [
		'as' => 'Mocafastfood.addOrder',
		'uses' => 'HomeController@addOrder',

	]);

	Route::get('/orderStatus', [
		'as' => 'Mocafastfood.orderStatus',
		'uses' => 'HomeController@getorderStatus',

	]);

	Route::get('/orderHistory', [
		'as' => 'Mocafastfood.orderHistory',
		'uses' => 'HomeController@getorderHistory',

	]);

	Route::get('/orderDetailHome/{id}', [
		'as' => 'Mocafastfood.orderDetailHome',
		'uses' => 'HomeController@getOrderDetail',

	]);

});
