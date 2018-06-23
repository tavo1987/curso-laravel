<?php

use App\{User, Post};
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
        factory(Post::class)->times(20)->create();

        /*foreach (range(1,10) as $i) {

            Post::create([
                'title' => "Post ${i}",
                'body' => "This is a fake body ${i}",
                'publish_at'=> now(),
                'user_id' => $user->id,
            ]);
        }*/
    }
}
