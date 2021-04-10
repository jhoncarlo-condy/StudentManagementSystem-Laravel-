<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {

    return [
        'name_id'=> 1,
        'stud_id'=> $faker->numerify('C-###-21'),
        'age'=> $faker->numberBetween($min=10,$max=18),
        'grade_level'=> 'Grade ' . $faker->numberBetween($min=1,$max=12),
    ];
});
