<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'email' => $faker->email,
        'country_code' => 'BD',
        'city' => 'Dhaka',
        'zip_postal_code' => 1207,
        'shipping_address_1' => ucfirst($faker->word),
        'shipping_address_2' => ucfirst($faker->word),
        'shipping_address_3' => ucfirst($faker->word),
    ];
});
