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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/task', 'TasksController@index');

Route::post('/task/store', 'TasksController@store');

Route::get('/task/delete/{id}', 'TasksController@delete');

Route::get('/task/check/{id}', 'TasksController@checkTaskById');

Route::get('/show/{id}', 'TasksController@show');

Route::post('/task/update', 'TasksController@update');

Route::get('/register/confirm', 'Auth\RegisterController@confirmEmail')->name('confirm-email');