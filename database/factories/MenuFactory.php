<?php

$factory->define(App\Menu::class, function (Faker\Generator $faker) {
    return [
        'food_id' => App\Food::all()->random()->id,
        'food_type' => $faker->randomElement(['break_fast', 'lunch', 'dinner']), 
        'day' => $faker->randomElement(staticDropdown('foodDay')),        
    ];
});
