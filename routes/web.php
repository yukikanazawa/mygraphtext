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

Route::get('/manager/', 'ManagerController@index');
Route::get('/manager/subjects/{subject}', 'ManagerController@subject');
Route::get('/manager/subjects/{subject}/{field}', 'ManagerController@field');