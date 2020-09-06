<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Etat_compte;
use Faker\Generator as Faker;

$factory->define(Etat_compte::class, function (Faker $faker) {

    return [
        'etat_compte' => $faker->word,
        'date_changement_etat' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
