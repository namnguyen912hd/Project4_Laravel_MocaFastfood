<?php 

// ---- Route Product
	Route::prefix('adminMoca/products')->group(function () {
		Route::get('/', [
			'as' => 'products.index',
			'uses' => 'ProductController@index',
			// 'middleware'=>'can:product-list'
		]);

		Route::get('/createProduct', [
			'as' => 'products.create',
			'uses' => 'ProductController@createProduct'
		]);

		Route::post('/storeProduct', [
			'as' => 'products.store',
			'uses' => 'ProductController@storeProduct'
		]);

		Route::get('/editProduct/{id}', [
			'as' => 'products.edit',
			'uses' => 'ProductController@editProduct'
		]);

		Route::post('/updateProduct/{id}', [
			'as' => 'products.update',
			'uses' => 'ProductController@updateProduct'
		]);

		Route::get('/deleteProduct/{id}', [
			'as' => 'products.delete',
			'uses' => 'ProductController@deleteProduct'
		]);

	});






 ?>