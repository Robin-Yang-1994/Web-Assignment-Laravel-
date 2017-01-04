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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'DeveloperController@developerHome');

Auth::routes();

Route::get('/home', 'ForumController@forumHome');

Route::get('/home', 'AnimeController@show');

Route::get('home/{anime}', 'AnimeController@animeInformation');

Route::get('/dashboard', 'HomeController@index');

//Route::post('auth/logout', 'Auth\LoginController@getLogout');
