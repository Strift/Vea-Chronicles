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

$factory->define(App\Keyword::class, function (Faker\Generator $faker) {
    return [
        'word' => $faker->name,
        'description' => $faker->sentence,
    ];
});

$factory->define(App\Text::class, function (Faker\Generator $faker) {
	return [
		'title' => $faker->sentence,
		'content' => $faker->text,
	];
});
