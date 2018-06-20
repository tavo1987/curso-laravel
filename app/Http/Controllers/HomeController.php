<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
   public function __invoke()
   {
       //$posts = DB::table('posts')->get();
       //$posts = DB::select('SELECT * FROM posts where id = ?', [2]);

       $posts = DB::table('users')
                ->where('users.id', 1)
                 ->join('posts', 'users.id', '=', 'posts.user_id')
                 ->select('posts.title')
                  ->get();

       dd($posts);

       return view('home', compact('posts'));
   }
}
