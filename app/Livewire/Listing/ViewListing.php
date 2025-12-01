<?php

namespace App\Livewire\Listing;

use Auth;
use App\Models\Listing;
use Livewire\Component;

class ViewListing extends Component
{
    public Listing $listing;

    public function mount($uuid)
    {
        $listing = Listing::whereUuid($uuid)->firstOrFail();

        $this->listing = $listing;
    }

    public function render()
    {
        $layout = 'components.layouts.card';

        if(Auth::check()){
            $layout = 'components.layouts.app';
        }
        return view('livewire.listing.view-listing')
            ->layout($layout, ['title' => 'Some title']);
    }
}
