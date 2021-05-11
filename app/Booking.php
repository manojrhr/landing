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
        'uid', 'jet_ski_id', 'user_id', 'seller_id', 'hours', 'minutes', 'nights', 'checkin_date', 'flex_start_date', 
        'flex_end_date', 'pickup_time', 'adults', 'seniors', 'children', 'infants', 'visitor_message', 'confirmed_date',
        'confirmed_time', 'confirmed', 'amount', 'charge_id', 'payment_success'
    ];

    public function jetski()
    {
        return $this->belongsTo('App\JetSki', 'jet_ski_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id', 'id');
    }

}
