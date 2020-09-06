<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Operations;
use Faker\Generator as Faker;

$factory->define(Operations::class, function (Faker $faker) {

    return [
        'type_operation' => $faker->word,
        'montant' => $faker->randomDigitNotNull,
        'date_operation' => $faker->date('Y-m-d H:i:s'),
        'id_compte_source_id' => $faker->randomDigitNotNull,
        'id_compte_destinataire_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
