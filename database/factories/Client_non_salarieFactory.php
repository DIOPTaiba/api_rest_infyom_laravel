<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Client_non_salarie;
use Faker\Generator as Faker;

$factory->define(Client_non_salarie::class, function (Faker $faker) {

    return [
        'id_clients' => $faker->randomDigitNotNull,
        'nom' => $faker->word,
        'prenom' => $faker->word,
        'carte_identite' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
