<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Student::class, function (Faker $faker) {
    return [
        'name' => Str::random(10),
        'course' => Str::random(10),
        'created_at' => time(),
        'updated_at' => time()
    ];
});
