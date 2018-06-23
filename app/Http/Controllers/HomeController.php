<?php

namespace App\Http\Controllers;

use App\Post;

class HomeController extends Controller
{
   public function __invoke()
   {
       //$posts = DB::table('posts')->get();
       //$posts = DB::select('SELECT * FROM posts where id = ?', [2]);

       /*$posts = DB::table('users')
                ->where('users.id', 1)
                 ->join('posts', 'users.id', '=', 'posts.user_id')
                 ->select('posts.title')
                  ->get();*/

       /*$posts = Post::chunk(1,  function ($posts) {
           foreach ($posts as $post) {
               echo  $post->title . '</br>';
           }
       });*/


       /*foreach ($posts as $post) {
           if ($post->id > 1) {
                if ($post->publish_at !== null) {
                    echo $post->title . '<br>';
                }
           }
       }*/

      /* $filteredPosts = $posts->filter(function ($post) {
           return $post->id > 1;
       });*/

      /*$posts = \DB::table('posts')->get();

       dd($posts);*/

      $posts = Post::whereNotNull('publish_at')->get();

      $users = User::where('active', 1)->get();
      $users = User::active()->get();

      $posts = Post::published()->get();

      //dd($posts);

       return view('home', compact('posts'));
   }
}
