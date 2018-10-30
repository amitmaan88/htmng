<?php

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'name' => $faker->name,
        'user_type_id'=>rand(0,2),
        'status'=>rand(0,2),
        'password' => bcrypt('123456'),
        'remember_token' => str_random(10)
    ];
});
