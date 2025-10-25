<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Currency;
use App\Models\CurrencyRateHistory;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class UpdateCurrencyRates extends Command {
    protected $signature = 'currency:update-rates';
    protected $description = 'Update currency exchange rates from API';

    public function handle() {
        $this->info('Starting currency rates update...');

        $baseCurrency = Currency::where('is_default', true)->first();

        if (!$baseCurrency) {
            $this->error('No default currency found!');
            return 1;
        }

        $this->info("Base currency: {$baseCurrency->code}");

        try {
            $response = Http::get("https://api.exchangerate-api.com/v4/latest/{$baseCurrency->code}");

            if ($response->failed()) {
                throw new \Exception('Failed to fetch currency rates');
            }

            $data = $response->json();
            $rates = $data['rates'] ?? [];

            if (empty($rates)) {
                throw new \Exception('No rates data received');
            }

            $currencies = Currency::where('status', 1)->where('code', '!=', $baseCurrency->code)->get();
            $today = now()->toDateString();
            $updated = 0;

            foreach ($currencies as $currency) {
                if (isset($rates[$currency->code])) {
                    $rate = $rates[$currency->code];

                    $currency->update(['exchange_rate' => $rate]);

                    CurrencyRateHistory::create([
                        'currency_id' => $currency->id,
                        'rate' => $rate,
                        'date' => $today
                    ]);

                    $this->info("{$currency->code}: {$rate}");
                    $updated++;
                }
            }

            $this->info("Successfully updated {$updated} currency rates");
            Log::info("Currency rates updated successfully", ['count' => $updated]);

            return 0;

        } catch (\Exception $e) {
            $this->error('Error updating currency rates: ' . $e->getMessage());
            Log::error('Currency rates update failed', ['error' => $e->getMessage()]);
            return 1;
        }
    }
}
