<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    public function index()
    {
        // $tours = Tour::all();
        return view('web.transfers.index');
    }
}
