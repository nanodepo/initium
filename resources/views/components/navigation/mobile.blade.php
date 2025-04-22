<div
    x-data="{ opened: false }"
    x-cloak
    x-show="opened"
    x-on:toggle-drawer.window="opened = !opened"
    class="fixed top-0 left-0 bottom-0 flex sm:hidden z-10"
>
    <x-ui::scrim x-model="opened" />
    <div
        x-show="opened"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="-translate-x-80"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-80"
        class="flex flex-col h-full w-80 transform transition-all"
    >
        <x-navigation.drawer class="h-full w-80 bg-background" />
    </div>
</div>
