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
        'title', 'slug', 'description', 'price', 'captain', 'capacity', 'image', 'images', 'lat', 'long', 'city', 'state', 'country', 'user_id', 'price_unit', 'make_id', 'year', 'model_id', 'insurance', 'cancel_policy_id'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function model()
    {
        return $this->belongsTo('App\Models');
    }

    public function make()
    {
        return $this->belongsTo('App\make');
    }

    public function cancel_policy()
    {
        return $this->belongsTo('App\cancel_policy');
    }
}
