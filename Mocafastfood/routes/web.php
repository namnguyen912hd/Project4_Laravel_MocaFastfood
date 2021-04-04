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


	// source Admin_Route: routes/admin/

});

// Route Home Page

Route::prefix('MocaFastfood')->group(function () {

	Route::get('/', [
		'as' => 'Mocafastfood.index',
		'uses' => 'HomeController@index'
	]);

	Route::get('/getProducts/{id}', [
		'as' => 'Mocafastfood.products',
		'uses' => 'HomeController@getProductsbyCate'
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

});
