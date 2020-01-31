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
        Color::insert(
            ['name' => 'Balta'],
            ['name' => 'Geltona'],
            ['name' => 'Juoda'],
            ['name' => 'Marga'],
            ['name' => 'Mėlyna / žydra'],
            ['name' => 'Oranžinė'],
            ['name' => 'Pilka / sidabrinė'],
            ['name' => 'Raudona / vyšninė'],
            ['name' => 'Ruda / smėlio'],
            ['name' => 'Violetinė'],
            ['name' => 'Žalia / chaki']
        );
    }
}
