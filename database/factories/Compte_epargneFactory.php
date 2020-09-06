<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Compte_epargne;
use Faker\Generator as Faker;

$factory->define(Compte_epargne::class, function (Faker $faker) {

    return [
        'id_comptes' => $faker->randomDigitNotNull,
        'frais_ouverture' => $faker->word,
        'montant_remuneration' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
