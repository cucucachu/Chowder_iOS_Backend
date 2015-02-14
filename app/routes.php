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

Route::group(array('before' => 'auth'), function() {

	Route::any('/ticker', 'DisplayController@ticker');

	Route::any('/latest', 'DisplayController@latest');

});

Route::group(array('prefix' => 'app'), function() {
	
	Route::any('upload', 'UploadController@upload');
	
	Route::any('login', 'AccountsController@upload');
	
	Route::any('upload', 'UploadController@upload');
	
});


Route::group(array('prefix' => 'web'), function() {

	Route::any('accounts/logout', 'AccountsController@logout');

	Route::any('accounts/login', 'AccountsController@login');

	Route::any('accounts/loginView', 'AccountsController@loginView');

	Route::any('login', 'AccountsController@loginView');

	Route::any('accounts/new', 'AccountsController@new');

	Route::any('accounts/newView', 'AccountsController@newView');
	
});

?>
