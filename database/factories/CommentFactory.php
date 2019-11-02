<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
		'body' => $faker->sentence,
		'ad_id' => function() {
            return factory(App\Ad::class)->create()->id;
        },
    ];
});
