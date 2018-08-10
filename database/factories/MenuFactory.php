<?php

$factory->define(App\Hotel::class, function (Faker\Generator $faker) {
    return [
        'hotel_name' => $faker->name,
        'hotel_address'=>$faker->address,
        'status'=>'1',
    ];
});
