<?php

use Illuminate\Database\Seeder;
use App\FeaturesModels\EuroStandard;

class EuroStandardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EuroStandard::insert([
            ['name' => 'Euro 1','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Euro 2','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Euro 3','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Euro 4','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Euro 5','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Euro 6','created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
