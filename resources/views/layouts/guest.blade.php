<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @class(['dark' => ui()->dark])>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'NanoDepo') }}</title>

    <!-- Theme -->
    <x-ui::theme :color="ui()->color" />
    <script>
        window.drawer = @js(ui()->drawer);
        window.primaryColor = @js(ui()->color);
    </script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>
<body>

<x-ui::background x-cloak />

<x-ui::nav.panel x-data x-cloak>
    <x-slot name="left">
        <div class="hidden sm:flex ml-6">
            <x-logo :href="route('home')" icon="diamond" />
        </div>
    </x-slot>

    <x-slot name="right" class="gap-2 mr-3">
        <x-ui::circle x-on:click="$dispatch('open-onboarding')" icon="light-bulb" />

        @livewire('switch-mode')
    </x-slot>
</x-ui::nav.panel>

<div class="flex flex-col flex-auto">
    {{ $slot }}
</div>

<div x-cloak x-data class="flex flex-col flex-none text-xs text-center text-hint">
    <div class="flex flex-row items-center justify-center p-1 gap-1">
        <div>Made by <a href="https://t.me/BernhardWilson" class="link">Bernhard Wilson</a> with</div>
        <x-icon::heart type="micro" class="w-4 h-4 animate-heart" />
        <div>and coffee.</div>
    </div>
</div>

@livewire('alert')
@livewireScriptConfig

</body>
</html>
