<?php

namespace App\Http\Controllers;

use App\Post;

class HomeController extends Controller
{
   public function __invoke()
   {
        $noticias = Post::all();

        return view('home', compact('noticias'));
   }
}
