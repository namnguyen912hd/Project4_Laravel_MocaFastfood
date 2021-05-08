<?php 

	// ---- Route Permission
	Route::prefix('adminMoca/permissions')->group(function () {
		// Route::get('/', [
		// 	'as' => 'permissions.index',
		// 	'uses' => 'admin\PermissionController@index'
		// ]);

		Route::get('/createPermission', [
			'as' => 'permissions.create',
			'uses' => 'admin\PermissionController@createPermission'
		]);

		Route::post('/storePermission', [
			'as' => 'permissions.store',
			'uses' => 'admin\PermissionController@storePermission'
		]);

		// Route::get('/editPermission/{id}', [
		// 	'as' => 'permissions.edit',
		// 	'uses' => 'admin\PermissionController@editPermission'
		// ]);

		// Route::post('/updatePermission/{id}', [
		// 	'as' => 'permissions.update',
		// 	'uses' => 'admin\PermissionController@updatePermission'
		// ]);

		// Route::get('/deletePermission/{id}', [
		// 	'as' => 'permissions.delete',
		// 	'uses' => 'admin\PermissionController@deletePermission'
		// ]);
	});






 ?>