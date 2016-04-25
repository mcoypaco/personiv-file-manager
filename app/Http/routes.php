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

Route::get('/', function () {
    return view('guest.home');
});


Route::auth();
Route::get('/login', function(){
	if (Auth::check()) {
		return redirect('/home');
    }
    return view('auth.login');
});

/* Returns Register user to Home Page */
Route::get('/register', function(){
	return redirect('/');
});

Route::post('/register', function(){
	return redirect('/');
});

Route::get('/home', 'HomeController@index');

// Route::group(['middleware' => 'auth'], function(){
	/* Resource */
	Route::resource('category', 'CategoryController');
	Route::resource('document', 'DocumentController');
	Route::resource('tag', 'TagController');
	Route::resource('user', 'UserController');

	/* Search */
	Route::post('document-search', 'DocumentController@search');

	Route::post('user-check-password', 'UserController@checkPassword');
	Route::post('user-change-password', 'UserController@changePassword');

	/* File Handling */
	Route::post('/document-upload', 'DocumentController@upload');
	Route::get('/document-view/{id}', 'DocumentController@view');

	/* Pagination */
	Route::get('document-paginate/{categoryID}', 'DocumentController@paginate');

	/* Others*/
	Route::get('tag-document/{documentID}', 'TagController@document');
// });




