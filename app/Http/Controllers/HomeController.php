<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $except = [
        '_token',
        '_previous',
        '_flash',
        'success',
        'error',
        'warning',
    ];

    public function home()
    {
        // $faker = \Faker\Factory::create();
        // $name = $faker->name('male');
        // $date = $faker->iso8601();
        // dd($date);

        $table = null;

        // session()->forget('table');

        $session = session()->all();
        $table = Arr::except($session, $this->except);
        // dd($table);

        // if (isset($table)) {
        //     $table = session('table');
        //     dd($table);
        // }

        return view('home', [
            'table' => $table,
        ]);
    }

    public function addFeild(Request $request)
    {
        // dd($request->all());

        $remove_init = false;

        $request->validate([
            'label' => 'required|max:255',
        ]);

        if ($request->category === 'person') {
            if ($request->sub_category === 'firstName') { /* No Validation Required */ }
            if ($request->sub_category === 'lastName') { /* No Validation Required */ }
            if ($request->sub_category === 'title') { /* No Validation Required */ }
            if ($request->sub_category === 'suffix') { /* No Validation Required */ }
        }

        if($request->category === 'datetime') {
            if ($request->sub_category === 'dateTimeBetween') {
                $request->validate([
                    'min' => 'required|date',
                    'max' => 'required|date',
                ]);
                $remove_init = true;
            }
        }

        $data = $request->except('_token');

        // Add `type` entry if not exists
        if (!$request->has('type')) {
            $data['type'] = null;
        }

        // Some categories needs to set `init` to null
        if($remove_init) {
            $data['init'] = null;
        }

        $key = Str::random(40);

        if (session()->has('table')) {
            $table = session('table', []);
            $data['index'] = count($table);
            array_push($table, [$key => $data]);
            session(['table' => $table]);
        } else {
            $data['index'] = 0;
            session([$key => $data]);
        }

        return back()->with('success', 'Field added successfully..');
    }

    public function removeAllRows()
    {
        $session = session()->all();
        $table = Arr::except($session, $this->except);
        foreach ($table as $key => $value) {
            session()->forget($key);
        }
        return back()->with('success', 'All feilds have been removed..');
    }
}
