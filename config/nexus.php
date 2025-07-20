<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Application Color
    |--------------------------------------------------------------------------
    |
    | The entire interface is built on the basis of this color.
    |
    */

    'color' => env('APP_COLOR', 'ff7f50'), // 4095BF
    'scheme' => 'triadic', // split, analogous or triadic

    /*
    |--------------------------------------------------------------------------
    | Thumbnail Helper
    |--------------------------------------------------------------------------
    |
    | Fields for configuring a helper that creates
    | previews for images of specified dimensions.
    |
    */
    'default_folder' => 'other',
    'default_size' => '500x500',
    'allowed_sizes' => [
        '96x96',
        '320x320',
        '500x500',
        '1000x1000'
    ],

   /*
   |--------------------------------------------------------------------------
   | Price Helper
   |--------------------------------------------------------------------------
   |
   | Settings of the helper that returns the ValueObject of the price.
   |
   */
    'precision' => 100,
    'decimals' => 0,
    'currencies' => [
        'UAH' => '₴',
        'RUB' => '₽',
        'USD' => '$',
        'EUR' => '€',
        'BTC' => '₿',
        'ETH' => 'Ξ',
        'SOL' => '◎',
    ],
];
