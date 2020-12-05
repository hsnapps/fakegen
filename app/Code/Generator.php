<?php

namespace App\Code;

use Carbon\Carbon;
use Faker\Generator as Faker;

class Generator
{
    public static function generate(string $provider, array $data, Faker $faker) : string
    {
        return self::$provider($data, $faker);
    }

    public static function person(array $data, Faker $faker) : string
    {
        $subCategory = $data['sub_category'];
        $gender = strtolower($data['type']);

        switch ($subCategory) {
            case 'firstName':
                return $faker->firstName($gender);

            case 'title':
                return $faker->title($gender);

            default:
                return $faker->$subCategory;
        }
    }

    public static function address(array $data, Faker $faker) : string
    {
        $subCategory = $data['sub_category'];
        switch ($subCategory) {
			case 'latitude':
				return $faker->latitude($data['min'], $data['max']);
			case 'longitude':
				return $faker->longitude($data['min'], $data['max']);
            default:
                return $faker->$subCategory;
        }
    }

    public static function phoneNumber(array $data, Faker $faker) : string
    {
        $subCategory = $data['sub_category'];
        return $faker->$subCategory;
    }

    public static function company(array $data, Faker $faker) : string
    {
        $subCategory = $data['sub_category'];
        return $faker->$subCategory;
    }

    public static function datetime(array $data, Faker $faker) : string
    {
        $subCategory = $data['sub_category'];
        switch ($subCategory) {
            case 'unixTime':
                return $faker->unixTime($data['init']);

            case 'dateTimeBetween':
                $date = $faker->dateTimeBetween($data['min'], $data['max']);
                return Carbon::parse($date)->format('Y-m-d');

            case 'time':
                return $faker->time();

            default:
                return $faker->$subCategory;
        }

        return '';
    }

    public static function internet(array $data, Faker $faker) : string
    {
        $subCategory = $data['sub_category'];
        switch ($subCategory) {
            case 'password':
                return $faker->password($data['min'], $data['max']);

            default:
                return $faker->$subCategory();
        }

        return '';
    }

    public static function useragent(array $data, Faker $faker) : string
    {
        $subCategory = $data['sub_category'];
        return $faker->$subCategory();
    }

    public static function payment(array $data, Faker $faker) : string
    {
        $subCategory = $data['sub_category'];
        $type = $data['type'];
        $lang = request()->get('lang');
        $valid = __('types.payment.creditCardExpirationDateString.type.0', [], $lang);

        if ($subCategory === 'creditCardExpirationDateString') {
            return $faker->creditCardExpirationDateString($type == $valid);
        }
        if ($subCategory === 'creditCardNumber') {
            return $faker->creditCardNumber($type);
        }
        if ($subCategory === 'iban') {
            $countries = __('countries', [], $lang);
            $code = array_search('Saudi Arabia', $countries, true);
            if ($code === false) {
                return $faker->iban();
            }
            return $faker->iban($code);
        }
        return $faker->$subCategory();
    }

    public static function color(array $data, Faker $faker) : string
    {
        $subCategory = $data['sub_category'];
        return $faker->$subCategory();
    }

    public static function file(array $data, Faker $faker) : string
    {
        $subCategory = $data['sub_category'];
        return $faker->$subCategory();
    }

    public static function barcode(array $data, Faker $faker) : string
    {
        $subCategory = $data['sub_category'];
        return $faker->$subCategory();
    }

    public static function miscellaneous(array $data, Faker $faker) : string
    {
        $subCategory = $data['sub_category'];
        return $faker->$subCategory();
    }

    public static function biased(array $data, Faker $faker) : string
    {
        $subCategory = $data['sub_category'];
        return $faker->$subCategory($data['min'], $data['max']);
    }

    public static function htmlLorem(array $data, Faker $faker) : string
    {
        $subCategory = $data['sub_category'];
        return $faker->$subCategory($data['min'], $data['max']);
    }

    public static function text(array $data, Faker $faker) : string
    {
        $subCategory = $data['sub_category'];
        $min = $data['min'];
        $max = $data['max'];
        $init = $data['init'];

        switch ($subCategory) {
            case 'sentence':
            case 'paragraph':
            case 'text':
                return $faker->$subCategory($init);

            default:
                return $faker->$subCategory($min, $max);
        }
    }

    public static function numbers(array $data, Faker $faker) : string
    {
        $subCategory = $data['sub_category'];
        $type = $data['type'];
        $min = $data['min'];
        $max = $data['max'];

        switch ($subCategory) {
            case 'randomDigitNot':
            case 'randomNumber':
            case 'randomFloat':
            case 'numerify':
            case 'lexify':
            case 'bothify':
            case 'asciify':
            case 'regexify':
                return $faker->$subCategory($type);

            case 'numberBetween':
                return $faker->$subCategory($min, $max);

            default:
                return $faker->$subCategory();
        }
    }
}
