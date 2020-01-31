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
        City::insert([
            ['name' => 'Vilnius', 'country_id' => 1,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kaunas', 'country_id' => 1,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Klaipėda', 'country_id' => 1,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Šiauliai', 'country_id' => 1,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Panevėžys', 'country_id' => 1,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Alytus', 'country_id' => 1,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Marijampolė', 'country_id' => 1,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Palanga', 'country_id' => 1,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Druskininkai', 'country_id' => 1,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Riga', 'country_id' => 2,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Jūrmala', 'country_id' => 2,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Madona', 'country_id' => 2,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Jelgava', 'country_id' => 2,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Valmiera', 'country_id' => 2,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Daugavpils', 'country_id' => 2,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Dobele', 'country_id' => 2,'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
