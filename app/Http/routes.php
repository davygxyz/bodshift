<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', 'PagesController@index');

Route::get('about', 'PagesController@about');

Route::get('donate', 'PagesController@donate');

Route::get('contact', 'PagesController@contactus');

Route::get('motivation', 'PagesController@motivation');

Route::get('profile/{id}', 'PagesController@profile');



Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
