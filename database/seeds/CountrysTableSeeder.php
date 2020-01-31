<?php

use Illuminate\Database\Seeder;
use App\FeaturesModels\Country;
class CountrysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::insert([
            ['name' => 'Lietuva','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Latvia','created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
