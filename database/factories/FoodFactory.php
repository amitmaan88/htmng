<?php

$factory->define(App\Food::class, function (Faker\Generator $faker) {
    return [        
        'food_name' => $faker->name,
        'hotel_id' => App\Hotel::all()->random()->id,
        'status'=>rand(0,2),        
    ];
});
