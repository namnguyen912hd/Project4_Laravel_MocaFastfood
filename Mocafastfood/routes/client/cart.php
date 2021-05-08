<?php 




	// CART

Route::prefix('MocaFastfood')->group(function () {
	
	Route::get('/addToCart/{id}', [
		'as' => 'Mocafastfood.addToCart',
		'uses' => 'home\CartController@addToCart'
	]);

	Route::get('/showCart', [
		'as' => 'Mocafastfood.showCart',
		'uses' => 'home\CartController@showCart'
	]);

	Route::get('/updateCart', [
		'as' => 'Mocafastfood.updateCart',
		'uses' => 'home\CartController@updateCart'
	]);

	Route::get('/deleteCart', [
		'as' => 'Mocafastfood.deleteCart',
		'uses' => 'home\CartController@deleteCart'
	]);

	
});








?>