<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getCategories(Request $request)
    {
        return response()->json(__('categories', [], $request->lang));
    }

    public function getSubCategories(Request $request, $category)
    {
        $data = [];
        $types = __('types', [], $request->lang)[$category];
        foreach ($types as $key => $value) {
            $data[$key] = $value['title'];
        }

        return response()->json($data);
    }

    public function render(Request $request, $category, $subcategory)
    {
        $data = __('types', [], $request->lang)[$category][$subcategory];
        return response()->json($data);
    }

    public function getMessage(Request $request, $key)
    {
        return __('app.messages.'.$key, [], $request->lang);
    }

    public function getButtons(Request $request)
    {
        $ok = __('app.messages.ok', [], $request->lang);
        $cancel = __('app.messages.cancel', [], $request->lang);
        logger([
            'lang: '.$ok,
            'ok: '.$request->lang,
            'cancel: '.$cancel,
        ]);
        return response()->json([
            'ok' => $ok,
            'cancel' => $cancel,
        ]);
    }
}
