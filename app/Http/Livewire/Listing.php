<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\JetSki;

class Listing extends Component
{
    public $rows;

    public function render()
    {
        // $rows = array([],[],[],[],[],[]);
        $this->rows = JetSki::all();
        // return view('web.listing', compact('rows'));
        return view('livewire.listing');
    }
}
