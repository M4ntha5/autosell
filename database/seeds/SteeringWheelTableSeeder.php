<?php

use Illuminate\Database\Seeder;
use App\FeaturesModels\SteeringWheel;

class SteeringWheelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SteeringWheel::insert(
            ['name' => 'Kairėje'],
            ['name' => 'Dešinėje (bardačioke)']
        );
    }
}
