<?php

use Carbon\Carbon;
use Faker\Generator as Faker;
use App\User;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'verified' => $verivied = $faker->randomElement([User::VERIFIED_USER, User::UNVERIFIED_USER]),
        'verification_token' => $verivied == User::VERIFIED_USER ? null : User::generateVerificationCode(),
        'admin' => $verivied = $faker->randomElement([User::ADMIN_USER, User::REGULAR_USER]),

    ];
});


$factory->define(\App\Concert::class, function (Faker $faker) {
    return [
        'title' => 'The Red Chord',
        'subtitle' => 'with Ann',
        'date' => Carbon::parse('+2 weeks'),
        'ticket_price' => 2000,
        'venue' => 'The Mosh Pit',
        'venue_address' => '123 Example Lane',
        'city' => 'Minsk',
        'state' => 'ON',
        'zip' => '225320',
        'additional_information' => 'For tickets, call + 375 25 2345465.'
    ];
});
