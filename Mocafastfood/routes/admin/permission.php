<?php 

	// ---- Route Permission
	Route::prefix('adminMoca/permissions')->group(function () {
		// Route::get('/', [
		// 	'as' => 'permissions.index',
		// 	'uses' => 'PermissionController@index'
		// ]);

		Route::get('/createPermission', [
			'as' => 'permissions.create',
			'uses' => 'PermissionController@createPermission'
		]);

		Route::post('/storePermission', [
			'as' => 'permissions.store',
			'uses' => 'PermissionController@storePermission'
		]);

		// Route::get('/editPermission/{id}', [
		// 	'as' => 'permissions.edit',
		// 	'uses' => 'PermissionController@editPermission'
		// ]);

		// Route::post('/updatePermission/{id}', [
		// 	'as' => 'permissions.update',
		// 	'uses' => 'PermissionController@updatePermission'
		// ]);

		// Route::get('/deletePermission/{id}', [
		// 	'as' => 'permissions.delete',
		// 	'uses' => 'PermissionController@deletePermission'
		// ]);
	});






 ?>