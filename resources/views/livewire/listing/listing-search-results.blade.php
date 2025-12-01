<div>
    <form wire:submit.prevent="search">
        {{ $this->form }}
    </form>

    <div class="mt-8">
        <h2 class="text-neutral-700">Search Result for: <strong>{{ $q }}</strong></h2>
    </div>
    <div class="mt-8">
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
                    <div class="mt-6 flex justify-between space-x-8 border-t border-neutral-300 pt-4">
                        <div class="flex space-x-6">
                            <p>Offers: <strong>Less than 5</strong></p>
                        </div>
                        <div class="flex gap-2 text-sm">
                            <x-filament::button>
                                Message {{ $listing->getHost() }}
                            </x-filament::button>
                            <x-filament::button tag="a" href="{{ route('deals.create', $listing->id) }}">
                                Make a Deal
                            </x-filament::button>
                        </div>
                    </div>
                </article>
            </div>
        @endforeach
    </div>
</div>
