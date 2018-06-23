<?php

Route::get('/', 'HomeController')->name('home');

Route::get('/users', 'UserController@index')->name('users.index');

Route::post('/posts', function () {
    dd(request()->title);
})->name('posts');