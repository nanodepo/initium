<?php

use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new
#[Layout('layouts.guest')]
class extends Component {
    // Если тебя удивляет этот код - это однофайловый компонент Livewire.
    // Чтобы узнать больше зайди в документацию Livewire, в раздел Volt.
} ?>

<x-ui::layout.single>

    <x-slot name="content">

        <x-ui::section>


            <x-ui::header
                :title="auth()->check() ? auth()->user()?->name . ', да прибудет с тобой сила!' : 'Да прибудет с тобой сила!'"
                subtitle="Это главная страница с простым гостевым шаблоном, где есть блок контента и верхняя панель."
            />
        </x-ui::section>

    </x-slot>

</x-ui::layout.single>
