<?php

namespace App\Livewire\Listing;

use Auth;
use App\Models\Deal;
use App\Models\Listing;
use Livewire\Component;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Schmeits\FilamentCharacterCounter\Forms\Components\Textarea;

class CreateDeal extends Component implements HasSchemas
{
    use InteractsWithSchemas;

    public Listing $listing;

    public $data = [];

    public function mount($id)
    {
        $listing = Listing::findOrFail($id);

        $this->listing = $listing;

        $this->form->fill([
            'offer_price' => $listing->start_price
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->statePath('data')
            ->components([
                Textarea::make('message')
                    ->maxLength(100)
                    ->characterLimit(100)
                    ->showInsideControl(true)
                    ->placeholder('Type your message here. e.g. I want to buy your...'),
                TextInput::make('offer_price')
                    ->label('Your Offer')
                    ->numeric()
                    ->placeholder('0.00')

            ]);
    }

    public function submit()
    {
        $data = $this->form->getState();

        $deal = new Deal;
        $deal->listing_id = $this->listing->id;
        $deal->user_id = Auth::id();
        $deal->offer_price = $data['offer_price'];
        $deal->message = $data['message'];
        $deal->save();
    }

    public function render()
    {
        return view('livewire.listing.create-deal');
    }
}
