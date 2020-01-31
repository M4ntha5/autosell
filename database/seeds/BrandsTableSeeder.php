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
        Brand::insert([
            ['name' => 'Alfa Romeo','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Audi','created_at' => now(), 'updated_at' => now()],
            ['name' => 'BMW','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Citroen','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Reno','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Honda','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ford','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Lexus','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mercedes-Benz','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Subaru','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Toyota','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Volkswagen','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Volvo','created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
