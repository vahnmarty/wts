<?php

namespace App\Livewire\Listing;

use Auth;
use App\Models\Listing;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Enums\ListingStatus;
use Filament\Schemas\Schema;
use Illuminate\Contracts\View\View;
use Filament\Forms\Components\Field;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Fieldset;
use App\Livewire\Listing\ListingFormTrait;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Schmeits\FilamentCharacterCounter\Forms\Components\Textarea as CharTextarea;
use Schmeits\FilamentCharacterCounter\Forms\Components\TextInput as CharTextInput;

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
            if (!in_array($component->getName(), $except)) {
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
