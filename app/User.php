<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use App\Events\NewUserRegisteredEvent;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'delivery_guy', 'verified', 'otp', 'c_code',
         'phone', 'avatar', 'stripe_connect_id', 'completed_stripe_onboarding',
    ];

    // protected $dispatchesEvents = [
    //     'created' => NewUserRegisteredEvent::class,
    // ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dispatchesEvents = [
        'created' => NewUserRegisteredEvent::class,
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'completed_stripe_onboarding' => 'bool',
    ];

    public function isActivated()
    {
        return $this->verified ? true : false;
    }

    public function toggleVerification()
    {
        $this->verified= !$this->verified;
        return $this;
    }

    public function addresses()
    {
        return $this->hasMany('App\Addresses', 'user_id');
    }
    /**
     * Get the tickets for the user.
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    
    /* To let know twilio the phone no. filed of user table */
    public function routeNotificationForTwilio()
    {
        return $this->c_code.$this->phone;
    }
}
