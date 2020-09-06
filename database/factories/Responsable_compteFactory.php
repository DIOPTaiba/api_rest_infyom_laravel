<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Responsable_compte;
use Faker\Generator as Faker;

$factory->define(Responsable_compte::class, function (Faker $faker) {

    return [
        'login' => $faker->word,
        'mot_de_passe' => $faker->word,
        'id_employes' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
