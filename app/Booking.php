<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'jetski_id', 'user_id', 'seller_id', 'hours', 'minutes', 'nights', 'checkin_date', 'flex_start_date', 
        'flex_end_date', 'pickup_time', 'adult', 'senior', 'child', 'infants', 'visitor_message', 'confirmed_date',
        'confirmed_time', 'confirmed'
    ];

    public function jetski()
    {
        return $this->belongsTo(JetSki::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
