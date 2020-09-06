<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Client_salarie;
use Faker\Generator as Faker;

$factory->define(Client_salarie::class, function (Faker $faker) {

    return [
        'id_clients' => $faker->randomDigitNotNull,
        'nom' => $faker->word,
        'prenom' => $faker->word,
        'carte_identite' => $faker->word,
        'profession' => $faker->word,
        'salaire' => $faker->word,
        'nom_employeur' => $faker->word,
        'adresse_entreprise' => $faker->word,
        'raison_social' => $faker->word,
        'identifiant_entreprise' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
