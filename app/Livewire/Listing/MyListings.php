<?php

namespace App\Livewire\Listing;

use App\Models\Listing;
use Livewire\Component;
use Auth;

class MyListings extends Component
{
    public $listings;

    public function mount()
    {
        $this->listings = Listing::where('user_id', Auth::id())->get();
    }

    public function render()
    {
        return view('livewire.listing.my-listings');
    }
}
