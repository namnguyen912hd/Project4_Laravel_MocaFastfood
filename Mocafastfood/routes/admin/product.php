<?php 

// ---- Route Product
	Route::prefix('adminMoca/products')->group(function () {
		Route::get('/', [
			'as' => 'products.index',
			'uses' => 'admin\ProductController@index',
			'middleware'=>'can:product-list'
		]);

		Route::get('/createProduct', [
			'as' => 'products.create',
			'uses' => 'admin\ProductController@createProduct',
			'middleware'=>'can:product-add'
		]);

		Route::post('/storeProduct', [
			'as' => 'products.store',
			'uses' => 'admin\ProductController@storeProduct'
		]);

		Route::get('/editProduct/{id}', [
			'as' => 'products.edit',
			'uses' => 'admin\ProductController@editProduct',
			'middleware'=>'can:product-edit'
		]);

		Route::post('/updateProduct/{id}', [
			'as' => 'products.update',
			'uses' => 'admin\ProductController@updateProduct'
		]);

		Route::get('/deleteProduct/{id}', [
			'as' => 'products.delete',
			'uses' => 'admin\ProductController@deleteProduct',
			'middleware'=>'can:product-delete'
		]);

		Route::get('/exportProducts', [
			'as' => 'products.export',
			'uses' => 'admin\ProductController@exportProductIntoExcel'
		]);

		Route::get('/getProductbyCate', [
			'as' => 'products.getProductbyCate',
			'uses' => 'admin\ProductController@getProductsbyCate'
		]);
		Route::get('/searchProduct', [
			'as' => 'products.searchProduct',
			'uses' => 'admin\ProductController@searchProduct'
		]);

	});






 ?>