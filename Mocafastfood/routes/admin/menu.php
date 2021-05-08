<?php  

Route::prefix('adminMoca/menus')->group(function () {
		Route::get('/', [
			'as' => 'menus.index',
			'uses' => 'admin\MenuController@index',
			'middleware'=>'can:menu-list'
		]);

		Route::get('/createMenu', [
			'as' => 'menus.create',
			'uses' => 'admin\MenuController@createMenu',
			'middleware'=>'can:menu-add'
		]);

		Route::post('/storeMenu', [
			'as' => 'menus.store',
			'uses' => 'admin\MenuController@storeMenu',

		]);

		Route::get('/editMenu/{id}', [
			'as' => 'menus.edit',
			'uses' => 'admin\MenuController@editMenu',
			'middleware'=>'can:menu-edit'
		]);

		Route::post('/updateMenu/{id}', [
			'as' => 'menus.update',
			'uses' => 'admin\MenuController@updateMenu'
		]);

		Route::get('/deleteMenu/{id}', [
			'as' => 'menus.delete',
			'uses' => 'admin\MenuController@deleteMenu',
			'middleware'=>'can:menu-delete'
		]);
	});




 ?>