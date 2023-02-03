<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Post;
use App\Category;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(5),
        'content' => $faker->text,
        'image' => $faker->imageUrl(),
        'likes' => random_int(1, 1000),
        'is_published' => 1,
        'category_id' => Category::get()->random()->id
    ];
});
