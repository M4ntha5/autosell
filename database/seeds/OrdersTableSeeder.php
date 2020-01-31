<?php

use Illuminate\Database\Seeder;
use App\Order;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::insert([
            [
                'price' => 5000.00,
                'phone_no' => '1234',
                'manufacture_date_from' => '2010-02-02',
                'manufacture_date_to' => '2019-02-02',
                'mileage' => 123321,
                'engine_power' => 160,
                'engine_volume' => 3000.00,
                'damage_id' => 1,
                'status_id' => 7,
                'fuel_id' => 1,
                'gearbox_id' => 1,
                'body_type_id' => 1, 
                'color_id' =>1,
                'steering_wheel_id' => 1,
                'number_of_doors_id' => 1,
                'driven_wheels_id' => 1,
                'climate_control_id' => 1,
                'euro_standard_id' => 1,
                'brand_id' => 3,
                'model_id' => 32,
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'price' => 5000.00,
                'phone_no' => '1234',
                'manufacture_date_from' => '2010-02-02',
                'manufacture_date_to' => '2019-02-02',
                'mileage' => 123321,
                'engine_power' => 160,
                'engine_volume' => 3000.00,
                'damage_id' => 1,
                'status_id' => 4,
                'fuel_id' => 1,
                'gearbox_id' => 1,
                'body_type_id' => 1, 
                'color_id' =>1,
                'steering_wheel_id' => 1,
                'number_of_doors_id' => 1,
                'driven_wheels_id' => 1,
                'climate_control_id' => 1,
                'euro_standard_id' => 1,
                'brand_id' => 3,
                'model_id' => 32,
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'price' => 5000.00,
                'phone_no' => '1234',
                'manufacture_date_from' => '2010-02-02',
                'manufacture_date_to' => '2019-02-02',
                'mileage' => 123321,
                'engine_power' => 160,
                'engine_volume' => 3000.00,
                'damage_id' => 1,
                'status_id' => 6,
                'fuel_id' => 1,
                'gearbox_id' => 1,
                'body_type_id' => 1, 
                'color_id' =>1,
                'steering_wheel_id' => 1,
                'number_of_doors_id' => 1,
                'driven_wheels_id' => 1,
                'climate_control_id' => 1,
                'euro_standard_id' => 1,
                'brand_id' => 3,
                'model_id' => 32,
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'price' => 5000.00,
                'phone_no' => '1234',
                'manufacture_date_from' => '2010-02-02',
                'manufacture_date_to' => '2019-02-02',
                'mileage' => 123321,
                'engine_power' => 160,
                'engine_volume' => 3000.00,
                'damage_id' => 1,
                'status_id' => 1,
                'fuel_id' => 1,
                'gearbox_id' => 1,
                'body_type_id' => 1, 
                'color_id' =>1,
                'steering_wheel_id' => 1,
                'number_of_doors_id' => 1,
                'driven_wheels_id' => 1,
                'climate_control_id' => 1,
                'euro_standard_id' => 1,
                'brand_id' => 3,
                'model_id' => 32,
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
