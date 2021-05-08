<?php 




	// -----Route Category 

	Route::prefix('adminMoca/categories')->group(function () {
		Route::get('/', [
			'as' => 'categories.index',
			'uses' => 'admin\CategoryController@index',
			'middleware'=>'can:category-list'
		]);

		Route::get('/create', [
			'as' => 'categories.create',
			'uses' => 'admin\CategoryController@create',
			'middleware'=>'can:category-add'
		]);

		Route::post('/store', [
			'as' => 'categories.store',
			'uses' => 'admin\CategoryController@store'
		]);

		Route::get('/edit/{id}', [
			'as' => 'categories.edit',
			'uses' => 'admin\CategoryController@edit',
			'middleware'=>'can:category-edit'
		]);

		Route::post('/update/{id}', [
			'as' => 'categories.update',
			'uses' => 'admin\CategoryController@update'
		]);

		Route::get('/delete/{id}', [
			'as' => 'categories.delete',
			'uses' => 'admin\CategoryController@delete',
			'middleware'=>'can:category-delete'
		]);
	});








?>