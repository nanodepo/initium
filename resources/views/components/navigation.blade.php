<nav class="relative hidden sm:flex flex-col flex-auto transition-all">
    <div x-bind:class="{ 'hidden': !$store.drawer }" class="flex flex-col flex-auto">
        <x-navigation.drawer />
    </div>

    <div x-bind:class="{ 'hidden': $store.drawer }" class="flex flex-col w-22">
        <x-navigation.rail />
    </div>
</nav>
