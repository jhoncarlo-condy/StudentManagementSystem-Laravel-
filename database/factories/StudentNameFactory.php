<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\StudentName;
use Faker\Generator as Faker;

$factory->define(StudentName::class, function (Faker $faker) {
    return [
        'FirstName'=>$faker->firstName(),
        'MiddleName'=>$faker->lastName,
        'LastName'=>$faker->lastName,
    ];
});
