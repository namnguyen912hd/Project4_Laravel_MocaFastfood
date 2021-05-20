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

	Route::get('/', [

		'as' => 'adminMoca.chart',
		'uses' => 'AdminController@drawChart'
		//echo 'namng';
		//return redirect()->to('adminMoca.chart');
	]);

	Route::get('/chart', [
		'as' => 'adminMoca.chart',
		'uses' => 'AdminController@drawChart'
	]);

	// source Admin_Route: routes/admin/
	
	// route Order in admin
	
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

	// source Admin_Home: routes/client/

	
});
