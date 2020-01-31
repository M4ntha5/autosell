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
        SteeringWheel::insert([
            ['name' => 'Kairėje','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Dešinėje (bardačioke)','created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
