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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post/{id}', ['as'=>'home.post','uses'=>'AdminPostsController@post']);

//all stuff in admin users controller needs authorization
Route::group(['middleware'=>'admin'],function (){
    Route::get('/admin', "AdminController@index");
    Route::resource('admin/users','AdminUsersController');
    Route::resource('admin/posts','AdminPostsController');
    Route::resource('admin/categories','AdminCategoriesController');
    Route::resource('admin/media','AdminMediaController');
    Route::resource('admin/comments','PostCommentController');
    Route::resource('admin/comment/replies','CommentRepliesController');
});

Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );

// so that the user can only be logged in and can only access the create reply method of the Comment Controller
Route::group(['middleware'=>'auth'],function (){
    Route::post('comment/reply','CommentRepliesController@createReply');
});