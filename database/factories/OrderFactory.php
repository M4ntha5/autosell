<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'price' => $faker->randomDigit,
		'phone_no' => $faker->randomDigit,
        'manufacture_date_from' => $faker->date,
        'manufacture_date_to' => $faker->date,
		'mileage' => $faker->randomDigit,
		'engine_power' => 1,
		'engine_volume' => 1,
        'damage_id' => 1,
        'status_id' => 1,
		'fuel_id' => 1,
		'gearbox_id' => 1,
		'body_type_id' => 1,
		'color_id' => 1,
		'steering_wheel_id' => 1,
		'number_of_doors_id' => 1,
		'driven_wheels_id' => 1,
		'climate_control_id' => 1,
		'euro_standard_id' => 1,
		'brand_id' => 2,
		'model_id' => 1,
		'user_id' => 1
    ];
});
