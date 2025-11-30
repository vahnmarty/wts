<?php

namespace App\Livewire\Listing;

use Livewire\Component;
use App\Models\Category;
use Filament\Schemas\Schema;
use Illuminate\Contracts\View\View;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Schmeits\FilamentCharacterCounter\Forms\Components\TextInput as CharTextInput;
use Schmeits\FilamentCharacterCounter\Forms\Components\Textarea as CharTextarea;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Concerns\InteractsWithSchemas;

class CreateListing extends Component implements HasSchemas
{
    use InteractsWithSchemas;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
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
                    ->characterLimit(1024),
                Grid::make(4)
                    ->schema([
                        Select::make('price_type')
                            ->options([
                                'FIXED' => 'Fixed Price',
                                'RANGE' => 'Range Price'
                            ])
                            ->default('FIXED')
                            ->required(),
                        TextInput::make('start_price')
                            ->numeric()
                            ->placeholder('0.00')
                            ->required()
                            ->disabled(fn(Get $get) => $get('price_type') == 'RANGE'),
                        TextInput::make('min_price')
                            ->numeric()
                            ->placeholder('0.00')
                            ->required()
                            ->disabled(fn(Get $get) => $get('price_type') == 'FIXED'),
                        TextInput::make('max_price')
                            ->numeric()
                            ->placeholder('0.00')
                            ->required()
                            ->disabled(fn(Get $get) => $get('price_type') == 'FIXED'),
                    ]),
                TextInput::make('reference_url')
                    ->label('Reference URL')
                    ->url()
                    ->helperText('If you have posted this on social media, you can copy the link here.')
                // ...
            ])
            ->statePath('data');
    }

    public function create(): void
    {
        dd($this->form->getState());
    }

    public function render()
    {
        return view('livewire.listing.create-listing');
    }
}
