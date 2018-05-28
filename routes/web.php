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
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function(){
	Route::get('/', 'AdminController@index')->name('admin.index');
	Route::resource('/users', 'UserController');
	Route::resource('/authors', 'AuthorController');
	Route::resource('/listbook', 'BookController');
	Route::resource('/bookapproval', 'ApprovalController');
	Route::resource('/posts', 'PostController');
});
Route::resource('/author', 'Author\AuthorController');
Route::group(['namespace' => 'Author'], function(){
	Route::post('addCategories', 'AddCategoryController@createCategory')->name('addCategories');
});
Route::group(['namespace' => 'User'], function(){
	Route::resource('/user', 'UserController');
});
Route::resource('/topics', 'Home\TopicController');
Route::resource('/showbook', 'Home\BookController');
Route::resource('review', 'User\PostController');
Route::resource('comment', 'User\CommentController');
Route::resource('friend', 'User\FriendController');
Route::resource('acceptFriend', 'User\AcceptFriendController');
Route::resource('like', 'User\LikeController');
Route::resource('rating', 'User\RatingController');

Route::get('/test', function() {
	return view('test');
});
