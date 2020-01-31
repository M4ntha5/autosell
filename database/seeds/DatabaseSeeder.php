<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
            UsersTableSeeder::class,
            SteeringWheelTableSeeder::class,
            StatusTypesTableSeeder::class,
            NumberOfDoorsTableSeeder::class,
            GearboxTypesTableSeeder::class,
            FuelTypesTableSeeder::class,
            EuroStandardTableSeeder::class,
            DrivenWheelsTableSeeder::class,
            DamagesTableSeeder::class,
            CountrysTableSeeder::class,
            CitysTableSeeder::class,
            ColorsTableSeeder::class,
            ClimateControlTableSeeder::class,
            BodyTypesTableSeeder::class,
            BrandsTableSeeder::class,
            ModelsTableSeeder::class       
         ]);
    }
}
