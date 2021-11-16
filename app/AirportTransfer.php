<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AirportTransfer extends Model
{
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
