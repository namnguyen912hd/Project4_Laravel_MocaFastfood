<?php 

Route::prefix('adminMoca/orders')->group(function () {
		Route::get('/', [
			'as' => 'orders.index',
			'uses' => 'admin\OrderController@index'
		]);

		Route::get('/getOrderDetail/{id}', [
			'as' => 'orders.getOrderDetail',
			'uses' => 'admin\OrderController@getOrderDetail'
		]);

		Route::get('/confirmOrder/{id}', [
			'as' => 'orders.confirmOrder',
			'uses' => 'admin\OrderController@confirmOrder'
		]);

		

		Route::get('/delete/{id}', [
			'as' => 'orders.delete',
			'uses' => 'admin\OrderController@deleteOrder'
		]);

		// route shiper
		Route::get('/getOrderShipping', [
			'as' => 'orders.getOrderShipping',
			'uses' => 'admin\OrderController@getOrderShipping'
		]);

		Route::get('/boomOrder/{id}', [
			'as' => 'orders.boomOrder',
			'uses' => 'admin\OrderController@boomOrder'
		]);

		Route::get('/deliveredOrder/{id}', [
			'as' => 'orders.deliveredOrder',
			'uses' => 'admin\OrderController@deliveredOrder'
		]);

	});



 ?>