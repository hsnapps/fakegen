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
