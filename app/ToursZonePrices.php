<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToursZonePrices extends Model
{
    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }
}