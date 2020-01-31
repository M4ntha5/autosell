<?php

use Illuminate\Database\Seeder;
use App\FeaturesModels\Door;

class NumberOfDoorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Door::insert([
            ['name' => '2/3','created_at' => now(), 'updated_at' => now()],
            ['name' => '4/5','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kita','created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
