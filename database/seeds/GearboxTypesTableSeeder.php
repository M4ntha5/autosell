<?php

use Illuminate\Database\Seeder;
use App\FeaturesModels\Gearbox;

class GearboxTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gearbox::insert(
            ['name' => 'Automatinė'],
            ['name' => 'Mechaninė']
        );
    }
}
