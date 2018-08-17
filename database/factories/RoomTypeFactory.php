<?php

$factory->define(App\RoomType::class, function (Faker\Generator $faker) {
    return [
        'room_type' => $faker->name, 
        'status' => rand(0, 2)
    ];
});
