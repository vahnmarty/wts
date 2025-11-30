<div>
    <div class="bg-white px-4 py-6 shadow-sm sm:rounded-lg sm:p-6">
        <article>
            <div>
                <div class="flex space-x-3">
                    <div class="shrink-0">
                        <img src="{{ $listing->user->getAvatarThumbnailUrl() }}" alt=""
                            class="size-10 rounded-full" />
                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="flex items-center gap-2 text-sm font-medium text-gray-900">
                            <a href="#" class="hover:underline">{{ $listing->user->getName() }}</a>
                            <x-filament::icon icon="heroicon-s-check-circle" class="text-info-600 size-10" />
                        </p>
                        <p class="text-sm text-gray-500">
                            <a href="#" class="hover:underline">
                                <time datetime="{{ $listing->published_at?->diffForHumans() }}">
                                    {{ $listing->published_at?->diffForHumans() }}
                                </time>
                            </a>
                        </p>
                    </div>
                    <x-filament::dropdown>
                        <x-slot name="trigger">
                            <x-filament::icon-button icon="heroicon-o-ellipsis-vertical" color="gray"
                                size="xl" />
                        </x-slot>

                        @if (Auth::id() == $listing->user_id)
                            <x-filament::dropdown.list>
                                <x-filament::dropdown.list.item wire:click='edit' icon="heroicon-m-pencil-square">
                                    Edit
                                </x-filament::dropdown.list.item>
                                <x-filament::dropdown.list.item icon="heroicon-m-no-symbol" color="danger">
                                    Delete
                                </x-filament::dropdown.list.item>
                            </x-filament::dropdown.list>
                        @else
                            <x-filament::dropdown.list>
                                <x-filament::dropdown.list.item icon="heroicon-m-star">
                                    Add to favorites
                                </x-filament::dropdown.list.item>
                                <x-filament::dropdown.list.item icon="heroicon-m-flag">
                                    Report content
                                </x-filament::dropdown.list.item>
                            </x-filament::dropdown.list>
                        @endif

                    </x-filament::dropdown>
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
            <div class="mt-6 flex justify-between space-x-8">
                <div class="flex space-x-6">
                    <span class="inline-flex items-center text-sm">
                        <button type="button" class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                            <x-filament::icon icon="heroicon-m-hand-thumb-up" class="size-5 text-neutral-400" />
                            <span class="font-medium text-gray-900">{{ $listing->likes_count ?? 0 }}</span>
                            <span class="sr-only">likes</span>
                        </button>
                    </span>
                    <span class="inline-flex items-center text-sm">
                        <button type="button" class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                            <x-filament::icon icon="heroicon-m-chat-bubble-bottom-center-text"
                                class="size-5 text-neutral-400" />
                            <span class="font-medium text-gray-900">0</span>
                            <span class="sr-only">replies</span>
                        </button>
                    </span>
                    <span class="inline-flex items-center text-sm">
                        <button type="button" class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                            <x-filament::icon icon="heroicon-m-bookmark" class="size-5 text-neutral-400" />
                            <span class="font-medium text-gray-900">0</span>
                            <span class="sr-only">bookmarks</span>
                        </button>
                    </span>
                    <span class="inline-flex items-center text-sm">
                        <button type="button" class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                            <x-filament::icon icon="heroicon-m-eye" class="size-5 text-neutral-400" />
                            <span class="font-medium text-gray-900">{{ $listing->views_count ?? 0 }}</span>
                            <span class="sr-only">views</span>
                        </button>
                    </span>
                </div>
                <div class="flex text-sm">
                    <span class="inline-flex items-center text-sm">
                        <button type="button" class="inline-flex space-x-2 text-gray-400 hover:text-gray-500">
                            <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true"
                                class="size-5">
                                <path
                                    d="M13 4.5a2.5 2.5 0 1 1 .702 1.737L6.97 9.604a2.518 2.518 0 0 1 0 .792l6.733 3.367a2.5 2.5 0 1 1-.671 1.341l-6.733-3.367a2.5 2.5 0 1 1 0-3.475l6.733-3.366A2.52 2.52 0 0 1 13 4.5Z" />
                            </svg>
                            <span class="font-medium text-gray-900">Share</span>
                        </button>
                    </span>
                </div>
            </div>
        </article>
    </div>
</div>
