<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
           'name' => 'Edwin',
           'email' => 'tavo198718@gmail.com',
           'password' => bcrypt('secret'),
        ]);
    }
}
