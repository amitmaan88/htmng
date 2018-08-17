<?php

$factory->define(App\Complaint::class, function (Faker\Generator $faker) {
    return [
        'complaint_title' => $faker->title,
        'complaint_type' => $faker->randomElement(staticDropdown('complaints')),
        'complaint_desc' => $faker->paragraph,
        'user_id' => App\User::all()->random()->id,
        'hotel_id' => App\Hotel::all()->random()->id,
        'status' => rand(0, 2),
    ];
});
