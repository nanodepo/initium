<x-ui::nav.drawer {{ $attributes }}>
    <x-ui::nav.drawer.header title="Menu" class="mb-1" />

    <x-ui::nav.drawer.link
        :href="route('home')"
        label="Home"
        icon="home-modern"
        :active="request()->routeIs('home')"
    />

    <x-ui::nav.drawer.dropdown
        label="Products"
        icon="user-group"
    >

        <x-ui::nav.drawer.link
            label="All products"
            icon="map"
        />

        <x-ui::nav.drawer.divider />

        <x-ui::nav.drawer.link
            label="Categories"
            icon="map"
        />

    </x-ui::nav.drawer.dropdown>

    <x-ui::nav.drawer.link
        label="Settings"
        icon="cog-6-tooth"
    />

    <x-ui::nav.drawer.header title="Packages" class="mt-3 mb-1" />

    <x-ui::nav.drawer.link
        :href="route('uikit')"
        label="UI Kit"
        icon="variable"
    />

    <x-ui::nav.drawer.link
        :href="route('icons')"
        label="Icons"
        icon="variable"
    />

</x-ui::nav.drawer>
