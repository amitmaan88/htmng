<?php

$factory->define(App\Notice::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->title,
        'template_html' => $faker->paragraph,
        'current_template' => rand(0, 1),
        'hotel_id' => App\Hotel::all()->random()->id,
        'status' => rand(0, 2),
    ];
});
