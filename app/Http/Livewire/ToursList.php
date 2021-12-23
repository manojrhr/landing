<?php

namespace App\Http\Livewire;

use App\Tour;
use Livewire\Component;
use Livewire\WithPagination;

class ToursList extends Component
{
    // use WithPagination;

    public $searchTerm = '';
    public $subcategory;

    public function updatedSubcategory()
    {
        if(!is_array($this->subcategory)) return;
        $this->subcategory = array_filter($this->subcategory,
            function ($subcategory) {
                return $subcategory != false;
            }
        );
    }

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        $subcategory = $this->subcategory;
        if (empty($subcategory)) {
            $tours = Tour::search($searchTerm)
                        ->where('active', true)
                        ->latest()
                        ->paginate(6);
        } else {
            $tours = Tour::search($searchTerm)
                        ->whereHas('subcategory', function($query) use ($subcategory) {
                            $query->whereIn('status', $subcategory);
                        })
                        ->where('active', true)
                        ->latest()
                        ->paginate(6);
        }
        return view('livewire.tours-list', [
            'tours' => $tours,
        ]);
    }
}
