<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->select('id')->first();

        foreach (range(1,10) as $i) {

            Post::create([
                'title' => "Post ${i}",
                'body' => "This is a fake body ${i}",
                //'publish_at'=> null,
                'user_id' => $user->id,
            ]);
        }
    }
}
