<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Facades\FilamentColor;

use Filament\Tables\Columns\Column;
use Filament\Forms\Components\Field;
use Filament\Actions\Action;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        FilamentColor::register([
            'danger' => Color::Red,
            'gray' => Color::Zinc,
            'info' => Color::Blue,
            'primary' => Color::Indigo,
            'success' => Color::Green,
            'warning' => Color::Amber,
        ]);

        $overrideDefaultLabel = function ($o): void {
            $o->label(
                str($o->getName())
                    ->beforeLast('.')
                    ->afterLast('.')
                    ->headline()
            );
        };

        Column::configureUsing($overrideDefaultLabel);
        Field::configureUsing($overrideDefaultLabel);
        Action::configureUsing($overrideDefaultLabel);
    }
}
