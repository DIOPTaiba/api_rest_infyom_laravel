<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comptes;
use Faker\Generator as Faker;

$factory->define(Comptes::class, function (Faker $faker) {

    return [
        'id_clients' => $faker->randomDigitNotNull,
        'numero_compte' => $faker->word,
        'cle_rib' => $faker->randomDigitNotNull,
        'solde' => $faker->word,
        'date_ouverture' => $faker->date('Y-m-d H:i:s'),
        'numero_agence' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
