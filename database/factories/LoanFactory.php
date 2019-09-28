<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Loan;
use Faker\Generator as Faker;

$factory->define(Loan::class, function (Faker $faker) {
    $employments = ['Self-employed', 'Private', 'Government', 'Retired'];

    return [
        'first_name' => $faker->firstName,
        'middle_name' => $faker->lastName,
        'last_name' => $faker->lastName,
        'phone_number' => $faker->phoneNumber,
        'email_address' => $faker->safeEmail,
        'employment' =>$employments[random_int(0, 3)],
        'position' => $faker->jobTitle,
        'amount' => $faker->randomFloat(null, 1000, 100000),
        'payment_term' => $faker->randomDigit,
    ];
});
