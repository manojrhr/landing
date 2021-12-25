<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    public function addresses()
    {
        return $this->hasMany('App\Hotel', 'zone_id');
    }
}
