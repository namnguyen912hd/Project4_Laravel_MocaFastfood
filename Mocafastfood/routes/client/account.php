<?php 




	// route account

Route::prefix('MocaFastfood')->group(function () {
	
	
	Route::get('/Account', [
		'as' => 'Mocafastfood.Account',
		'uses' => 'home\AccountController@showAccount'
	]);

	Route::post('/updateAccount/{id}', [
		'as' => 'Mocafastfood.updateAccount',
		'uses' => 'home\AccountController@updateAccount'
	]);

	
});








?>