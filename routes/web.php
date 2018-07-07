<?php

Route::get('/', 'HomeController')->name('home');
Route::get('/users', 'UserController@index')->name('users.index');

Route::get('/noticias', 'PostController@index')->name('posts.index');
Route::get('/noticias/crear', 'PostController@create')->name('posts.create');
Route::post('/noticias', 'PostController@store')->name('posts.store')->middleware('auth');
Route::patch('/noticias/{id}', 'PostController@update');
Route::delete('/noticias/{id}', 'PostController@delete');

Auth::routes();

