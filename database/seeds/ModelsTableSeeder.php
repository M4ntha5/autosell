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
        Models::insert([
            ['name' => 'A1', 'brand_id' => 2,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'A2', 'brand_id' => 2,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'A3', 'brand_id' => 2,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'A4', 'brand_id' => 2,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'A4', 'brand_id' => 2,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'A5', 'brand_id' => 2,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'A5 SPORTBACK', 'brand_id' => 2,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'A6', 'brand_id' => 2,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'A6 ALLROAD', 'brand_id' => 2,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'A7 SPORTBACK', 'brand_id' => 2,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'A8', 'brand_id' => 2,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Q2', 'brand_id' => 2,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Q3', 'brand_id' => 2,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Q4', 'brand_id' => 2,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Q5', 'brand_id' => 2,'created_at' => now(), 'updated_at' => now()],
            ['name' => '146', 'brand_id' => 1,'created_at' => now(), 'updated_at' => now()],
            ['name' => '147', 'brand_id' => 1,'created_at' => now(), 'updated_at' => now()],
            ['name' => '156', 'brand_id' => 1,'created_at' => now(), 'updated_at' => now()],
            ['name' => '159', 'brand_id' => 1,'created_at' => now(), 'updated_at' => now()],
            ['name' => '164', 'brand_id' => 1,'created_at' => now(), 'updated_at' => now()],
            ['name' => '166', 'brand_id' => 1,'created_at' => now(), 'updated_at' => now()],
            ['name' => '318', 'brand_id' => 3,'created_at' => now(), 'updated_at' => now()],
            ['name' => '320', 'brand_id' => 3,'created_at' => now(), 'updated_at' => now()],
            ['name' => '325', 'brand_id' => 3,'created_at' => now(), 'updated_at' => now()],
            ['name' => '328', 'brand_id' => 3,'created_at' => now(), 'updated_at' => now()],
            ['name' => '330', 'brand_id' => 3,'created_at' => now(), 'updated_at' => now()],
            ['name' => '335', 'brand_id' => 3,'created_at' => now(), 'updated_at' => now()],
            ['name' => '520', 'brand_id' => 3,'created_at' => now(), 'updated_at' => now()],
            ['name' => '528', 'brand_id' => 3,'created_at' => now(), 'updated_at' => now()],
            ['name' => '525', 'brand_id' => 3,'created_at' => now(), 'updated_at' => now()],
            ['name' => '530', 'brand_id' => 3,'created_at' => now(), 'updated_at' => now()],
            ['name' => '535', 'brand_id' => 3,'created_at' => now(), 'updated_at' => now()],
            ['name' => '728', 'brand_id' => 3,'created_at' => now(), 'updated_at' => now()],
            ['name' => '730', 'brand_id' => 3,'created_at' => now(), 'updated_at' => now()],
            ['name' => '735', 'brand_id' => 3,'created_at' => now(), 'updated_at' => now()],
            ['name' => '740', 'brand_id' => 3,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Xsara','brand_id' => 4,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Visa', 'brand_id' => 4,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'XM', 'brand_id' => 4,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Clio', 'brand_id' => 5,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Espace', 'brand_id' => 5,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Acord', 'brand_id' => 6,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Civic', 'brand_id' => 6,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Capa', 'brand_id' =>6,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'CR-V', 'brand_id' =>6,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Escape','brand_id' => 7,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Escort','brand_id' => 8,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Edge', 'brand_id' =>7,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'LS 400', 'brand_id' => 8,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'LS 430', 'brand_id' => 8,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'LS 460', 'brand_id' => 8,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'E200', 'brand_id' =>9,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'E220', 'brand_id' =>9,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'E230', 'brand_id' =>9,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'E240', 'brand_id' =>9,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'E250', 'brand_id' =>9,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'E260', 'brand_id' =>9,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Impreza', 'brand_id' => 10,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Foreste', 'brand_id' => 10,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Legacy', 'brand_id' => 10,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Corolla', 'brand_id' => 11,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Corolla Verso', 'brand_id' => 11,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Prius','brand_id' => 11,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Auris','brand_id' => 11,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Avensis', 'brand_id' => 11,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Amarok', 'brand_id' => 12,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Arteon', 'brand_id' => 12,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bora', 'brand_id' =>12,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Golf', 'brand_id' =>12,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Caddy', 'brand_id' => 12,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'S40', 'brand_id' =>13,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'S60', 'brand_id' =>13,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'S70', 'brand_id' =>13,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'S80', 'brand_id' =>13,'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
