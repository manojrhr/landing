<?php

namespace App\Http\Livewire;

use App\Tour;
use Livewire\Component;
use Livewire\WithPagination;

class ToursList extends Component
{
    // use WithPagination;

    public $searchTerm = '';

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        return view('livewire.tours-list', [
            'tours' => Tour::search($searchTerm)
                        ->where('active', true)
                        ->latest()
                        ->paginate(6),
        ]);
    }
}
