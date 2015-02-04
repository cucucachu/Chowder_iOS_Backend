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

//Route::any('/', 'DisplayController@show_all');

Route::any('/', 'DisplayController@ticker');

Route::any('/latest', 'DisplayController@latest');

Route::any('upload', 'UploadController@upload');

//Route::any('accounts/login', 'AccountsController@login');

//Route::any('accounts/signUp', 'AccountsController@signUp');

//Route::any('test', 'UploadController@test');

?>
