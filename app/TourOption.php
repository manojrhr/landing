<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourOption extends Model
{
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
