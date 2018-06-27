<?php

Route::get('/', 'HomeController')->name('home');

Route::get('/users', 'UserController@index')->name('users.index');

Route::patch('/noticias/{id}', 'PostController@update');