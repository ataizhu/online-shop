<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model {
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'symbol',
        'exchange_rate',
        'is_default',
        'status'
    ];

    protected $casts = [
        'exchange_rate' => 'decimal:6',
        'is_default' => 'boolean',
        'status' => 'integer'
    ];

    public function ratesHistory() {
        return $this->hasMany(CurrencyRateHistory::class);
    }

    public function users() {
        return $this->hasMany(User::class);
    }

    public static function getDefault() {
        return self::where('is_default', true)->where('status', 1)->first();
    }

    public static function getActive() {
        return self::where('status', 1)->orderBy('code')->get();
    }
}
