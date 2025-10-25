<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrencyRateHistory extends Model {
    use HasFactory;

    protected $table = 'currency_rates_history';

    protected $fillable = [
        'currency_id',
        'rate',
        'date'
    ];

    protected $casts = [
        'rate' => 'decimal:6',
        'date' => 'date'
    ];

    public function currency() {
        return $this->belongsTo(Currency::class);
    }
}
