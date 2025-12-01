<?php

use Livewire\Volt\Volt;
use App\Livewire\HomePage;
use Laravel\Fortify\Features;
use App\Livewire\Listing\CreateDeal;
use App\Livewire\Listing\MyListings;
use App\Livewire\Listing\EditListing;
use App\Livewire\Listing\ShowListing;
use App\Livewire\Listing\ViewListing;
use Illuminate\Support\Facades\Route;
use App\Livewire\Listing\CreateListing;
use App\Livewire\Listing\ListingSearchResults;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('dashboard', HomePage::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('user-password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});


Route::group(['middleware' => 'auth'], function(){
    Route::get('listings', MyListings::class)->name('listings.index');
    Route::get('listings/create', CreateListing::class)->name('listings.create');
    Route::get('listings/{id}/edit', EditListing::class)->name('listings.edit');
    Route::get('listings/search', ListingSearchResults::class)->name('listings.search');

    Route::get('listings/{id}/deal', CreateDeal::class)->name('deals.create');

    Route::get('listings/{id}', ShowListing::class)->name('listings.show');


});


Route::get('listings/view/{uuid}', ViewListing::class)->name('listings.view'); // @todo : {username}/buying/{uuid}

