<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Currency;

class CurrencyController extends Controller {
    public function switchCurrency(Request $request) {
        $currencyCode = $request->input('currency');

        $currency = Currency::where('code', $currencyCode)
            ->where('status', 1)
            ->first();

        if (!$currency) {
            return response()->json([
                'success' => false,
                'message' => 'Currency not found'
            ], 404);
        }

        if (auth()->check()) {
            auth()->user()->update(['currency_id' => $currency->id]);
        }

        session(['currency_code' => $currency->code]);

        return response()->json([
            'success' => true,
            'message' => 'Currency switched successfully',
            'currency' => [
                    'code' => $currency->code,
                    'symbol' => $currency->symbol
                ]
        ]);
    }
}
