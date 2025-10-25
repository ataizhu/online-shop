<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SetLocale {
    public function handle(Request $request, Closure $next) {
        // Get locale from session, default to 'en'
        $locale = Session::get('locale', 'en');

        // Validate locale
        if (!in_array($locale, ['en', 'fr'])) {
            $locale = 'en';
        }

        // Set application locale
        app()->setLocale($locale);

        return $next($request);
    }
}

