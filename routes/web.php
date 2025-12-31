<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;
use App\Models\Equipment;


Route::get('/', \App\Livewire\Public\Home::class)->name('home');
Route::get('/catalog', \App\Livewire\Public\Catalog::class)->name('catalog');

Route::get('/equipment/{equipment:slug}', function (Equipment $equipment) {
    return view('public.equipment-show', compact('equipment'));
})->name('equipment.show');
Route::get('/quote-request', \App\Livewire\Public\QuoteRequest::class)->name('quote.request');

Route::view('dashboard', 'dashboard')
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
