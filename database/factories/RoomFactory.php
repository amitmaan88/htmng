<?php

$factory->define(App\Room::class, function (Faker\Generator $faker) {
    return [
        'room_name' => $faker->name,
        'room_type' => App\RoomType::all()->random()->id,
        'chair_no' => rand(0, 10),
        'table_no' => rand(0, 10),
        'bed_no' => rand(0, 10),
        'floor_no' => rand(0, 10),
        'room_size' => rand(0.0, 50.99),
        'daily_cost' => rand(1.0, 100.99),
        'monthly_cost' => rand(1.0, 100.99),
        'yearly_cost' => rand(1.0, 100.99),
        'description' => $faker->paragraph,
        'hotel_id' => App\Hotel::all()->random()->id,
        'status' => rand(0, 2),
    ];
});
