<?php

use Illuminate\Database\Seeder;
use App\FeaturesModels\StatusType;

class StatusTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StatusType::insert(
            ['name' => 'Nepatvirtintas'],
            ['name' => 'Patvirtintas'],
            ['name' => 'Vykdomas'],
            ['name' => 'Paruoštas'],
            ['name' => 'Atiduotas'],
            ['name' => 'Įvykdytas'],
            ['name' => 'Atšauktas']
        );
    }
}
