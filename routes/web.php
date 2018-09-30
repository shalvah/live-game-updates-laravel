<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/games/{id}', 'HomeController@viewGame');
Route::post('/games/{id}', 'HomeController@updateGame')->middleware('auth');
