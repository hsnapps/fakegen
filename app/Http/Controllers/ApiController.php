<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getCategories()
    {
        return response()->json(__('categories'));
    }

    public function getSubCategories($category)
    {
        $data = [];
        $types = __('types')[$category];
        foreach ($types as $key => $value) {
            $data[$key] = $value['title'];
        }

        return response()->json($data);
    }

    public function render($category, $subcategory)
    {
        $data = __('types')[$category][$subcategory];
        return response()->json($data);
    }
}
