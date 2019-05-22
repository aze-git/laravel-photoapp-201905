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


Route::get('github', 'Github\GithubController@top');

Route::get('/', 'Auth\LoginController@loginConfirm');
Route::get('logout', 'Auth\LoginController@logout');
Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');

Route::post('user', 'User\UserController@updateUser');

Route::get('/home', 'HomeController@index');

Route::get('/post', 'PostController@index');
Route::post('/upload', 'PostController@upload');
Route::delete('post/destroy/{id}', 'PostController@destroy');

Route::post('like/store/post/{id}', 'LikeController@store');
Route::post('like/destroy/post/{id}', 'LikeController@destroy');

Route::get('likeuser/index/post/{id}', 'LikeUserController@index');

Route::get('profile/user/{id}', 'ProfileController@index');