<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Clients;
use Faker\Generator as Faker;

$factory->define(Clients::class, function (Faker $faker) {

    return [
        'id_responsable_compte' => $faker->randomDigitNotNull,
        'adresse' => $faker->word,
        'telephone' => $faker->word,
        'email' => $faker->word,
        'date_inscription' => $faker->date('Y-m-d H:i:s'),
        'type_client' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
