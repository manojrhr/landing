<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'house_no', 'area', 'city', 'state', 'pin','landmark','tag'
    ];
}
