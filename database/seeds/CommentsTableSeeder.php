<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::insert([
            [
                'title' => 'noice',
                'body' => 'nice car',
                'ad_id' => '1',
                'user_id' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'hello',
                'body' => 'wht so cheap',
                'ad_id' => '3',
                'user_id' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'bullshit',
                'body' => 'this car is trash',
                'ad_id' => '2',
                'user_id' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
