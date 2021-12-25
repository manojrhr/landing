<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    public function country()
    {
        return $this->belongsTo(Zone::class);
    }
}
