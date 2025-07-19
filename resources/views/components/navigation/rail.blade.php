<x-ui::nav.rail>
    <x-ui::nav.rail.link
        label="Home"
        :href="route('home')"
        icon="home-modern"
        :active="request()->routeIs('home')"
    />

    <x-ui::nav.rail.link
        label="Products"
        icon="map"
    />

    <x-ui::nav.rail.link
        label="Categories"
        icon="view-columns"
    />

    <x-ui::nav.rail.link
        label="Вклад"
        icon="variable"
    />
</x-ui::nav.rail>
