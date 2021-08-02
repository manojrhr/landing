<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ticket_id', 'title', 'description', 'image', 'audio',
    ];
    /**
     * Get the ticket that owns the Item.
     */
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
