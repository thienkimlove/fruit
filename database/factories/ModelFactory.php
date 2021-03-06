<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define('App\User', function ($faker) {
   /* return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => str_random(10),
        'remember_token' => str_random(10),
    ];*/

    return [
        'name' => 'Tieungao',
        'email' => 'tieumaster@yahoo.com',
        'password' => bcrypt('232323'),
        'remember_token' => str_random(10),
    ];
});
$factory->define('App\Category', function ($faker) {
    return [
        'title' => $faker->sentence,
        'desc' => $faker->text,
    ];
});

$factory->define('App\Post', function ($faker) {
    return [
        'title' => $faker->sentence,
        'desc' => $faker->text,
        'category_id' => $faker->numberBetween(2, 13),
        'image' => 'default.jpg',
        'content' => $faker->realText(300)
    ];
});
