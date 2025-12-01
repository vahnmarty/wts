<?php

namespace App\Livewire\Listing;

use App\Models\Listing;
use Livewire\Component;

class ShowListing extends Component
{
    public Listing $listing;

    public function mount($id)
    {
        $listing = Listing::findOrFail($id);


        $this->authorize('viewAny', $listing);

        $this->listing = $listing;
    }

    public function render()
    {
        return view('livewire.listing.show-listing');
    }

    public function edit()
    {
        return redirect()->route('listings.edit', $this->listing->id);
    }
}
