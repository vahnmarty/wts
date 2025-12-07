<?php

use App\Livewire\Deal\ViewDeal;
use App\Livewire\HomePage;
use App\Livewire\Listing\CreateDeal;
use App\Livewire\Listing\CreateListing;
use App\Livewire\Listing\EditListing;
use App\Livewire\Listing\ListingSearchResults;
use App\Livewire\Listing\MyListings;
use App\Livewire\Listing\ShowListing;
use App\Livewire\Listing\ViewListing;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', HomePage::class)->name('home');
});

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

Route::group(['middleware' => 'auth'], function () {

    Route::group(['prefix' => 'listings'], function () {
        Route::get('/', MyListings::class)->name('listings.index');
        Route::get('/create', CreateListing::class)->name('listings.create');
        Route::get('/{id}/edit', EditListing::class)->name('listings.edit');
        Route::get('/search', ListingSearchResults::class)->name('listings.search');

        Route::get('/{id}/deal', CreateDeal::class)->name('deals.create');
        Route::get('/{id}', ShowListing::class)->name('listings.show');
    });

    Route::group(['prefix' => 'deals'], function () {
        Route::get('/{id}', ViewDeal::class)->name('deals.show');
    });

});

Route::get('listings/view/{uuid}', ViewListing::class)->name('listings.view'); // @todo : {username}/buying/{uuid}
