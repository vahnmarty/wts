<nav aria-label="Sidebar" class="sticky top-4 divide-y divide-gray-300">
    <div class="space-y-1 pb-8">
        <x-sidebar-menu-item url="{{  url('dashboard') }}" icon="home">Home</x-sidebar-menu-item>
        <x-sidebar-menu-item url="{{  route('listings.index') }}" icon="building-storefront">My Listings</x-sidebar-menu-item>
        <a href="#"
            class="group flex items-center rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
            <x-filament::icon icon="heroicon-o-bolt" class="-ml-1 mr-3 size-6 shrink-0 text-gray-500" />
            <span class="truncate">My Deals</span>
        </a>

        <a href="#"
            class="group flex items-center rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
            <x-filament::icon icon="heroicon-o-hand-thumb-up" class="-ml-1 mr-3 size-6 shrink-0 text-gray-500" />
            <span class="truncate">Likes</span>
        </a>

        <a href="#"
            class="group flex items-center rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
            <x-filament::icon icon="heroicon-o-heart" class="-ml-1 mr-3 size-6 shrink-0 text-gray-500" />
            <span class="truncate">Favorites</span>
        </a>

        <a href="#"
            class="group flex items-center rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
            <x-filament::icon icon="heroicon-o-user-group" class="-ml-1 mr-3 size-6 shrink-0 text-gray-500" />
            <span class="truncate">Communities</span>
        </a>
        <a href="#"
            class="group flex items-center rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
            <x-filament::icon icon="heroicon-o-arrow-trending-up" class="-ml-1 mr-3 size-6 shrink-0 text-gray-500" />
            <span class="truncate">For You</span>
        </a>

        <a href="#"
            class="group flex items-center rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
            <x-filament::icon icon="heroicon-o-cube-transparent" class="-ml-1 mr-3 size-6 shrink-0 text-gray-500" />
            <span class="truncate">Marketplace</span>
        </a>
    </div>
    <div class="pt-10">
        <p id="communities-headline" class="px-3 text-sm font-medium text-gray-500">Communities</p>
        <div aria-labelledby="communities-headline" class="mt-3 space-y-2">
            <a href="#"
                class="group flex items-center rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-900">
                <span class="truncate">Concerts</span>
            </a>
            <a href="#"
                class="group flex items-center rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-900">
                <span class="truncate">Sports</span>
            </a>
            <a href="#"
                class="group flex items-center rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-900">
                <span class="truncate">Gaming</span>
            </a>
        </div>
    </div>
</nav>
