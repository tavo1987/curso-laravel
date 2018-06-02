<?php

Route::get('/', 'HomeController')->name('home');

Route::get('/users', 'UserController@index')->name('users');

Route::get('/users/{id}', 'UserController@show')
	->where('id', '\d+');

Route::get('/users/create', 'UserController@create');

Route::get('/welcome/{name}/{nickname?}', 'WelcomeUserController');


