<?php 


// ---- Route User
	Route::prefix('adminMoca/users')->group(function () {
		Route::get('/', [
			'as' => 'users.index',
			'uses' => 'UserController@index'
		]);

		Route::get('/createUser', [
			'as' => 'users.create',
			'uses' => 'UserController@createUser'
		]);

		Route::post('/storeUser', [
			'as' => 'users.store',
			'uses' => 'UserController@storeUser'
		]);

		Route::get('/editUser/{id}', [
			'as' => 'users.edit',
			'uses' => 'UserController@editUser'
		]);

		Route::post('/updateUser/{id}', [
			'as' => 'users.update',
			'uses' => 'UserController@updateUser'
		]);

		Route::get('/deleteUser/{id}', [
			'as' => 'users.delete',
			'uses' => 'UserController@deleteUser'
		]);
	});



 ?>