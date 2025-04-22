<?php

use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new
#[Layout('layouts.guest')]
class extends Component {

} ?>

<x-ui::layout>

    <x-slot name="content">

        <div class="flex flex-col justify-center items-center h-96 text-5xl">
            <div>Less</div>
            <div>Than</div>
            <div>Three</div>
        </div>

    </x-slot>

</x-ui::layout>
