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

Route::get('forum', 'PagesController@forum');
Route::post('forum/create','Create@createForum');
Route::get('forum/topic_id={id}','PagesController@forumView');
Route::post('forum/answer','Create@answer');
Route::get('form/your_topics/user_id={id}','PagesController@your_topics');
Route::get('form/your_replies/user_id={id}','PagesController@forum_replies');

Route::get('donate', 'PagesController@donate');

Route::get('contact', 'PagesController@contactus');

Route::get('motivation', 'PagesController@motivation');

Route::get('progress', 'PagesController@progress');
Route::post('progress/uploads', 'Upload@postProgress');
Route::get('progress/delete/id={id}','Delete@progress');

Route::get('profile/user_id={id}', 'PagesController@profile');
Route::get('profile/edit/user_id={id}', 'PagesController@editinfo');
Route::post('edit/info','Update@editInfo');

Route::get('journal/user_id={id}', 'PagesController@journal');

Route::post('journal/uploads', 'Upload@userJournal');
Route::get('journal/delete/journal_id={id}', 'Delete@journal');

Route::post('before/update', 'Update@postbefore');
Route::post('before/uploads', 'Upload@postBefore');
Route::get('before/delete/id={id}','Delete@before');

Route::post('contact/email', 'Create@contactus');


//Gallery Routes
Route::get('gallery/user_id={id}', 'PagesController@photo_gallery');

Route::post('gallery/uploads', 'Upload@userGallery');

Route::get('gallery/delete/image_id={id}', 'Delete@galleryImage');

Route::get('user/transformations/{sex}/{slug}', 'PagesController@transformations');

//Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
