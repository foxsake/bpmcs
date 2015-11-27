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

$factory->define(App\MemApplicant::class, function (Faker\Generator $faker) {
    return [
        'lName' => $faker->lastName,
        'fName' => $faker->firstName,
        'mName' => $faker->lastName,
        'gender' => $faker->randomElement($array = array ('m','f')),
        'addr' => $faker->address,
        'bDay' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'religion' => $faker->word,
        'civilStatus' => $faker->word,
        'spouce' => $faker->name,
        'highestEd' => $faker->word,
        'occupation' => $faker->word,
        'beneficiary' => $faker->name,
        'relToMem' => $faker->word,
        'contact' => $faker->phoneNumber,
        'initShare' => $faker->randomNumber($nbDigits = NULL),
        'amntShare' => $faker->randomNumber($nbDigits = NULL),
        'initCBU' => $faker->randomNumber($nbDigits = NULL),
        'landArea' => $faker->randomNumber($nbDigits = NULL),
        'credLine' => $faker->randomNumber($nbDigits = NULL),
        'municipality' => $faker->word,
        'barangay' => $faker->word,
        'ownType' => $faker->word,
        'email' => $faker->email
    ];
});
