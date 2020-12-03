<?php

namespace App\Code;

use Carbon\Carbon;
use Faker\Generator as Faker;

class Generator
{
    public static function person(array $data, Faker $faker) : string
    {
        $subCategory = $data['sub_category'];
        switch ($subCategory) {
            case 'firstName':
                $gender = strtolower($data['type']);
                return $faker->firstName($gender);

            case 'title':
                $gender = strtolower($data['type']);
                return $faker->firstName($gender);

            case 'lastName':
                return $faker->lastName;

            case 'suffix':
                return $faker->suffix;
        }

        return '';
    }

    public static function address(array $data, Faker $faker)
    {
        $subCategory = $data['sub_category'];
        switch ($subCategory) {
			case 'cityPrefix':
				return $faker->cityPrefix;
			case 'secondaryAddress':
				return $faker->secondaryAddress;
			case 'state':
				return $faker->state;
			case 'stateAbbr':
				return $faker->stateAbbr;
			case 'citySuffix':
				return $faker->citySuffix;
			case 'streetSuffix':
				return $faker->streetSuffix;
			case 'buildingNumber':
				return $faker->buildingNumber;
			case 'city':
				return $faker->city;
			case 'streetName':
				return $faker->streetName;
			case 'streetAddress':
				return $faker->streetAddress;
			case 'postcode':
				return $faker->postcode;
			case 'address':
				return $faker->address;
			case 'country':
				return $faker->country;
			case 'latitude':
				return $faker->latitude($data['min'], $data['max']);
			case 'longitude':
				return $faker->longitude($data['min'], $data['max']);
            default:
                return '';
        }
    }

    public static function phoneNumber(array $data, Faker $faker)
    {
        $subCategory = $data['sub_category'];
        switch ($subCategory) {
            case 'phoneNumber':
				return $faker->phoneNumber;
			case 'tollFreePhoneNumber':
				return $faker->tollFreePhoneNumber;
			case 'e164PhoneNumber':
				return $faker->e164PhoneNumber;
            default:
                return '';
        }
    }

    public static function company(array $data, Faker $faker)
    {
        $subCategory = $data['sub_category'];
        switch ($subCategory) {
            case 'catchPhrase':
				return $faker->catchPhrase;
			case 'company':
				return $faker->company;
			case 'companySuffix':
				return $faker->companySuffix;
			case 'jobTitle':
				return $faker->jobTitle;
            default:
                return '';
        }
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

            case 'dayOfMonth':
                return $faker->dayOfMonth;

            case 'dayOfWeek':
                return $faker->dayOfWeek;

            case 'month':
                return $faker->month;

            case 'monthName':
                return $faker->monthName;

            case 'year':
                return $faker->year;

            case 'century':
                return $faker->century;

            case 'timezone':
                return $faker->timezone;
        }

        return '';
    }
}
