<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Offers;
use Faker\Generator as Faker;

$factory->define(Offers::class, function (Faker $faker) {
    return [
        // 'offerid'=>$faker->randomNumber($nbDigits = NULL, $strict = false),
        'user_id'=>factory('App\User'),
        'offer_name'=>$faker->name,
        'advertiserId'=>$faker->randomNumber($nbDigits = NULL, $strict = false),
        'offer_category'=>$faker->title,
        'modelIn'=>$faker->randomElement($revenue = array('RPI','RPA','RPR','RPL')),
        'priceIn'=>$faker->randomDigit,
        'ModelOut'=>$faker->randomElement($cost = array('CPI','CPA','CPR','CPL')),
        'priceOut'=>$faker->randomDigit,
        'offer_currency'=>$faker->randomElement($currency = array('USD','AUD','CAD','PAK','INR')),
        'offer_logo'=>$faker->imageUrl($width = 480, $height = 480),
        'offer_preview'=>$faker->url,
        'offer_url'=>$faker->url,
        'offer_terms'=>$faker->paragraph,
        'offer_KPI'=>$faker->sentence,
        'payoutRules'=>$faker->word,
        'offer_start_date'=>$faker->dateTime(),
        'offer_end_date'=>$faker->dateTime(),
        'offer_access'=>$faker->randomElement($permission = array('open','ondemand','private')),
        'offer_status'=>$faker->randomElement($status = array('active','pending','ended')),
    ];
});
