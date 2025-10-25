<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Currency;

class SetCurrency {
    private $currencyByCountry = [
        'CH' => 'CHF',
        'LI' => 'CHF',

        'US' => 'USD',
        'UM' => 'USD',
        'VI' => 'USD',
        'PR' => 'USD',
        'GU' => 'USD',
        'AS' => 'USD',
        'EC' => 'USD',
        'PA' => 'USD',
        'SV' => 'USD',

        'AT' => 'EUR',
        'BE' => 'EUR',
        'CY' => 'EUR',
        'EE' => 'EUR',
        'FI' => 'EUR',
        'FR' => 'EUR',
        'DE' => 'EUR',
        'GR' => 'EUR',
        'IE' => 'EUR',
        'IT' => 'EUR',
        'LV' => 'EUR',
        'LT' => 'EUR',
        'LU' => 'EUR',
        'MT' => 'EUR',
        'NL' => 'EUR',
        'PT' => 'EUR',
        'SK' => 'EUR',
        'SI' => 'EUR',
        'ES' => 'EUR',
        'AD' => 'EUR',
        'MC' => 'EUR',
        'SM' => 'EUR',
        'VA' => 'EUR',
        'ME' => 'EUR',
        'XK' => 'EUR',
    ];

    public function handle(Request $request, Closure $next) {
        if (!session()->has('currency_code') && !auth()->check()) {
            $currencyCode = $this->detectCurrencyByIp($request->ip());
            session(['currency_code' => $currencyCode]);
        }

        return $next($request);
    }

    private function detectCurrencyByIp($ip) {
        if ($ip === '127.0.0.1' || $ip === '::1') {
            return 'CHF';
        }

        try {
            $response = Http::timeout(3)->get("http://ip-api.com/json/{$ip}?fields=countryCode");

            if ($response->successful()) {
                $data = $response->json();
                $countryCode = $data['countryCode'] ?? null;

                if ($countryCode && isset($this->currencyByCountry[$countryCode])) {
                    $currencyCode = $this->currencyByCountry[$countryCode];

                    $exists = Currency::where('code', $currencyCode)
                        ->where('status', 1)
                        ->exists();

                    if ($exists) {
                        return $currencyCode;
                    }
                }
            }
        } catch (\Exception $e) {
            \Log::warning('Currency detection failed', ['error' => $e->getMessage()]);
        }

        return 'CHF';
    }
}
