<?php 




	// -----Route product on HomePage

Route::prefix('MocaFastfood')->group(function () {
	Route::get('/getProducts/{id}', [
		'as' => 'Mocafastfood.products',
		'uses' => 'home\ProductController@getProductsbyCate'
	]);

	Route::get('/shopping', [
		'as' => 'Mocafastfood.shopping',
		'uses' => 'home\ProductController@shopping'
	]);

	Route::get('/ProductsDetail/{id}', [
		'as' => 'Mocafastfood.productdetail',
		'uses' => 'home\ProductController@getProductDetail'
	]);

	Route::get('/getProductsbyTag/{id}', [
		'as' => 'Mocafastfood.getProductsbyTag',
		'uses' => 'home\ProductController@getProductsbyTag'
	]);
});




?>