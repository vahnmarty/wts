<div>
    <div class="rounded-sm border border-neutral-200 bg-white px-4 py-6 shadow-lg sm:rounded-lg sm:p-6">
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
                            <x-filament::icon icon="heroicon-s-check-circle" class="text-info-600 size-4 lg:size-10" />
                        </p>
                        <div class="flex flex-row items-center gap-4 text-xs text-gray-500">
                            <a href="#" class="hover:underline">
                                <time datetime="{{ $listing->published_at?->diffForHumans() }}">
                                    {{ $listing->published_at?->diffForHumans() }}
                                </time>
                            </a>
                            @if ($listing->isPrivate())
                                <div class="inline-flex items-center space-x-1">
                                    <x-filament::icon icon="heroicon-o-lock-closed" class="size-4 text-neutral-400" />
                                    <span class="text-xs">Private</span>
                                </div>
                            @else
                                <div class="inline-flex items-center space-x-1">
                                    <x-filament::icon icon="heroicon-o-globe-alt" class="size-4 text-neutral-400" />
                                    <span class="text-xs">Public</span>
                                </div>
                            @endif
                        </div>
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

    <div class="mt-8 rounded-md border border-dashed border-neutral-300 p-6">
        @livewire('listing.create-deal', ['id' => $listing->id])
    </div>
</div>
