<?php

Route::get('/', 'HomeController');

Route::get('/users', 'UserController@index');

Route::get('/users/{id}', 'UserController@show')
	->where('id', '\d+');

Route::get('/users/create', 'UserController@create');

Route::get('/welcome/{name}/{nickname?}', 'WelcomeUserController');


