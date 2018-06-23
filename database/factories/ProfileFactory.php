<?php

use App\Profile;
use App\User;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'avatar' => 'http://via.placeholder.com/200x300',
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'biography' => $faker->sentence(1),
        'user_id' => function() {
            return factory(User::class)->create()->id;
        }
    ];
});
