<?php 


// ---- Route Role
	
	Route::prefix('adminMoca/roles')->group(function () {
		Route::get('/', [
			'as' => 'roles.index',
			'uses' => 'RoleController@index'
		]);

		Route::get('/createRole', [
			'as' => 'roles.create',
			'uses' => 'RoleController@createRole'
		]);

		Route::post('/storeRole', [
			'as' => 'roles.store',
			'uses' => 'RoleController@storeRole'
		]);

		Route::get('/editRole/{id}', [
			'as' => 'roles.edit',
			'uses' => 'RoleController@editRole'
		]);

		Route::post('/updateRole/{id}', [
			'as' => 'roles.update',
			'uses' => 'RoleController@updateRole'
		]);

		Route::get('/deleteRole/{id}', [
			'as' => 'roles.delete',
			'uses' => 'RoleController@deleteRole'
		]);
	});







 ?>