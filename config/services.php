<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'parameters' => [
        'offer_name' => '{offer_name}',
        'offer_id' => '{offer_id}',
        'click_id' => '{click_id}',
        'ip' =>'{ip}',
        'aff_id' => '{aff_id}',
        'sub_aff_id' => '{sub_aff_id}',
        'useragent' => '{useragent}',
        'country' => '{country}',
        'city' => '{city}',
        'state' => '{state}',
        'timestamp' =>'{timestamp}',
        'os'=>'{os}',
        'os_ver'=>'{os_ver}',
        'deviceid'=>'{deviceid}',
        'androidid'=>'{androidid}',
        'googleaid'=>'{googleaid}',
        'source'=>'{source}',
        'referral'=>'{referral}',
        'sub1'=>'{sub1}',
        'sub2'=>'{sub2}',
        'sub3'=>'{sub3}',
        'sub4'=>'{sub4}',
        'sub5'=>'{sub5}',
        'sub6'=>'{sub6}',
        'sub7'=>'{sub7}',
        'sub8'=>'{sub8}',
        'sub9'=>'{sub9}',
        'sub10'=>'{sub10}'

        ],
'postback_parameters' => [
        'uuid' => '&uuid=',
        'status'=>'&status=',
        'payout'=>'&payout=',
        'currency'=>'&currency=',
        'sale'=>'&sale=',
        'event'=>'&event=',
        'gp_sub1'=>'&gp_sub1=',
        'gp_sub2'=>'&gp_sub2=',
        'gp_sub3'=>'&gp_sub3=',
        'gp_sub4'=>'&gp_sub4=',
        'gp_sub5'=>'&gp_sub5=',
        'gp_sub6'=>'&gp_sub6=',
        'gp_sub7'=>'&gp_sub7=',
        'gp_sub8'=>'&gp_sub8=',
        'gp_sub9'=>'&gp_sub9=',
        'gp_sub10'=>'&gp_sub10='
],

'account_status' => [
        '1' => 'Active',
        '2' => 'Paused',
        '3' => 'Rejected'
],

];
