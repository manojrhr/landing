<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Models extends Model
{
    protected $fillable = [
        'name',
    ];

    public function make()
    {
        return $this->belongsTo(Make::class);
    }
}
