<?php

use Illuminate\Database\Seeder;
use App\FeaturesModels\Fuel;

class FuelTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fuel::insert(
            ['name' => 'Benzinas'],
            ['name' => 'Dyzelinas'],
            ['name' => 'Benzinas / dujos'],
            ['name' => 'Benzinas / elektra'],
            ['name' => 'Elektra'],
            ['name' => 'Bioetanolis (E85)']
        );
    }
}
