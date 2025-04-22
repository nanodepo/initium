@props(['icon' => 'cube', 'text' => null])

<a {{ $attributes->merge(['class' => 'flex flex-row items-center justify-center flex-none gap-2']) }}>
    <x-dynamic-component
        :component="'icon::'.$icon"
        class="w-7 h-7 flex-none"
    />

    <div class="text-lg font-bold uppercase tracking-wider">
        {{ $text ?? config('app.name') }}
    </div>
</a>
