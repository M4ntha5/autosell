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
        Damage::insert([
            ['name' => 'Be defektų','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Daužtas','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Degęs','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pavarų dėžės defektas','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pažeistas krušos','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Skendęs','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Variklio defektas','created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
