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
            'name' => 'Administrator',
            'email' => 'admin@admin.lt',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'role' => 'admin'
        ]);
    }
}
