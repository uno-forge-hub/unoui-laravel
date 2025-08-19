<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');



Route::middleware(['auth', 'verified'])->group(function () {
    Volt::route('dashboard', 'admin.dashboard')->name('admin.dashboard');
    Volt::route('/dashboard/inbox', 'admin.inbox.index')->name('admin.inbox.index');
    Volt::route('/dashboard/leads', 'admin.leads.index')->name('admin.leads.index');
    Volt::route('/dashboard/contacts', 'admin.contacts.index')->name('admin.contacts.index');
    Volt::route('/dashboard/deals', 'admin.deals.index')->name('admin.deals.index');
    Volt::route('/dashboard/deals/opportunities', 'admin.deals.opportunities')->name('admin.deals.opportunities');
    Volt::route('/dashboard/deals/reports', 'admin.deals.reports')->name('admin.deals.reports');
});


Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__ . '/auth.php';
