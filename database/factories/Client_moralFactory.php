<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Client_moral;
use Faker\Generator as Faker;

$factory->define(Client_moral::class, function (Faker $faker) {

    return [
        'id_clients' => $faker->randomDigitNotNull,
        'nom_entreprise' => $faker->word,
        'identifiant_entreprise' => $faker->word,
        'raison_social' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
