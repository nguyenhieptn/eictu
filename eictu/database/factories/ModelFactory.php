<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt('123456'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\School::class, function (Faker\Generator $faker) {

    return [
        'code' => $faker->company,
        'name' => $faker->name,
        'user_id' => rand(1,10),
    ];
});

$factory->define(App\Major::class, function (Faker\Generator $faker) {

    return [
        'code' => $faker->company,
        'name' => $faker->name,
    ];
});

$factory->define(App\Classes::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'major_id' => rand(1, 49),
    ];
});

$factory->define(App\Student::class, function (Faker\Generator $faker) {

   return [
        'code' => $faker->company,
        'name' => $faker->name,
        'gender'=>rand(0,1),
        'birthday'=>date('2015-12-31'),
        'major_id' => rand(1,10),
        'class_id' => rand(1,10),
        'school_id' => rand(1,10),
    ];
});

$factory->define(App\Motel::class, function (Faker\Generator $faker) {

   return [
       
        'hostess' => $faker->name,
        'address' => $faker->address,
        'date_join'=>date('2016-12-31'),
        'student_id' => rand(1,49),
    ];
});