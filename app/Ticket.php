<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    
    /**
     * Get the items for the ticket.
     */
    public function items()
    {
        return $this->hasMany(Item::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function delivery_guy()
    {
        return $this->belongsTo(User::class, 'id', 'delivery_guy_id');
    }
}
