<?php

use Illuminate\Database\Seeder;
use App\FeaturesModels\ClimateControl;
class ClimateControlTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClimateControl::insert([
            ['name' => 'Oro kondicionierius','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Klimato kontrolė','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Nėra','created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
