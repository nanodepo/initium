<?php

use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new class extends Component {
    public function with(): array
    {
        return [
            'icons' => collect(Storage::disk('icons')->files())->map(function ($item) {
                return str($item)->remove('.php')->headline()->slug()->value();
            })
        ];
    }
} ?>

<x-ui::layout.double>

    <x-slot name="left">
        <x-ui::section title="Outline">
            <div class="flex flex-row flex-wrap items-center justify-center gap-1">
                @foreach($icons as $i)
                    <div x-clipboard.raw="{{ $i }}" class="group flex flex-col justify-center items-center w-24 h-24 text-subtitle hover:text-on-section rounded-sm border border-outline hover:border-hint hover:bg-surface transition">
                        <div class="flex justify-center items-center w-24 h-12">
                            <x-dynamic-component :component="'icon::'.$i" class="w-6 h-6" />
                        </div>
                        <div class="hidden group-hover:flex justify-center items-center w-24 h-12 p-1">
                            <div class="text-xs text-center">{{ $i }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </x-ui::section>
    </x-slot>

    <x-slot name="right">
        <x-ui::section title="Solid">
            <div class="flex flex-row flex-wrap items-center justify-center gap-1">
                @foreach($icons as $i)
                    <div x-clipboard.raw="{{ $i }}" class="group flex flex-col justify-center items-center w-24 h-24 text-subtitle hover:text-on-section rounded-sm border border-outline hover:border-hint hover:bg-surface transition">
                        <div class="flex justify-center items-center w-24 h-12">
                            <x-dynamic-component :component="'icon::'.$i" type="solid" class="w-6 h-6" />
                        </div>
                        <div class="hidden group-hover:flex justify-center items-center w-24 h-12 p-1">
                            <div class="text-xs text-center">{{ $i }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </x-ui::section>
    </x-slot>

</x-ui::layout.double>
