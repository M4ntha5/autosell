<?php

use Illuminate\Database\Seeder;
use App\FeaturesModels\Damage;

class DamagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Damage::insert(
            ['name' => 'Be defektų'],
            ['name' => 'Daužtas'],
            ['name' => 'Degęs'],
            ['name' => 'Pavarų dėžės defektas'],
            ['name' => 'Pažeistas krušos'],
            ['name' => 'Skendęs'],
            ['name' => 'Variklio defektas']
        );
    }
}
