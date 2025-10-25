<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller {
    public function switchLang($lang) {
        // Validate language
        if (!in_array($lang, ['en', 'fr'])) {
            $lang = 'en';
        }

        // Store in session
        Session::put('locale', $lang);

        // Set app locale
        app()->setLocale($lang);

        return redirect()->back();
    }
}

