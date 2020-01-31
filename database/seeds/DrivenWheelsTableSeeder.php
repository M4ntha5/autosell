<?php

use Illuminate\Database\Seeder;
use App\FeaturesModels\DrivenWheel;

class DrivenWheelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DrivenWheel::insert(
            ['name' => 'Priekiniai'],
            ['name' => 'Galiniai'],
            ['name' => 'Visi varantys (4x4)']
        );
    }
}
