<?php

namespace App\Repositories;

use App\Item;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use App\Ticket;
use Log;
use Hash;
use Image;
use Validator;

class TicketRepository {

	public static function create_ticket($request) {

        $latest_ticket = Ticket::latest()->first();
        if($latest_ticket){
            $ticket_id = $latest_ticket->ticket_id + 1;
        } else {
            $ticket_id = 10001;
        }

        $ticket = new Ticket();
        $ticket->user_id = $request->user()->id;
        $ticket->ticket_id = $ticket_id;
        $ticket->status = "Open";
        $ticket->save();
        $items = array(
            [
                "title" => 'item 1',
                "description" => 'item 1 description',
                "ticket_id" => $ticket->id
            ],
            [
                "title" => 'item 2',
                "description" => 'item 2 description',
                "ticket_id" => $ticket->id
            ],
            [
                "title" => 'item 3',
                "description" => 'item 3 description',
                "ticket_id" => $ticket->id
            ]
        );
        // $ticket->items()->save(
        //     new Item($items)
        // );
        $item_created = Item::insert($items);
        // dd($item_created);
        // $ticket->items()->save($items);
        // $items->ticket()->associate($ticket);
        // $items->save();
        // dd('done');
        if($item_created){
            $response_array = ['success' => true, 'ticket' => $ticket, 'message' => 'Ticket created successfully.'];
        } else {
            $response_array = ['success' => false, 'message' => 'Something went wrong!'];
        }
        return $response_array;
	}

    public static function accept_ticket($request)
    {
        $validator = Validator::make($request->all(), [
            'ticket_id' => 'required|exists:tickets,id'
        ],[
            'ticket_id.exists' => 'Ticket not available'
        ]);

        if ($validator->fails()) 
        {
            $errors = implode(',', $validator->messages()->all());
            return $response_array = ['success' => false , 'message' => $errors, 'error_code' => 101];
        }

        $ticket = Ticket::find($request->ticket_id);
        $ticket->delivery_guy_id = $request->user()->id;
        $ticket->accepted_on = \Carbon\Carbon::now();
        $ticket->status = "Active";

        if($ticket->save()){
            $response_array = ['success' => true, 'ticket' => $ticket, 'message' => 'Ticket successfully assigned to you.'];
        } else {
            $response_array = ['success' => false, 'message' => 'Something went wrong!'];
        }
        return $response_array;
    }

    public static function cancel_ticket($request)
    {
        $validator = Validator::make($request->all(), [
            'ticket_id' => 'required|exists:tickets,id',
            'cancel_reason' => 'required'
        ],[
            'ticket_id.exists' => 'Ticket not available'
        ]);

        if ($validator->fails()) 
        {
            $errors = implode(',', $validator->messages()->all());
            return $response_array = ['success' => false , 'message' => $errors, 'error_code' => 101];
        }

        $ticket = Ticket::find($request->ticket_id);
        if($ticket->user_id != $request->user()->id)
        {
            return $response_array = ['success' => false, 'message' => 'Ticket not belongs to you.', 'error_code' => 101];
        }

        $ticket->cancel_reason = $request->cancel_reason;
        $ticket->cancel_on = \Carbon\Carbon::now();
        $ticket->status = "Cancelled";

        if($ticket->save()){
            $response_array = ['success' => true, 'ticket' => $ticket, 'message' => 'Ticket successfully cancelled.'];
        } else {
            $response_array = ['success' => false, 'message' => 'Something went wrong!'];
        }
        return $response_array;
    }
}