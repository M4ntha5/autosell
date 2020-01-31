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
        EuroStandard::insert(
            ['name' => 'Euro 1'],
            ['name' => 'Euro 2'],
            ['name' => 'Euro 3'],
            ['name' => 'Euro 4'],
            ['name' => 'Euro 5'],
            ['name' => 'Euro 6']
        );
    }
}
