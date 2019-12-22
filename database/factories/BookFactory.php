<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\book;
use Faker\Generator as Faker;

$factory->define(book::class, function (Faker $faker) {
    return [
        for ($i=1; $i <= 25 ; $i++) { 
        	'book_name'     	=> $faker->name,
	        'book_language' 	=> 'english',
	        'book_description'  => $faker->sentence($nbWords = 6, $variableNbWords = true),
        }
    ];
});
