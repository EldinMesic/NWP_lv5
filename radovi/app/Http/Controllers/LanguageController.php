<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
class LanguageController extends Controller
{
    public function switchLang(Request $request)
    {
        $lang = $request->input('locale');
        if (in_array($lang, ['en', 'hr'])) {
            session()->put('applocale', $lang);
        }
        return redirect()->back();
    }
}
