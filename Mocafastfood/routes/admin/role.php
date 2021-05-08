<?php 


// ---- Route Role
	
	Route::prefix('adminMoca/roles')->group(function () {
		Route::get('/', [
			'as' => 'roles.index',
			'uses' => 'admin\RoleController@index',
			'middleware'=>'can:role-list'
		]);

		Route::get('/createRole', [
			'as' => 'roles.create',
			'uses' => 'admin\RoleController@createRole',
			'middleware'=>'can:role-add'
		]);

		Route::post('/storeRole', [
			'as' => 'roles.store',
			'uses' => 'admin\RoleController@storeRole'
		]);

		Route::get('/editRole/{id}', [
			'as' => 'roles.edit',
			'uses' => 'admin\RoleController@editRole',
			'middleware'=>'can:role-edit'
		]);

		Route::post('/updateRole/{id}', [
			'as' => 'roles.update',
			'uses' => 'admin\RoleController@updateRole'
		]);

		Route::get('/deleteRole/{id}', [
			'as' => 'roles.delete',
			'uses' => 'admin\RoleController@deleteRole',
			'middleware'=>'can:role-delete'

		]);
	});







 ?>