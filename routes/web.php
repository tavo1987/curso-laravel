<?php

Route::get('/', function () {
    return 'Home';
});

Route::get('/users', function () {
	return 'Lista de Usuarios';
});

Route::get('/users/{id}', function ( $id) {
	return "Detalle de usuario {$id}";
})->where('id', '\d+');

Route::get('/users/create', function () {
	return "Crear Usuario";
});

Route::get('/welcome/{name}/{nickname?}', function ($name,  $nickname = null) {

	$name = ucfirst($name);

	if ($nickname) {
		return "Bienvenido $name. tu nickname es $nickname";
	}

	return "Bienvenido $name.";
});


