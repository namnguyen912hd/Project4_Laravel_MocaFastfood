<?php  

Route::prefix('adminMoca/menus')->group(function () {
		Route::get('/', [
			'as' => 'menus.index',
			'uses' => 'MenuController@index',
			'middleware'=>'can:menu-list'
		]);

		Route::get('/createMenu', [
			'as' => 'menus.create',
			'uses' => 'MenuController@createMenu',
			'middleware'=>'can:menu-add'
		]);

		Route::post('/storeMenu', [
			'as' => 'menus.store',
			'uses' => 'MenuController@storeMenu',

		]);

		Route::get('/editMenu/{id}', [
			'as' => 'menus.edit',
			'uses' => 'MenuController@editMenu',
			'middleware'=>'can:menu-edit'
		]);

		Route::post('/updateMenu/{id}', [
			'as' => 'menus.update',
			'uses' => 'MenuController@updateMenu'
		]);

		Route::get('/deleteMenu/{id}', [
			'as' => 'menus.delete',
			'uses' => 'MenuController@deleteMenu',
			'middleware'=>'can:menu-delete'
		]);
	});




 ?>