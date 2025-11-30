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
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Schmeits\FilamentCharacterCounter\Forms\Components\Textarea as CharTextarea;
use Schmeits\FilamentCharacterCounter\Forms\Components\TextInput as CharTextInput;

class EditListing extends Component implements HasSchemas
{
    use InteractsWithSchemas;

    public ?array $data = [];

    public Listing $listing;

    public function mount($id): void
    {
        $listing = Listing::findOrFail($id);

        $this->form->fill($listing->toArray());

        $this->authorize('view', $listing);

        $this->listing = $listing;

    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(4)
                    ->schema([
                        Select::make('listing_type')
                        ->disableLabel()
                        ->options([
                            'Sell' => 'I am Selling',
                            'Buy' => 'I am Buying',
                            'Swap' => 'I want to Swap'
                        ])
                        ->default('Sell')
                        ->required(),
                    Select::make('category_id')
                        ->disableLabel()
                        ->options(Category::get()->pluck('name', 'id'))
                        ->required()
                        ->columnSpan(3)
                        ->placeholder('Concert Tickets, Sneakers, etc...'),
                    ]),

                CharTextInput::make('title')
                    ->required()
                    ->maxLength(100)
                    ->characterLimit(100),
                CharTextarea::make('description')
                    ->required()
                    ->maxLength(1024)
                    ->characterLimit(1024)
                    ->rows(5),
                Grid::make(4)
                    ->schema([
                        Select::make('price_type')
                            ->options([
                                'FIXED' => 'Fixed Price',
                                'RANGE' => 'Range Price',
                                'MONTHLY' => 'Monthly Subscription'
                            ])
                            ->default('FIXED')
                            ->required()
                            ->live(),
                        TextInput::make('start_price')
                            ->numeric()
                            ->placeholder('0.00')
                            ->required(fn(Get $get) => $get('price_type') == 'FIXED')
                            ->lazy()
                            ->disabled(fn(Get $get) => $get('price_type') == 'RANGE'),
                        TextInput::make('min_price')
                            ->numeric()
                            ->placeholder('0.00')
                            ->required(fn(Get $get) => $get('price_type') == 'RANGE')
                            ->lazy()
                            ->disabled(fn(Get $get) => $get('price_type') == 'FIXED'),
                        TextInput::make('max_price')
                            ->numeric()
                            ->placeholder('0.00')
                            ->required(fn(Get $get) => $get('price_type') == 'RANGE')
                            ->lazy()
                            ->disabled(fn(Get $get) => $get('price_type') == 'FIXED'),
                    ]),
                TextInput::make('reference_url')
                    ->label('Reference URL')
                    ->url()
                    ->helperText('If you have posted this on social media, you can copy the link here.'),
                SpatieMediaLibraryFileUpload::make('attachment')
                    ->image(),
                Fieldset::make('Be sure to agree with these term(s).')
                    ->columns(1)
                    ->schema([
                        Checkbox::make('is_legal')
                            ->label("I confirm that the item I’m listing is legal in the Philippines.")
                            ->accepted()
                            ->dehydrated(false),
                        Checkbox::make('is_legit')
                            ->label("I certify that this item is not counterfeit, stolen, or prohibited.")
                            ->accepted()
                            ->dehydrated(false),
                        Checkbox::make('terms')
                            ->label("I agree that violating these terms may result in account suspension.")
                            ->accepted()
                            ->dehydrated(false),
                    ])

            ])
            ->statePath('data');
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
        $listing = $this->listing;
        $listing->fill($data);
        $listing->save();


        return $listing;
    }

    public function render()
    {
        return view('livewire.listing.edit-listing');
    }
}
