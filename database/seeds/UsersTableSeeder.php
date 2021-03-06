<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name' => 'Administrator',
                'email' => 'admin@admin.lt',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'country_id' => 1,
                'city_id' => 2,
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'name' => 'User',
                'email' => 'user@user.com',
                'password' => Hash::make('user_password'),
                'role' => 'user',
                'country_id' => 1,
                'city_id' => 1,
                'created_at' => now(), 
                'updated_at' => now()
            ],
        ]);
    }
}
