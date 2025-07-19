<?php

use Livewire\Volt\Volt;

Volt::route('/login', 'auth.login')->name('auth.login');
Volt::route('/register', 'auth.register')->name('auth.register');
Volt::route('/forgot', 'auth.forgot')->name('auth.forgot');
Volt::route('/reset/{token}', 'auth.reset')->name('auth.reset');
