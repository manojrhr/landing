<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;
use App\Booking;
use Livewire\WithPagination;

class SellerBookings extends Component
{
    use WithPagination;

    public $duration, $date, $flex_start_date, $flex_end_date, $total_people, $adults,$seniors,$children,$infants; 
    public $mybook;
    public $openModal = false;

    public function render()
    {
        // $this->bookings = Auth::user()->seller_bookings->paginate(2);
        // $this->mybook = new Booking();
        $bookings = Booking::where('seller_id', Auth::user()->id)->latest()->paginate(10);
        return view('livewire.seller-bookings', [
            'bookings' => $bookings,
        ]);
    }

    public function show($id)
    {
        $this->openModal = true;
        $booking = Booking::find($id);
        $this->mybook = $booking;
        if($booking->hours){
            $this->duration = $booking->hours." Hours ";//.$booking->hours." Minutes or ".$booking->nights." Nights";
        }elseif($booking->nights){
            $this->duration = $booking->nights." Days";
        }
        $this->date = $booking->checkin_date;
        $this->flex_start_date = $booking->flex_start_date;
        $this->flex_end_date = $booking->flex_end_date;
        $this->total_people = $booking->adults+$booking->seniors+$booking->children+$booking->infants;
        $this->adults = $booking->adults;
        $this->seniors = $booking->seniors;
        $this->children = $booking->children;
        $this->infants = $booking->infants;
        // $this->visitor_message = $booking->visitor_message ?? null;

        $this->dispatchBrowserEvent('showBookingModel');

    }
    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }
}
