<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JetSki extends Model
{
    protected $table = 'jet_skis';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'description', 'price', 'captain', 'capacity', 'image', 'images', 
        'latitude', 'longitude', 'city', 'state', 'country', 'user_id', 'price_unit', 'make_id', 'year', 
        'model_id', 'insurance', 'cancel_policy_id'
    ];

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function make()
    {
        return $this->belongsTo(Make::class);
    }

    public function model()
    {
        return $this->belongsTo(Models::class);
    }

    public function cancel_policy()
    {
        return $this->belongsTo(cancel_policy::class);
    }
}
