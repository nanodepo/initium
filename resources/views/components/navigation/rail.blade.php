<x-ui::nav.rail>
    <x-ui::nav.rail.link
        label="Home"
        :href="route('home')"
        icon="home-modern"
        :active="request()->routeIs('home')"
    />

    <x-ui::nav.rail.link
        label="Products"
        :href="route('product')"
        icon="map"
        :active="request()->routeIs(['product'])"
    />

    <x-ui::nav.rail.link
        label="Categories"
        :href="route('product')"
        icon="view-columns"
    />

    <x-ui::nav.rail.link
        label="Вклад"
        :href="route('home')"
        icon="variable"
    />
</x-ui::nav.rail>
