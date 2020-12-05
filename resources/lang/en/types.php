<?php

use Illuminate\Support\Arr;

return [
    'person' => [
        'title' => [
            'title' => 'Title',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => ['Any', 'Male', 'Female'],
        ],
        'suffix' => [
            'title' => 'Suffix',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
        ],
        'firstName' => [
            'title' => 'First Name',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => ['Any', 'Male', 'Female'],
        ],
        'lastName' => [
            'title' => 'Last Name',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
        ],
    ],
    'address' => [
        'cityPrefix' => [
            'title' => 'City Prefix',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
        ],
        'secondaryAddress' => [
            'title' => 'Secondary Address',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
        ],
        'state' => [
            'title' => 'State',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
        ],
        'stateAbbr' => [
            'title' => 'State Abbreviation',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
        ],
        'citySuffix' => [
            'title' => 'City Suffix',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
        ],
        'streetSuffix' => [
            'title' => 'Street Suffix',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
        ],
        'buildingNumber' => [
            'title' => 'Building Number',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
        ],
        'city' => [
            'title' => 'City',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
        ],
        'streetName' => [
            'title' => 'Street Name',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
        ],
        'streetAddress' => [
            'title' => 'Street Address',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
        ],
        'postcode' => [
            'title' => 'Postcode',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
        ],
        'address' => [
            'title' => 'Full Address',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
        ],
        'country' => [
            'title' => 'Country',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
        ],
        'latitude' => [
            'title' => 'Latitude',
            'size' => null,
            'min' => -90,
            'max' => 90,
            'init' => null,
            'type' => 'number',
        ],
        'longitude' => [
            'title' => 'Longitude',
            'size' => null,
            'min' => -180,
            'max' => 180,
            'init' => null,
            'type' => 'number',
        ],
    ],
    'phoneNumber' => [
        'phoneNumber' => [
            'title' => 'Phone Number',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
        ],
        'tollFreePhoneNumber' => [
            'title' => 'Toll Free Number',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
        ],
        'e164PhoneNumber' => [
            'title' => 'E-164 Phone Number',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
        ],
    ],
    'company' => [
        'catchPhrase' => [
            'title' => 'Catchphrase',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
        ],
        'company' => [
            'title' => 'Company Name',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
        ],
        'companySuffix' => [
            'title' => 'Company Suffix',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
        ],
        'jobTitle' => [
            'title' => 'Job Title',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
        ],
    ],
    'datetime' => [
        'unixTime' => [
            'title' => 'UNIX Time',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => now()->format('Y-m-d'),
            'type' => 'date',
        ],
        'dateTimeBetween' => [
            'title' => 'Date',
            'size' => null,
            'min' => now()->subYears(30)->format('Y-m-d'),
            'max' => now()->format('Y-m-d'),
            'init' => null,
            'type' => null,
        ],
        'time' => [
            'title' => 'Time',
            'size' => null,
            'min' => '00:00',
            'max' => '23:59',
            'init' => null,
            'type' => null,
        ],
        'dayOfMonth' => [
            'title' => 'Day Of Month',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
        ],
        'dayOfWeek' => [
            'title' => 'Day Of Week',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
        ],
        'month' => [
            'title' => 'Month',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
        ],
        'monthName' => [
            'title' => 'MonthName',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
        ],
        'year' => [
            'title' => 'Year',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
        ],
        'century' => [
            'title' => 'Century',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
        ],
        'timezone' => [
            'title' => 'Timezone',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
        ],
    ],
    'internet' => [
        'email' => [
            'title' => 'Email',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => 'Generate an email address: orval.treutel@blick.com, hickle.lavern@erdman.com',
        ],
        'safeEmail' => [
            'title' => 'Safe Email',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => 'Generate a safe email address: spencer.ricardo@example.com, wolf.sabryna@example.org',
        ],
        'freeEmail' => [
            'title' => 'Free Email',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => 'Generate a free email address (free, as in, free sign-up): marcelino.hyatt@yahoo.com, abby81@gmail.com',
        ],
        'companyEmail' => [
            'title' => 'Company Email',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => 'Generate a company email: hschinner@reinger.net, paula.blick@hessel.com',
        ],
        'freeEmailDomain' => [
            'title' => 'Free Email Domain',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => 'Generate a free email domain name: gmail.com, hotmail.com',
        ],
        'safeEmailDomain' => [
            'title' => 'Safe Email Domain',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => 'Generate a safe email domain: example.net, example.org',
        ],
        'userName' => [
            'title' => 'User Name',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => 'Generate a username: ipaucek, homenick.alexandre',
        ],
        'password' => [
            'title' => 'Password',
            'size' => null,
            'min' => 6,
            'max' => 20,
            'init' => null,
            'type' => 'number',
            'help' => 'Generate a password, with a given minimum and maximum length.',
        ],
        'domainName' => [
            'title' => 'Domain Name',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => 'Generate a domain name: toy.com, schamberger.biz',
        ],
        'domainWord' => [
            'title' => 'Domain Word',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => 'Generate a domain word: feil, wintheiser',
        ],
        'tld' => [
            'title' => 'TLD',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => 'Generate a tld (top-level domain): com, org',
        ],
        'url' => [
            'title' => 'URL',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => 'Generate a URL: http://cormier.info/eligendi-rem-omnis-quia.html, http://pagac.com/',
        ],
        'slug' => [
            'title' => 'Slug',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => 'Generate a slug, with a given amount of words. By default, the amount of words it set to 6: ipsa-consectetur-est, quia-ad-nihil',
        ],
        'ipv4' => [
            'title' => 'IP v4',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => 'Generate an IPv4 address: 90.119.172.201, 84.172.232.19',
        ],
        'localIpv4' => [
            'title' => 'Local IP v4',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => 'Generate an IPv4 address, inside a local subnet: 192.168.85.208, 192.168.217.138',
        ],
        'ipv6' => [
            'title' => 'IP v6',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => 'Generate an IPv6 address: c3f3:40ed:6d6c:4e8e:746b:887a:4551:42e5, 1c3d:a2cf:80ad:f2b6:7794:4f3f:f9fb:59cf',
        ],
        'macAddress' => [
            'title' => 'MAC Address',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => 'Generate a random MAC address: 94:00:10:01:58:07, 0E:E1:48:29:2F:E2',
        ],
    ],
    'useragent' => [
        'userAgent' => [
            'title' => 'User Agent',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => 'Generate a user agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/5350 (KHTML, like Gecko) Chrome/37.0.806.0 Mobile Safari/5350',
        ],
        'chrome' => [
            'title' => 'Chrome',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => 'Generate a user agent that belongs to Google Chrome: Mozilla/5.0 (Macintosh; PPC Mac OS X 10_8_1) AppleWebKit/5352 (KHTML, like Gecko) Chrome/40.0.848.0 Mobile Safari/5352',
        ],
        'firefox' => [
            'title' => 'FireFox',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => 'Generate a user agent that belongs to Mozilla Firefox: Mozilla/5.0 (X11; Linux i686; rv:7.0) Gecko/20121220 Firefox/35.0',
        ],
        'safari' => [
            'title' => 'Safari',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => 'Generate a user agent that belongs to Apple Safari: Mozilla/5.0 (Macintosh; PPC Mac OS X 10_8_3 rv:5.0; sl-SI) AppleWebKit/532.33.2 (KHTML, like Gecko) Version/5.0 Safari/532.33.2',
        ],
        'opera' => [
            'title' => 'Opera',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => 'Generate a user agent that belongs to Apple Opera: Opera/8.55 (Windows 95; en-US) Presto/2.9.286 Version/11.00',
        ],
        'internetExplorer' => [
            'title' => 'Internet Explorer',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => 'Generate a user agent that belongs to Internet Explorer: Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 5.0; Trident/5.1)',
        ],
    ],
    'payment' => [
        'creditCardType' => [
            'title' => 'Credit Card Type',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => 'Generate a credit card type: MasterCard, Visa',
        ],
        'creditCardNumber' => [
            'title' => 'Credit Card Number',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => [
                'Any',
                'Visa',
                'MasterCard',
                'American Express',
                'Discover Card',
                'Visa Retired',
            ],
            'help' => "Generate a credit card number ('Visa', ' MasterCard', 'American Express' and 'Discover'): '4624-6303-5483-5433', '4916-3711-2654-8734'",
        ],
        'creditCardExpirationDateString' => [
            'title' => 'Credit Card Expiration Date',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => ['Valid', 'Expired'],
            'help' => 'Generate a credit card expiration date.',
        ],
        'iban' => [
            'title' => 'IBAN',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => Arr::flatten(__('countries')),
            'help' => "Generate an IBAN string with a given country from the 'type' menu: 'LI2690204NV3C0BINN164', 'NL56ETEE3836179630'",
        ],
        'swiftBicNumber' => [
            'title' => 'SWIFT/BIC Number',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => "Generate a random SWIFT/BIC number: 'OGFCTX2GRGN', 'QFKVLJB7'",
        ],
    ],
    'color' => [
        'hexColor' => [
            'title' => 'HEX Color',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => 'Generate a random hex color: #ccd578, #fafa11, #ea3781',
        ],
        'safeHexColor' => [
            'title' => 'Safe HEX Color',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => 'Generate a random hex color, containing only 16 values per R, G and B: #00eecc, #00ff88, #00aaee',
        ],
        'rgbColor' => [
            'title' => 'RGB Color',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => "Generate a comma-separated RGB color: '105,224,78', '97,249,98', '24,250,221'",
        ],
        'rgbCssColor' => [
            'title' => 'RGB CSS Color',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => "Generate a CSS-friendly RGB color: 'rgb(9,110,101)', 'rgb(242,133,147)', 'rgb(124,64,0)'",
        ],
        'rgbaCssColor' => [
            'title' => 'RGBA CSS Color',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => "Generate a CSS-friendly RGBA (alpha channel) color: 'rgba(179,65,209,1)', 'rgba(121,53,231,0.4)', 'rgba(161,239,152,0.9)'",
        ],
        'safeColorName' => [
            'title' => 'Safe Color Name',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => "Generate a CSS-friendly color name: 'white', 'fuchsia', 'purple'",
        ],
        'colorName' => [
            'title' => 'Color Name',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => "Generate a CSS-friendly color name: 'SeaGreen', 'Crimson', 'DarkOliveGreen'",
        ],
        'hslColor' => [
            'title' => 'HSL Color',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => "Generate a random HSL color: '87,10,25', '94,24,27', '207,68,84'",
        ],
    ],
    'file' => [
        'mimeType' => [
            'title' => 'MIME Type',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => "Generate a random MIME-type: 'application/vnd.ms-artgalry', 'application/mods+xml', 'video/x-sgi-movie'",
        ],
        'fileExtension' => [
            'title' => 'File Extension',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => "Generate a random file extension type: 'deb', 'mp4s', 'uvg'",
        ],
    ],
    'uuid' => [
        'uuid' => [
            'title' => 'UUID',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => "Generate a random UUID: 'bf91c434-dcf3-3a4c-b49a-12e0944ef1e2', '5b2c0654-de5e-3153-ac1f-751cac718e4e'",
        ],
    ],
    'barcode' => [
        'ean13' => [
            'title' => 'EAN-13',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => "Generate a random EAN-13 barcode: '5803352818140', '4142935337533'",
        ],
        'ean8' => [
            'title' => 'EAN-8',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => "Generate a random EAN-8 barcode: '30272446', '00484527'",
        ],
        'isbn10' => [
            'title' => 'ISBN-10',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => "Generate a random ISBN-10 compliant: '4250151735', '8395066937'",
        ],
        'isbn13' => [
            'title' => 'ISBN-13',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => "Generate a random ISBN-13 compliant: '9786881116078', '9785625528412'",
        ],
    ],
    'miscellaneous' => [
        'boolean' => [
            'title' => 'Boolean',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => "Generate a random: true, true, false",
        ],
        'md5' => [
            'title' => 'MD5',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => "Generate a random MD5 hash: 'b1f447c2ee6029c7d2d8b3112ecfb160', '6d5d81469dfb247a15c9030d5aae38f1'",
        ],
        'sha1' => [
            'title' => 'SHA-1',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => "Generate a random SHA-1 hash: '20d1061c44ca4eef07e8d129c7000101b3e872af', '28cda1350140b3465ea8f65b933b1dad98ee5425'",
        ],
        'sha256' => [
            'title' => 'SHA-256',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => "Generate a random SHA-256 hash: 'bfa80759a5c40a8dd6694a3752bac231ae49c136396427815b0e33bd10974919'",
        ],
        'locale' => [
            'title' => 'Locale',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => "Generate a random locale: 'ln_CD', 'te_IN', 'sh_BA'",
        ],
        'countryISOAlpha3' => [
            'title' => 'ISO Country Code',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => "Generate a random three-letter country code: 'ZAF', 'UKR', 'MHL'",
        ],
        'countryCode' => [
            'title' => 'Country Code',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => "Generate a random two-letter country code: 'LK', 'UM', 'CZ'",
        ],
        'languageCode' => [
            'title' => 'Language Code',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => "Generate a random two-letter language code: 'av', 'sc', 'as'",
        ],
        'currencyCode' => [
            'title' => 'Currency Code',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => "Generate a random current code: 'AED', 'SAR', 'KZT'",
        ],
    ],
    'biased' => [
        'biasedNumberBetween' => [
            'title' => 'Biased Number',
            'size' => null,
            'min' => 0,
            'max' => 20,
            'init' => null,
            'type' => 'number',
            'help' => "",
        ],
    ],
    'htmllorem' => [
        'htmlLorem' => [
            'title' => 'HTML Lorem',
            'size' => null,
            'min' => 1,
            'max' => 4,
            'init' => null,
            'type' => 'number',
            'help' => "Generate a random HTML string, with a given maximum depth and width. By default, the depth and width are 4",
        ],
    ],
    'text' => [
        'words' => [
            'title' => 'Words',
            'size' => null,
            'min' => 1,
            'max' => 255,
            'init' => null,
            'type' => 'number',
            'help' => "Generate a group of random words, number of words will be between min and max",
        ],
        'sentence' => [
            'title' => 'Sentence',
            'size' => null,
            'min' => 1,
            'max' => 100,
            'init' => null,
            'type' => 'number',
            'help' => "Generate a sentence containing a given amount of words. By default, 6 words is used.",
        ],
        'paragraph' => [
            'title' => 'Paragraph',
            'size' => null,
            'min' => 1,
            'max' => 6,
            'init' => null,
            'type' => 'number',
            'help' => "Generate a paragraph of text, containing a given amount of sentences.",
        ],
        'text' => [
            'title' => 'Text',
            'size' => null,
            'min' => 1,
            'max' => 512,
            'init' => null,
            'type' => 'number',
            'help' => "Generate a random string of text, with the given amount of words.",
        ],
    ],
    'numbers' => [
        'randomDigit' => [
            'title' => 'Random Digit',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => "Generates a random integer from 0 until 9.",
        ],
        'randomDigitNot' => [
            'title' => 'Random Digit NOT',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
            'help' => "Generates a random integer from 0 until 9, excluding a given number (In the type field)",
        ],
        'randomDigitNotNull' => [
            'title' => 'Random Digit Not Zero',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => "Generates a random integer from 1 until 9.",
        ],
        'randomNumber' => [
            'title' => 'Random Number',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => 5,
            'type' => 'number',
            'help' => "Generates a random integer, you can specify the number of digits in the init field",
        ],
        'randomFloat' => [
            'title' => 'Random Float',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => [1, 2, 3, 4],
            'help' => "Generates a random float. You can specify the amount of decimals in the type field.",
        ],
        'numberBetween' => [
            'title' => 'Number Between',
            'size' => null,
            'min' => 0,
            'max' => 2147483647,
            'init' => null,
            'type' => 'number',
            'help' => "Generates a random integer between min and max. By default, an integer is generated between 0 and 2,147,483,647 (32-bit integer).",
        ],
        'randomLetter' => [
            'title' => 'Random Letter',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => null,
            'type' => null,
            'help' => "Generates a random character from the alphabet: 'h', 'i', 'q'",
        ],
        'numerify' => [
            'title' => 'Numerify',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => 'user-####',
            'type' => null,
            'help' => "Generate a string where all # characters are replaced by digits between 0 and 10. By default, ### is used as input.",
        ],
        'lexify' => [
            'title' => 'Lexify',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => 'id-????',
            'type' => null,
            'help' => "Generate a string where all ? characters are replaces with a random letter from the Latin alphabet. By default, ???? is used as input.",
        ],
        'bothify' => [
            'title' => 'Both Numerify & Lexify',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => '?????-#####',
            'type' => null,
            'help' => "Generate a string where ? characters are replaced with a random letter, and # characters are replaces with a random digit between 0 and 10. By default, ## ?? is used as input.",
        ],
        'asciify' => [
            'title' => 'ASCIIfy',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => 'user-****',
            'type' => null,
            'help' => "Generate a string where * characters are replaced with a random character from the ASCII table. By default, **** is used as input: 'user-ntwx', 'user-PK`A', 'user-n`,X'",
        ],
        'regexify' => [
            'title' => 'Regexify',
            'size' => null,
            'min' => null,
            'max' => null,
            'init' => '[A-Z]{5}[0-4]{3}',
            'type' => null,
            'help' => "Generate a random string based on a regex. By default, an empty string is used as input.",
        ],
    ],
];
