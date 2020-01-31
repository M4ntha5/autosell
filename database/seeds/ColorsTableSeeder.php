<?php

use Illuminate\Database\Seeder;
use App\FeaturesModels\Color;
class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Color::insert([
            ['name' => 'Balta','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Geltona','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Juoda','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Marga','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mėlyna / žydra','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Oranžinė','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pilka / sidabrinė','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Raudona / vyšninė','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ruda / smėlio','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Violetinė','created_at' => now(), 'updated_at' => now()],
            ['name' => 'Žalia / chaki','created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
