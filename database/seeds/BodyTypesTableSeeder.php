<?php

use Illuminate\Database\Seeder;
use App\FeaturesModels\BodyType;

class BodyTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BodyType::insert([
            ['name' => 'Sedanas', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Hačbekas','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Universalas','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Vienatūris','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kupė (Coupe)','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Visureigis','created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
