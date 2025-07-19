<?php

use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new class extends Component {
    // Если тебя удивляет этот код - это однофайловый компонент Livewire.
    // Чтобы узнать больше зайди в документацию Livewire, в раздел Volt.
} ?>

<x-ui::layout.single>

    <x-slot name="content">

        @can('level:one')
            <x-ui::section hint="Member + Manager + Admin">
                <x-ui::header
                    title="Level 1"
                    subtitle="Эту секцию видят все."
                />
            </x-ui::section>
        @endcan

        @can('level:two')
            <x-ui::section hint="Manager + Admin">
                <x-ui::header
                    title="Level 2"
                    subtitle="Эту секцию видят менеджеры и админы."
                />
            </x-ui::section>
        @endcan

        @can('level:three')
            <x-ui::section hint="Admin">
                <x-ui::header
                    title="Level 3"
                    subtitle="Эту секцию видят только админы."
                />
            </x-ui::section>
        @endcan

    </x-slot>

</x-ui::layout.single>
