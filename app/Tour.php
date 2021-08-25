<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    public function options()
    {
        return $this->hasMany(TourOption::class);
    }

    public function option()
    {
        return $this->hasMany(TourOption::class)->take(1);
    }
}
