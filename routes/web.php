<?php

use App\Livewire\Account\Manager;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::get('accounts', Manager::class)->name('accounts');
});

require __DIR__ . '/settings.php';
