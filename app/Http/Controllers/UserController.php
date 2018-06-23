<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('profile')->get();
        //$users = User::with('profile')->paginate(10);
        //$profiles = Profile::with('user')->get();


        dd($users->toArray());

        return view('users.index', compact('users'));
        //return view('users.index', compact('profiles'));
    }
}
