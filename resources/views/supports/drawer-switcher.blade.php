<?php

use Livewire\Attributes\On;
use Livewire\Volt\Component;

new class extends Component {
    #[On('toggle-drawer')]
    public function toggle(): void
    {
        $user = auth()->user();
        $settings = $user->settings;
        $settings->drawer = !$settings->drawer;
        $user->settings = $settings;
        $user->save();
    }
} ?>

<x-ui::nav.panel.burger />
