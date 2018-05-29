<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function index()
    {
    	$users = [
    	    'John',
		    'Jane',
		    'Tommy',
		    'Jean',
		    '<script>alert("hola")</script>',
	    ];

    	$title = 'Lista de Usuarios';

	    return view('users', compact('users', 'title'));
    }

    public function show($id)
    {
	    return "Detalle de usuario {$id}";
    }

    public function create()
    {
	    return view('create');
    }

}
