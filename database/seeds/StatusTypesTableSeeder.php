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
        StatusType::insert([
            ['name' => 'Nepatvirtintas','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Patvirtintas','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Vykdomas','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Paruoštas','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Atiduotas','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Įvykdytas','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Atšauktas','created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
