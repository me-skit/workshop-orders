<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['description'];

    public function prices()
    {
        return $this->hasMany(Price::class);
    }

    public function current_price()
    {
        return $this->hasOne(Price::class)->latest();
    }
}
