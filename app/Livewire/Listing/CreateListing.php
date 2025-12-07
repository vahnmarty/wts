<?php

namespace App\Livewire\Listing;

use App\Enums\ListingStatus;
use App\Models\Listing;
use Auth;
use Filament\Forms\Components\Field;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Illuminate\Support\Str;
use Livewire\Component;

class CreateListing extends Component implements HasSchemas
{
    use InteractsWithSchemas;
    use ListingFormTrait;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function submit()
    {
        $data = $this->form->getState();

        $listing = $this->save($data);

        $listing->published_at = now();
        $listing->slug = Str::of($listing->title)->slug('-');
        $listing->status = ListingStatus::OPEN;
        $listing->save();

        return redirect()->route('listings.show', $listing->id);
    }

    public function saveDraft()
    {
        foreach ($this->form->getComponents() as $component) {
            $this->unrequireFields(component: $component);
        }

        $data = $this->form->getState();

        $this->save($data);
    }

    protected function unrequireFields($component, array $except = []): void
    {
        if ($component instanceof Field) {
            if (! in_array($component->getName(), $except)) {
                if ($component->isRequired()) {
                    $component->markAsRequired();
                }
                $component->required(false);
            }

            return;
        }

        foreach ($component->getChildComponents() as $child) {
            $this->unrequireFields($child, $except);
        }
    }

    public function save($data): Listing
    {
        $listing = new Listing;
        $listing->user_id = Auth::id();
        $listing->fill($data);
        $listing->save();

        return $listing;
    }

    public function render()
    {
        return view('livewire.listing.create-listing');
    }
}
