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
        'tour_id', 'location_id', 'date', 'adult_rate', 'child_rate', 'user_id', 
        'total_amount', 'adult_count', 'child_count', 'pickup_info', 'booking_id',
        'amount_charged', 'payment_id', 'token', 'payer_id', 'payment_status'
    ];


    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
