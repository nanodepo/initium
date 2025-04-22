<?php

use Livewire\Volt\Volt;

Volt::route('/', 'home')->name('home');
Volt::route('/product', 'product')->name('product');

Volt::route('/login', 'auth.login')->name('auth.login')->middleware('guest');
Volt::route('/register', 'auth.register')->name('auth.register')->middleware('guest');
Volt::route('/forgot', 'auth.forgot')->name('auth.forgot')->middleware('guest');
Volt::route('/reset/{token}', 'auth.reset')->name('auth.reset')->middleware('guest');
