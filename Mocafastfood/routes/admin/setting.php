<?php 

Route::prefix('adminMoca/setting')->group(function () {
		Route::get('/', [
			'as' => 'settings.index',
			'uses' => 'admin\SettingController@index'
		]);

		Route::get('/create', [
			'as' => 'settings.create',
			'uses' => 'admin\SettingController@create'
		]);

		Route::post('/store', [
			'as' => 'settings.store',
			'uses' => 'admin\SettingController@store'
		]);

		Route::get('/edit/{id}', [
			'as' => 'settings.edit',
			'uses' => 'admin\SettingController@edit'
		]);

		Route::post('/update/{id}', [
			'as' => 'settings.update',
			'uses' => 'admin\SettingController@update'
		]);

		Route::get('/delete/{id}', [
			'as' => 'settings.delete',
			'uses' => 'admin\SettingController@delete'
		]);
	});


 ?>