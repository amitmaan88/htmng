<?php

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'name' => $faker->name,
        'user_type_id'=>rand(1,3),
        'status'=>'1',
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});
