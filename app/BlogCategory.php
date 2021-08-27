<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    public function post()
    {
        return $this->hasMany(Blog::class);
    }
}
