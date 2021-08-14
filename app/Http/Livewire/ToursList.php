<?php

namespace App\Http\Livewire;

use App\Tour;
use Livewire\Component;

class ToursList extends Component
{
    public function render()
    {
        return view('livewire.tours-list', [
            'tours' => Tour::all(),
        ]);
    }
}
