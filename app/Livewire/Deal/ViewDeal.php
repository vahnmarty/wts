<?php

namespace App\Livewire\Deal;

use App\Models\Deal;
use App\Models\Listing;
use Livewire\Component;

class ViewDeal extends Component
{
    public Listing $listing;
    public Deal $deal;

    public function mount($id)
    {
        $deal = Deal::findOrFail($id);
        $listing = $deal->listing;

        $this->deal = $deal;
        $this->listing = $listing;
    }

    public function render()
    {
        return view('livewire.deal.view-deal')
            ->layout('components.layouts.basic');
    }
}
