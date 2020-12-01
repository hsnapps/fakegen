<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        // $faker = \Faker\Factory::create();
        // $name = $faker->name('male');
        // $date = $faker->iso8601();
        // dd($date);

        return view('home');
    }
}
