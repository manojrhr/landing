<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\TicketRepository as TicketRepo;

class TicketController extends Controller
{
    public function create_ticket(Request $request)
    {
        $response_array = TicketRepo::create_ticket($request);
    	return response()->json($response_array, 201);
    }
    
    public function accept_ticket(Request $request)
    {
        $response_array = TicketRepo::accept_ticket($request);
    	return response()->json($response_array, 201);
    }

    public function cancel_ticket(Request $request)
    {
        $response_array = TicketRepo::cancel_ticket($request);
    	return response()->json($response_array, 201);
    }

    public function getOpenTicket(Request $request)
    {
        $tickets = $request->user()->cancelledTickets()->get();

        return response()->json(['tickets' => $tickets], 201);
    }

    public function getClosedTickets(Request $request)
    {
        $tickets = $request->user()->closedTickets()->get();

        return response()->json(['tickets' => $tickets], 201);
    }

    public function getActiveTickets(Request $request)
    {
        $tickets = $request->user()->activeTickets()->get();

        return response()->json(['tickets' => $tickets], 201);
    }
}
