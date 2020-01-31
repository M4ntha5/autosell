<?php

use Illuminate\Database\Seeder;
use App\FeaturesModels\Models;

class ModelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Models::insert(
            ['name' => 'A1', 'brand_id' => 2],
            ['name' => 'A2', 'brand_id' => 2],
            ['name' => 'A3', 'brand_id' => 2],
            ['name' => 'A4', 'brand_id' => 2],
            ['name' => 'A4', 'brand_id' => 2],
            ['name' => 'A5', 'brand_id' => 2],
            ['name' => 'A5 SPORTBACK', 'brand_id' => 2],
            ['name' => 'A6', 'brand_id' => 2],
            ['name' => 'A6 ALLROAD', 'brand_id' => 2],
            ['name' => 'A7 SPORTBACK', 'brand_id' => 2],
            ['name' => 'A8', 'brand_id' => 2],
            ['name' => 'Q2', 'brand_id' => 2],
            ['name' => 'Q3', 'brand_id' => 2],
            ['name' => 'Q4', 'brand_id' => 2],
            ['name' => 'Q5', 'brand_id' => 2],
            ['name' => '146', 'brand_id' => 1],
            ['name' => '147', 'brand_id' => 1],
            ['name' => '156', 'brand_id' => 1],
            ['name' => '159', 'brand_id' => 1],
            ['name' => '164', 'brand_id' => 1],
            ['name' => '166', 'brand_id' => 1],
            ['name' => '318', 'brand_id' => 3],
            ['name' => '320', 'brand_id' => 3],
            ['name' => '325', 'brand_id' => 3],
            ['name' => '328', 'brand_id' => 3],
            ['name' => '330', 'brand_id' => 3],
            ['name' => '335', 'brand_id' => 3],
            ['name' => '520', 'brand_id' => 3],
            ['name' => '528', 'brand_id' => 3],
            ['name' => '525', 'brand_id' => 3],
            ['name' => '530', 'brand_id' => 3],
            ['name' => '535', 'brand_id' => 3],
            ['name' => '728', 'brand_id' => 3],
            ['name' => '730', 'brand_id' => 3],
            ['name' => '735', 'brand_id' => 3],
            ['name' => '740', 'brand_id' => 3],
            ['name' => 'Xsara','brand_id' => 4],
            ['name' => 'Visa', 'brand_id' => 4],
            ['name' => 'XM', 'brand_id' => 4],
            ['name' => 'Clio', 'brand_id' => 5],
            ['name' => 'Espace', 'brand_id' => 5],
            ['name' => 'Acord', 'brand_id' => 6],
            ['name' => 'Civic', 'brand_id' => 6],
            ['name' => 'Capa', 'brand_id' =>6],
            ['name' => 'CR-V', 'brand_id' =>6],
            ['name' => 'Escape','brand_id' => 7],
            ['name' => 'Escort','brand_id' => 8],
            ['name' => 'Edge', 'brand_id' =>7],
            ['name' => 'LS 400', 'brand_id' => 8],
            ['name' => 'LS 430', 'brand_id' => 8],
            ['name' => 'LS 460', 'brand_id' => 8],
            ['name' => 'E200', 'brand_id' =>9],
            ['name' => 'E220', 'brand_id' =>9],
            ['name' => 'E230', 'brand_id' =>9],
            ['name' => 'E240', 'brand_id' =>9],
            ['name' => 'E250', 'brand_id' =>9],
            ['name' => 'E260', 'brand_id' =>9],
            ['name' => 'Impreza', 'brand_id' => 10],
            ['name' => 'Foreste', 'brand_id' => 10],
            ['name' => 'Legacy', 'brand_id' => 10],
            ['name' => 'Corolla', 'brand_id' => 11],
            ['name' => 'Corolla Verso', 'brand_id' => 11],
            ['name' => 'Prius','brand_id' => 11],
            ['name' => 'Auris','brand_id' => 11],
            ['name' => 'Avensis', 'brand_id' => 11],
            ['name' => 'Amarok', 'brand_id' => 12],
            ['name' => 'Arteon', 'brand_id' => 12],
            ['name' => 'Bora', 'brand_id' =>12],
            ['name' => 'Golf', 'brand_id' =>12],
            ['name' => 'Caddy', 'brand_id' => 12],
            ['name' => 'S40', 'brand_id' =>13],
            ['name' => 'S60', 'brand_id' =>13],
            ['name' => 'S70', 'brand_id' =>13],
            ['name' => 'S80', 'brand_id' =>13]
        );
    }
}
