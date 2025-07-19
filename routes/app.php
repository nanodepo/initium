<?php

use Livewire\Volt\Volt;

Volt::route('/', 'home')->name('home');

Route::middleware('auth')->group(function () {
    Volt::route('/uikit', 'uikit')->name('uikit');
    Volt::route('/icons', 'icons')->name('icons');
    Volt::route('/dashboard', 'dashboard')->name('dashboard');
});
