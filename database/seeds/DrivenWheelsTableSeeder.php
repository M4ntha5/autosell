<?php

use Illuminate\Database\Seeder;
use App\FeaturesModels\DrivenWheel;

class DrivenWheelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DrivenWheel::insert([
            ['name' => 'Priekiniai','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Galiniai','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Visi varantys (4x4)','created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
