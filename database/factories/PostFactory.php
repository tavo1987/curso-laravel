<?php

use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {

    return [
        'title'   => $faker->sentence,
        'body'    => $faker->sentence(3),
        'user_id' => function () {
            return factory(User::class)->create()->id;
        }
    ];
});
