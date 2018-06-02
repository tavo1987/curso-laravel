<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
   public function __invoke()
   {
       $posts = [
            'noticia 1',
            'noticia 2',
            'noticia 3',
            'noticia 4',
       ];

        return view('home', compact('posts'));
   }
}
