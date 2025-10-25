<?php

use App\Models\Currency;

if (!function_exists('getCurrentCurrency')) {
    function getCurrentCurrency()
    {
        if (auth()->check() && auth()->user()->currency_id) {
            return Currency::find(auth()->user()->currency_id);
        }

        if (session()->has('currency_code')) {
            return Currency::where('code', session('currency_code'))->first();
        }

        return Currency::getDefault();
    }
}

if (!function_exists('convertPrice')) {
    function convertPrice($price, $toCurrencyCode = null)
    {
        if (!$toCurrencyCode) {
            $currency = getCurrentCurrency();
            $toCurrencyCode = $currency ? $currency->code : 'CHF';
        }

        $baseCurrency = Currency::where('is_default', true)->first();
        $targetCurrency = Currency::where('code', $toCurrencyCode)->first();

        if (!$targetCurrency || !$baseCurrency) {
            return $price;
        }

        if ($baseCurrency->code === $targetCurrency->code) {
            return $price;
        }

        return round($price * $targetCurrency->exchange_rate, 2);
    }
}

if (!function_exists('formatPrice')) {
    function formatPrice($price, $withCurrency = true)
    {
        $currency = getCurrentCurrency();
        
        if (!$currency) {
            $currency = Currency::getDefault();
        }

        $convertedPrice = convertPrice($price, $currency->code);
        
        if ($withCurrency) {
            return $currency->symbol . ' ' . number_format($convertedPrice, 2);
        }

        return number_format($convertedPrice, 2);
    }
}

if (!function_exists('getCurrencySymbol')) {
    function getCurrencySymbol()
    {
        $currency = getCurrentCurrency();
        return $currency ? $currency->symbol : 'CHF';
    }
}

if (!function_exists('getActiveCurrencies')) {
    function getActiveCurrencies()
    {
        return Currency::getActive();
    }
}

