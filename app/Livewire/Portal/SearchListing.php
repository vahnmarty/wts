<?php

namespace App\Livewire\Portal;

use Livewire\Component;

class SearchListing extends Component
{
    public $keyword;

    public function render()
    {
        return view('livewire.portal.search-listing');
    }

    public function search()
    {
        return redirect()->route('listings.search', ['q' => $this->keyword]);
    }
}
