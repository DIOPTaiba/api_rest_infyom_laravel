<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Compte_bloque;
use Faker\Generator as Faker;

$factory->define(Compte_bloque::class, function (Faker $faker) {

    return [
        'id_comptes' => $faker->randomDigitNotNull,
        'frais_ouverture' => $faker->word,
        'montant_remuneration' => $faker->word,
        'duree_blocage' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
