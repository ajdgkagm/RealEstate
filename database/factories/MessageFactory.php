<?php

use Faker\Generator as Faker;

$factory->define(App\Message::class, function (Faker $faker) {
    return [
        'from'    => $faker->numberBetween(0, 2),
        'to'      => $faker->numberBetween(0, 2),
        'name'    => $faker->name,
        'email'   => $faker->unique()->safeEmail,
        'contact' => 123456789,
        'read'    => $faker->boolean(),
        'content' => $faker->text(),
    ];
});
