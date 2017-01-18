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

Route::get('/', 'DeveloperController@developerHome'); //home page

Auth::routes(); //user login or registration authentication

Route::get('/home', 'ForumController@forumHome'); //home page for forum

Route::get('/home', 'AnimeController@show'); //show all anime from database

Route::get('home/{anime}', 'AnimeController@animeInformation'); //get anime id for information

Route::get('/dashboard', 'HomeController@index');// defualt view logged in

// Route::post('/logout', 'Auth\LoginController@getLogout');

//CRUD - Create-Read-Update-Delete

Route::post('/home/search', 'AnimeController@searchAnime'); //search facility

Route::post('home/{anime}/note', 'AnimeController@addAnimeInformation'); // add information to anime

Route::get('home/{notes}/edit', 'NoteController@editNotes'); //edit show anime notes

Route::patch('edit/{notes}', 'NoteController@updateNotes'); // update anime notes

Route::post('delete/{notes}', 'NoteController@deleteNotes'); // delete anime notes

Route::get('/add', 'AnimeController@showAddForm'); // add anime form

Route::post('add/anime', 'AnimeController@addAnime'); // add anime by auth user

//

Route::post('/profile', 'AccountController@showProfile'); // See profile account and posts

Route::get('/images', 'AnimePictureController@show'); // display all images and pictures

Route::post('/upload', 'AnimePictureController@store'); // saves pictures to database

// Data Analysis

Route::get('/statistics', 'DataController@showData'); // show data from database
