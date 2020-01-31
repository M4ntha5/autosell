<?php

use Illuminate\Database\Seeder;
use App\FeaturesModels\Brand;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::insert(
            ['name' => 'Alfa Romeo'],
            ['name' => 'Audi'],
            ['name' => 'BMW'],
            ['name' => 'Citroen'],
            ['name' => 'Reno'],
            ['name' => 'Honda'],
            ['name' => 'Ford'],
            ['name' => 'Lexus'],
            ['name' => 'Mercedes-Benz'],
            ['name' => 'Subaru'],
            ['name' => 'Toyota'],
            ['name' => 'Volkswagen'],
            ['name' => 'Volvo']
        );
    }
}
