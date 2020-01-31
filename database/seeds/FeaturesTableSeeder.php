<?php

use Illuminate\Database\Seeder;
use App\FeaturesModels\Feature;

class FeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Feature::insert([
            ['name' => 'Sportinės sėdynės', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Odinis salonas', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tamsinti stiklai', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Daugiafunkcinis vairas', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Šildomos sėdynės', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Stoglangis', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'El. valdomos sėdynės', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Panoraminis stogas', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Autonominis šildymas', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ventiliuojamos sėdynės', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'El. valdomos sėdynės su atmintim', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bagažinės uždangalas', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'El. valdomi veidrodėliai', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Autopilotas', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Borto kompiuteris', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Beraktė sistema', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Imobilaizeris', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Signalizacija', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'CD grotuvas', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'MP3 grotuvas', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Lengvo lydinio ratlankiai', 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
