<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->sentence(3);
    return [
        'title' => $title, //Laravel Inatallation
        'slug' => Str::slug($title),//laravel-installation
        'description' => $faker->paragraph(3),
        'featured_image' => asset('posts/sample.jpg'),//どこのファイルに写真をしまうか
        //'deleted_at' => NULL
    ];
});
