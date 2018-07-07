<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostFormRequest;
use App\Post;

class PostController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {

    }

    public function create()
    {
        auth()->loginUsingId(1);

        return view('posts.create');
    }

    public function update($id)
    {
        $noticia = Post::find($id);

        $noticia->title = request()->title;
        $noticia->body = request()->body;
        $noticia->user_id = request()->user_id;
        $noticia->save();

        return redirect()->route('home');
    }

    public function store(StorePostFormRequest $request)
    {
        auth()->user()->posts()->create([
            'title' => $request->title,
            'body' => $request->body,
            'publish_at' => $request->publish_at,
        ]);

        return redirect()->route('home')->with('success', 'Noticia creada con éxito');
    }

    public function delete($id)
    {
        $noticia = Post::find($id);
        $noticia->delete();

        return redirect()->route('home')->with('success', 'Membresía guardada con éxito');
    }
}
