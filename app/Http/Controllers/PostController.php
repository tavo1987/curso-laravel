<?php

namespace App\Http\Controllers;

use App\Post;

class PostController extends Controller
{
    public function update($id)
    {
        $noticia = Post::find($id);

        $noticia->title = request()->title;
        $noticia->body = request()->body;
        $noticia->user_id = request()->user_id;
        $noticia->save();

        return redirect()->route('home');
    }
}
