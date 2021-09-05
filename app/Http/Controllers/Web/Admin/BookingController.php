<?php

namespace App\Http\Controllers\Web\Admin;

use App\Booking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $title = "Bookings";
        $subTitle = "";
        $bookings = Booking::with('user','tour')->latest()->get();
        return view('admin.booking.index', compact('bookings', 'title', 'subTitle'));
    }

    public function single($booking_id)
    {
        $title = "Booking Details";
        $subTitle = "";
        $booking = Booking::with('user','tour')->where('booking_id', $booking_id)->first();
        return view('admin.booking.single', compact('booking', 'title', 'subTitle'));
    }
}
