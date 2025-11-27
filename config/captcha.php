<?php

return [
    'captcha_enabled' => env('CAPTCHA_ENABLED', false),
    'captcha_sitekey' => env('CAPTCHA_SITEKEY'),
    'captcha_secretkey' => env('CAPTCHA_SECRETKEY'),

    'captcha_sitekey_v2' => env('CAPTCHA_SITEKEY_V2'),
    'captcha_secretkey_v2' => env('CAPTCHA_SECRETKEY_V2')
];
