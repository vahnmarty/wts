<div>

    <header>
        <div class="flex justify-between">
            <div>
                <h1 class="text-2xl font-bold">My Listings</h1>
            </div>
            <div>
                @if (count($listings))
                    <x-filament::button tag="a" href="{{ route('listings.create') }}" icon="heroicon-m-plus"
                        outlined color="primary">
                        Add Listing
                    </x-filament::button>
                @endif
            </div>
        </div>
    </header>

    <div class="mt-8">
        @if (count($listings))
            <div>
                @foreach ($listings as $key => $listing)
                    <div wire:key='$key' class="rounded-sm bg-white px-4 py-6 shadow-sm sm:rounded-lg sm:p-6">
                        <article>
                            <div>
                                <div class="flex space-x-3">
                                    <div class="shrink-0">
                                        <img src="{{ $listing->user->getAvatarThumbnailUrl() }}" alt=""
                                            class="size-8 rounded-full lg:size-10" />
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <p class="flex items-center gap-2 text-sm font-medium text-gray-900">
                                            <a href="#"
                                                class="text-xs hover:underline lg:text-base">{{ $listing->user->getName() }}</a>
                                            <x-filament::icon icon="heroicon-s-check-circle"
                                                class="text-info-600 size-4 lg:size-10" />
                                        </p>
                                        <p class="mt-1 text-xs text-gray-500 lg:mt-0 lg:text-sm">
                                            <a href="#" class="hover:underline">
                                                <time datetime="{{ $listing->published_at?->diffForHumans() }}">
                                                    {{ $listing->published_at?->diffForHumans() }}
                                                </time>
                                            </a>
                                        </p>
                                    </div>
                                    <div class="flex">
                                        <h4
                                            class="text-success-600 bg-success-100 flex items-center justify-center rounded-full px-4 text-sm font-bold lg:px-8 lg:text-xl">
                                            {{ format_money($listing->getPrice()) }}
                                        </h4>
                                    </div>
                                </div>

                                <div class="mt-2">
                                    <x-filament::badge color="info" size="sm" class="text-xs">
                                        {{ $listing->category->name }}
                                    </x-filament::badge>
                                </div>
                                <div class="mt-2 flex gap-2">
                                    <h3 class="text-neutral-500">I want to {{ $listing->listing_type }}: </h3>
                                    <h2 class="text-base font-medium text-gray-900">
                                        {{ $listing->title }}
                                    </h2>
                                </div>
                            </div>
                            <div class="mt-2 space-y-4 text-sm text-gray-700">
                                <p>{{ $listing->description }}</p>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        @else
            <div class="rounded-md border border-neutral-300 bg-white p-8 text-center shadow-md">
                <x-filament::icon icon="heroicon-m-squares-plus" class="mx-auto size-40 flex-shrink-0 text-gray-400" />
                <h3 class="mt-2 text-sm font-semibold text-gray-900">No listings</h3>
                <p class="mt-1 text-sm text-gray-500">Get started by creating a new listing.</p>
                <div class="mt-6">
                    <x-filament::button tag="a" href="{{ route('listings.create') }}" icon="heroicon-m-plus">New
                        Listing</x-filament::button>
                </div>
            </div>

        @endif
    </div>

</div>
