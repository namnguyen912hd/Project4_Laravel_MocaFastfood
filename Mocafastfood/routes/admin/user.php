<?php 


// ---- Route User
	Route::prefix('adminMoca/users')->group(function () {
		Route::get('/', [
			'as' => 'users.index',
			'uses' => 'admin\UserController@index',
			'middleware'=>'can:user-list'
		]);

		Route::get('/createUser', [
			'as' => 'users.create',
			'uses' => 'admin\UserController@createUser',
			'middleware'=>'can:user-add'
		]);

		Route::post('/storeUser', [
			'as' => 'users.store',
			'uses' => 'admin\UserController@storeUser'
		]);

		Route::get('/editUser/{id}', [
			'as' => 'users.edit',
			'uses' => 'admin\UserController@editUser',
			'middleware'=>'can:user-edit'
		]);

		Route::post('/updateUser/{id}', [
			'as' => 'users.update',
			'uses' => 'admin\UserController@updateUser'
		]);

		Route::get('/deleteUser/{id}', [
			'as' => 'users.delete',
			'uses' => 'admin\UserController@deleteUser',
			'middleware'=>'can:user-delete'
		]);
	});



 ?>