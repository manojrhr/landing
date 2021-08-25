<?php

namespace App\Http\Livewire;

use App\Tour;
use Livewire\Component;

class ToursList extends Component
{
    public $searchTerm = '';

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        return view('livewire.tours-list', [
            'tours' => Tour::where('title','like', $searchTerm)->orWhere('description','like', $searchTerm)->get(),
        ]);
    }
}
