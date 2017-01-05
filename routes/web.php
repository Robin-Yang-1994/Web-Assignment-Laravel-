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

Route::get('/', 'DeveloperController@developerHome'); //home page

Auth::routes(); //user login or registration authentication

Route::get('/home', 'ForumController@forumHome'); //home page for forum

Route::get('/home', 'AnimeController@show'); //show all anime from database

Route::get('home/{anime}', 'AnimeController@animeInformation'); //get anime id for information

Route::get('/dashboard', 'HomeController@index');// defualt view logged in

//Route::post('auth/logout', 'Auth\LoginController@getLogout');

Route::get('/search', 'AnimeController@searchAnime'); //search facility

Route::post('home/{anime}/note', 'AnimeController@addAnimeInformation');
