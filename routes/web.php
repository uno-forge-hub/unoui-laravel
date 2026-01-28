<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('home');



Route::middleware(['auth', 'verified'])->group(function () {
    Route::livewire('dashboard', 'admin.dashboard')->name('admin.dashboard');
    Route::livewire('/dashboard/inbox', 'admin.inbox.index')->name('admin.inbox.index');
    Route::livewire('/dashboard/leads', 'admin.leads.index')->name('admin.leads.index');
    Route::livewire('/dashboard/contacts', 'admin.contacts.index')->name('admin.contacts.index');
    Route::livewire('/dashboard/deals', 'admin.deals.index')->name('admin.deals.index');
    Route::livewire('/dashboard/deals/opportunities', 'admin.deals.opportunities')->name('admin.deals.opportunities');
    Route::livewire('/dashboard/deals/reports', 'admin.deals.reports')->name('admin.deals.reports');
});


Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::livewire('settings/profile', 'settings.profile')->name('settings.profile');
    Route::livewire('settings/password', 'settings.password')->name('settings.password');
    Route::livewire('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__ . '/auth.php';
