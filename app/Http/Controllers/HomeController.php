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

        $session = session()->all();
        $table = Arr::except($session, $this->except);
        $sorted = Arr::sort($table, function ($value) {
            return $value['index'];
        });
        // dd($sorted);

        return view('home', [
            'table' => $sorted,
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
        $session = session()->all();
        $table = Arr::except($session, $this->except);
        $data['index'] = count($table);

        session([$key => $data]);

        return back()->with('success', 'Field added successfully..');
    }

    public function removeAllRows()
    {
        $this->removeAll();
        return back()->with('success', 'All feilds have been removed..');
    }

    public function removeRow(Request $request)
    {
        session()->forget($request->key);
        return back()->with('success', 'Row has been removed successfully..');
    }

    public function moveUp(Request $request)
    {
        return $this->move($request->key);
    }

    public function moveDown(Request $request)
    {
        return $this->move($request->key, false);
    }

    private function move($currentKye, $up = true)
    {
        $session = session()->all();
        $table = Arr::except($session, $this->except);
        $current = $table[$currentKye];
        $currentIndex = $current['index'];
        $temp_prev = Arr::where($table, function ($value, $key) use($current, $up) {
            if($up) {
                return $value['index'] == $current['index'] - 1;
            }
            return $value['index'] == $current['index'] + 1;
        });
        $prev = Arr::first($temp_prev, function($value, $key) {
            return $value;
        });
        $prevIndex = $prev['index'];

        foreach ($table as $key => $value) {
            if ($value['index'] === $currentIndex) {
                $table[$key]['index'] = $prevIndex;
                continue;
            }
            if ($value['index'] === $prevIndex) {
                $table[$key]['index'] = $currentIndex;
            }
        }
        $temp = $table;
        $this->removeAll();
        $table = $this->reInsertValues($temp);
        return redirect()->route('home', ['table' => $table]);
    }

    private function removeAll()
    {
        $session = session()->all();
        $table = Arr::except($session, $this->except);
        foreach ($table as $key => $value) {
            session()->forget($key);
        }
    }

    private function reInsertValues($rows) : array
    {
        foreach ($rows as $key => $data) {
            session([$key => $data]);
        }

        $session = session()->all();
        $table = Arr::except($session, $this->except);
        $sorted = Arr::sort($table, function ($value) {
            return $value['index'];
        });
        return $sorted;
    }

    public function generate(Request $request)
    {
        dd($request->all());
        $session = session()->all();
        $table = Arr::except($session, $this->except);
        $faker = \Faker\Factory::create($request->locale);
    }
}
