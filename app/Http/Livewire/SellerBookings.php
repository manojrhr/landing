<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;
use App\Booking;

class SellerBookings extends Component
{
    public $bookings;
    public $duration, $date, $flex_start_date, $flex_end_date, $total_people, $adults,$seniors,$children,$infants; 

    public function render()
    {
        $this->bookings = Auth::user()->seller_bookings;
        return view('livewire.seller-bookings');
    }

    public function show($id)
    {
        $booking = Booking::find($id);
        $this->duration = $booking->hours." Hours ".$booking->hours." Minutes or ".$booking->nights." Nights";
        $this->date = $booking->checkin_date;
        $this->flex_start_date = $booking->flex_start_date;
        $this->flex_end_date = $booking->flex_end_date;
        $this->total_people = $booking->adults+$booking->seniors+$booking->children+$booking->infants;
        $this->adults = $booking->adults;
        $this->seniors = $booking->seniors;
        $this->children = $booking->children;
        $this->infants = $booking->infants;

        $this->dispatchBrowserEvent('showBookingModel');

    }
}
