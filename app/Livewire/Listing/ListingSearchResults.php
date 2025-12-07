<?php

namespace App\Livewire\Listing;

use App\Models\Listing;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Livewire\Attributes\Url;
use Livewire\Component;

class ListingSearchResults extends Component implements HasSchemas
{
    use InteractsWithSchemas;

    #[Url]
    public $q = '';

    public $listings;

    public function mount()
    {
        $this->listings = Listing::search($this->q)->get();
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('q')
                    ->disableLabel()
                    ->prefixIcon(Heroicon::MagnifyingGlass),
            ]);

    }

    public function search() {}

    public function render()
    {
        return view('livewire.listing.listing-search-results');
    }
}
