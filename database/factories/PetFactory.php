<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pet;
use App\Category;
use Faker\Generator as Faker;

$factory->define(Pet::class, function (Faker $faker) {
    return [
        'name' => $faker->title(20),
        'animal' => $faker->text,
        'passport_id' => random_int(111, 999),
        'category_id' => Category::get()->random()->id,      
    ];

});
