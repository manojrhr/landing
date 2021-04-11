<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JetSki extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'description', 'price', 'captain', 'capacity', 'image', 'images', 'lat', 'long', 'city', 'state', 'country', 'user_id', 'price_unit', 'make_id', 'model_id', 'insurance', 'cancel_policy_id'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
