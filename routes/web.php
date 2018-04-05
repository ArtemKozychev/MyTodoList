<?php

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