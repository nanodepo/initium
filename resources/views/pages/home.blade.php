<?php

use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new class extends Component {

} ?>

<x-ui::layout>

    <x-slot name="content">

        <div class="flex flex-col justify-center items-center h-96 text-5xl">
            <div>{{ auth()->user()?->name }}</div>
        </div>

    </x-slot>

</x-ui::layout>
