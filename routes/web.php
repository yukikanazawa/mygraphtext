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
Auth::routes();
Route::get('/home', 'HomeController@index');

//管理者用
Route::get('/manager/', 'SubjectController@index');
Route::get('/manager/subjects/{subject}', 'FieldController@field');
Route::post('/manager/subjects/{subject}/store', 'FieldController@store');
Route::post('/manager/subjects/{subject}/{field}/store', 'CategoryController@store');
Route::post('/subjects/{subject}/{field}/{post_id}/store', 'CommentPostController@store');
Route::get('/manager/subjects/{subject}/{field}/create', 'CategoryController@create');
Route::get('/manager/subjects/{subject}/{field}/{category}', 'PostController@post');
Route::get('/manager/subjects/{subject}/{field}/{category}/create', 'PostController@create');
Route::post('/manager/subjects/{subject}/{field}/{category}/store', 'PostController@store');
Route::get('/manager/subjects/{subject}/{field}/{category}/{post_id}', 'CommentPostController@show');
Route::get('/manager/subjects/{subject}/{field}/{category}/{post}/edit', 'PostController@edit');
Route::put('/manager/subjects/{subject}/{field}/{category}/{post}/update', 'PostController@update');
Route::delete('/manager/subjects/{subject}', 'FieldController@destroy');
Route::delete('/manager/subjects/{subject}/{field}', 'CategoryController@destroy');
Route::delete('/subjects/{subject}/{field}/{post}/delete', 'CommentPostController@destroy');
Route::delete('/manager/subjects/{subject}/{field}/{category}', 'PostController@destroy');
Route::get('/manager/subjects/{subject}/create', 'FieldController@create');

//ユーザー用
Route::get('/', 'SubjectController@userindex');
Route::get('/subjects/{subject}', 'FieldController@userfield');
Route::get('/subjects/{subject}/{field}/{category}', 'PostController@userpost');
Route::get('/subjects/{subject}/{field}/{category}/{post_id}', 'CommentPostController@usershow');