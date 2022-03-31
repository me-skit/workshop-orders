<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $fillable = ['item_id', 'cost', 'price'];

    public function getCostCurrencyFormatAttribute()
    {
        return $this->cost ? "Q " .  number_format($this->cost, 2, '.', '') : "";
    }

    public function getPriceCurrencyFormatAttribute()
    {
        return "Q " .  number_format($this->price, 2, '.', '');
    }
}
