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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/task', 'TaskController@index')->name('index');

Route::post('/task/store', 'TaskController@store')->name('store');

Route::get('/task/{id}', 'TaskController@destroy')->where('name', '\d+');

Route::get('/task/check/{id}', 'TaskController@checkTaskById')->where('name', '\d+');

Route::get('/show/{id}', 'TaskController@show')->where('name', '\d+');

Route::post('/task/update', 'TaskController@update')->name('update');