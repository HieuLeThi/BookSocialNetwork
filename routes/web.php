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
Route::get('bookdetail', function () {
	return view('frontend.home.showbook');
});
Route::get('/admin', function() {
	return view('backend.admin.index');
});
Route::get('/showtopic', function() {
	return view('frontend.home.showbookbytopic');
});

Auth::routes();
Route::get('/', 'Home\HomeController@index')->name('home');
// Route::get('/', 'Home\HomeController@showListTopics');
Route::post('/register', 'Auth\RegisterController@store')->name('register');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::group(['namespace' => 'Author', 'prefix' => 'author'], function(){
	Route::get('/', 'AuthorController@index')->name('author');
	Route::resource('/books', 'BookController');
});
Route::group(['namespace' => 'User', 'prefix' => 'user'], function(){
	Route::get('/', 'UserController@index')->name('user');
});
Route::resource('/topics', 'Home\TopicController');

