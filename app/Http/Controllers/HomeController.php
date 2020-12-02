<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Faker\Factory;
use App\Code\Generator;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\GeneralExport;

class HomeController extends Controller
{
    private $except = [
        '_token',
        '_previous',
        '_flash',
        'success',
        'error',
        'warning',
    ];

    private $log = false;

    public function home()
    {
        return view('home', [
            'table' => $this->getSortedData(),
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

        return $this->getSortedData();
    }

    private function getSortedData() : array
    {
        $session = session()->all();
        $table = Arr::except($session, $this->except);
        if ($this->log) {
            logger($table);
        }
        $sorted = Arr::sort($table, function ($value) {
            if (is_array($value)) {
                if (in_array('index', $value, true)) {
                    return $value['index'];
                }
            }
        });

        return $sorted;
    }

    public function generate(Request $request)
    {
        // dd($request->all());

        $this->log = true;

        $format = strtolower($request->format);
        $table = $this->getSortedData();
        $faker = Factory::create($request->locale);
        $data = [];

        switch ($format) {
            case 'xlsx':
            case 'csv':
            case 'tsv':
            case 'ods':
            case 'xls':
            case 'html':
                $fileName = 'generated_values.'.$format;
                break;

            default:
            $fileName = 'generated_values.pdf';
                break;
        }

        foreach ($table as $key => $value) {
            $header = $value['label'];
            if ($value['category'] === 'person') {
                for ($i=0; $i < $request->number; $i++) {
                    $data[$header][$i] = Generator::person($value, $faker);
                }
            }

            if ($value['category'] === 'datetime') {
                for ($i=0; $i < $request->number; $i++) {
                    $data[$header][$i] = Generator::datetime($value, $faker);
                }
            }
        }

        $export = new GeneralExport($data);
        if (Excel::store($export, $fileName, 'downloads')) {
            return back()->with('file', 'To download file click here');
        }

        // return back()->with('error', 'Error in generating file!');
        return redirect()->route('home', ['table' => $table])->with('error', 'Error in generating file!');
    }
}
