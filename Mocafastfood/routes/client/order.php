<?php 




	// -----Route product on HomePage

Route::prefix('MocaFastfood')->group(function () {
	
	Route::post('/addOrder', [
		'as' => 'Mocafastfood.addOrder',
		'uses' => 'home\OrderController@addOrder',

	]);

	Route::get('/orderStatus', [
		'as' => 'Mocafastfood.orderStatus',
		'uses' => 'home\OrderController@getorderStatus',

	]);

	Route::get('/orderHistory', [
		'as' => 'Mocafastfood.orderHistory',
		'uses' => 'home\OrderController@getorderHistory',

	]);

	Route::get('/orderDetailHome/{id}', [
		'as' => 'Mocafastfood.orderDetailHome',
		'uses' => 'home\OrderController@getOrderDetail',

	]);
});




?>
