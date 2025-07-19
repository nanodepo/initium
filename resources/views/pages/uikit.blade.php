<?php

use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new
#[Layout('layouts.app')]
class extends Component {

    public array $colors = ['primary', 'secondary', 'tertiary', 'destructive'];
    public array $variants = ['filled', 'outlined', 'tonal', 'text'];

} ?>

<x-ui::layout.double>

    <x-slot name="left">

        <x-ui::section header="Button">

            <div class="flex flex-col items-center gap-3">
                @foreach($colors as $color)
                    <div class="flex flex-row gap-3">
                        @foreach($variants as $variant)
                            <x-ui::button
                                :before="$loop->first ? 'plus' : null"
                                :color="$color"
                                :variant="$variant"
                                :after="$loop->last ? 'arrow-long-right' : null"
                            >
                                {{ str($color)->ucfirst() }}
                            </x-ui::button>
                        @endforeach
                    </div>
                @endforeach
            </div>

        </x-ui::section>

    </x-slot>

    <x-slot name="right">

        <x-ui::section header="Chip">
            <div class="flex flex-col items-center gap-3">
                @foreach($colors as $color)
                    <div class="flex flex-row gap-3">
                        @foreach($variants as $variant)
                            <x-ui::chip
                                :before="$loop->first ? 'plus' : null"
                                :title="str($color)->ucfirst()"
                                :color="$color"
                                :variant="$variant"
                                :after="$loop->last ? 'arrow-long-right' : null"
                                :active="$loop->first"
                                :disabled="$loop->last"
                            />
                        @endforeach
                    </div>
                @endforeach
            </div>
        </x-ui::section>

    </x-slot>

</x-ui::layout.double>
