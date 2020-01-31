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
        BodyType::insert(
            ['name' => 'Sedanas'],
            ['name' => 'Hačbekas'],
            ['name' => 'Universalas'],
            ['name' => 'Vienatūris'],
            ['name' => 'Kupė (Coupe)'],
            ['name' => 'Visureigis']
        );
    }
}
