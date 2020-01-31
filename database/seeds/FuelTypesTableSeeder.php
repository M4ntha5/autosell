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
        Fuel::insert([
            ['name' => 'Benzinas','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Dyzelinas','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Benzinas / dujos','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Benzinas / elektra','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Elektra','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bioetanolis (E85)','created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
