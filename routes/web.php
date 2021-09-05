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

Route::get('/manager/', 'ManagerController@index');
Route::get('/manager/subjects/{subject}', 'ManagerController@subject');
Route::get('/manager/subjects/{subject}/{field}/{category}', 'ManagerController@category');
Route::get('/manager/subjects/{subject}/{field}/{category}/{post}', 'ManagerController@show');

Route::get('/', 'ManagerController@index');