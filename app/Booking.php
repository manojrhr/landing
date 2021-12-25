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
        'tour_id', 'zone_id','hotel_id', 'date', 'adult_rate', 'child_rate', 'user_id', 
        'total_amount', 'adult_count', 'child_count', 'pickup_info', 'booking_id',
        'amount_charged', 'payment_id', 'token', 'payer_id', 'payment_status',
        'id_cod', 'address_id'
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

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
