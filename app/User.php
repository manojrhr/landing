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
        'name', 'email', 'password', 'delivery_guy', 'verified', 'otp', 'c_code', 'phone', 'avatar', 'stripe_connect_id', 'completed_stripe_onboarding',
    ];

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
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /* To let know twilio the phone no. filed of user table */
    public function routeNotificationForTwilio()
    {
        return '+919882270566';
    }
    // public function jetskis()
    // {
    //     return $this->hasMany(JetSki::class);
    // }

    // public function bookings()
    // {
    //     return $this->hasMany(Booking::class);
    // }

    // public function seller_bookings(){
    //     return $this->hasMany('App\Booking', 'seller_id','id');
    // }
}
