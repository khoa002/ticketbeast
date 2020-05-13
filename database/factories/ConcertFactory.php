<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Concert;
use Carbon\Carbon;
use Faker\Generator as Faker;

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

$factory->define(Concert::class, function (Faker $faker) {
    return [
        'title'                  => 'Example Band',
        'subtitle'               => 'with Fake and Openers',
        'date'                   => Carbon::parse('+2 weeks'),
        'ticket_price'           => 2199,
        'venue'                  => 'The Example Theater',
        'venue_address'          => '123 Example Lane',
        'venue_city'             => 'Fake Phoenix',
        'venue_state'            => 'AZ',
        'venue_zip'              => '85210',
        'additional_information' => 'Some sample additional information.',
    ];
});
