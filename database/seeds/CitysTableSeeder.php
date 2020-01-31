<?php

use Illuminate\Database\Seeder;
use App\FeaturesModels\City;

class CitysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::insert(
            ['name' => 'Vilnius', 'country_id' => 1],
            ['name' => 'Kaunas', 'country_id' => 1],
            ['name' => 'Klaipėda', 'country_id' => 1],
            ['name' => 'Šiauliai', 'country_id' => 1],
            ['name' => 'Panevėžys', 'country_id' => 1],
            ['name' => 'Alytus', 'country_id' => 1],
            ['name' => 'Marijampolė', 'country_id' => 1],
            ['name' => 'Palanga', 'country_id' => 1],
            ['name' => 'Druskininkai', 'country_id' => 1],
            ['name' => 'Riga', 'country_id' => 2],
            ['name' => 'Jūrmala', 'country_id' => 2],
            ['name' => 'Madona', 'country_id' => 2],
            ['name' => 'Jelgava', 'country_id' => 2],
            ['name' => 'Valmiera', 'country_id' => 2],
            ['name' => 'Daugavpils', 'country_id' => 2],
            ['name' => 'Dobele', 'country_id' => 2]
        );
    }
}
