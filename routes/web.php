<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('mybook', function () {
	return view('user.mybook');
});
Route::get('/admin', function() {
	return view('backend.admin.index');
});

Auth::routes();
Route::get('/', 'Home\HomeController@index')->name('home');
Route::post('/register', 'Auth\RegisterController@store')->name('register');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::group(['namespace' => 'Author', 'prefix' => 'author'], function(){
	// Route::get('/', 'AuthorController@index')->name('author');
	Route::resource('/books', 'BookController');
});
Route::resource('/author', 'Author\AuthorController');
Route::group(['namespace' => 'User'], function(){
	Route::resource('/user', 'UserController');
	// Route::get('user/mybook', function () {
	// 	return view('user.mybook');
	// })->name('mybook');

	// Route::get('/review/{$id}','PostController@getReview');
	Route::post('/review/{$id}', 'PostController@postReview')->name('postreview');
	// Route::resource('/review', 'PostController');


});
Route::resource('/topics', 'Home\TopicController');
Route::resource('/showbook', 'Home\BookController');



