<?php

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
            DB::table('posts')->insert([
                'title' => "Post ${i}",
                'body' => "This is a fake body ${i}",
                'user_id' => $user->id,
            ]);
        }
    }
}
