<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => ucwords(implode(' ', $faker->words(2))),
        'image_url' => $faker->imageUrl(200, 200, 'fashion'),
    ];
});
