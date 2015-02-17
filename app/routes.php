<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::any('/', 'HomeController@index');

Route::group(array('prefix' => 'app'), function() {
	
	Route::any('login', 'AccountsController@login_app');

	Route::any('logout', 'AccountsController@logout');
	
	Route::group(array('before' => 'auth'), function() {
	
		Route::any('upload', 'UploadController@upload');
	});
	
});

Route::group(array('prefix' => 'admin', 'before' => 'admin'), function() {
	
	Route::any('/', 'AdminController@index');
	
	Route::any('/newUsers', 'AdminController@newUsers');
	
	Route::any('/approveUser/{id}', 'AdminController@approveUser');
	
	Route::any('/rejectUser/{id}', 'AdminController@rejectUser');

});

Route::group(array('prefix' => 'web'), function() {
	
	Route::group(array('before' => 'auth'), function() {

		Route::any('/ticker', 'DisplayController@ticker');

		Route::any('/latest', 'DisplayController@latest');
		
	});
	
	Route::group(array('prefix' => 'accounts'), function() {

		Route::any('logout', 'AccountsController@logout');

		Route::any('login', 'AccountsController@login');

		Route::any('loginView', 'AccountsController@login_view');

		Route::any('new', 'AccountsController@new_account');

		Route::any('newView', 'AccountsController@new_view');
	
	});
});

?>
