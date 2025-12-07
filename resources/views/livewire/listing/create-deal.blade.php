<div>

    <div class="relative">
        <h1 class="text-3xl font-bold">Request to {{ $listing->getAction() }}</h1>
        <div class="absolute -left-10 top-2">
            <x-filament::icon-button icon="heroicon-s-chevron-left" class="hover:bg-netral-300 bg-neutral-200"
                color="gray rounded-full" />
        </div>
    </div>

    <div class="mt-8 grid grid-cols-5 gap-12">

        <div class="col-span-3">
            <form wire:submit.prevent='submit'>
                {{ $this->form }}

                <div class="mt-8 flex items-center justify-center">
                    <x-filament::button type="submit" size="xl" class="w-full">
                        Submit Offer
                    </x-filament::button>
                </div>
            </form>

        </div>

        <div class="col-span-2">
            <div class="rounded-xl border border border-neutral-200 bg-white px-6">
                <div class="flex gap-2 py-4 pt-6">
                    <div class="size-10 bg-neutral-300"></div>
                    <div>
                        <h2 class="text-base font-medium text-gray-900">
                            {{ $listing->title }}
                        </h2>
                    </div>
                </div>
                <div class="space-y-1 border-t border-neutral-200 py-4 text-sm">
                    <legend class="font-semibold">Category</legend>
                    <p class="text-sm">{{ $listing->category->name }}</p>
                </div>
                <div class="space-y-1 border-t border-neutral-200 py-4 text-sm">
                    <legend class="font-semibold">Description</legend>
                    <p class="text-sm">{{ $listing->description }}</p>
                </div>
                <div class="space-y-1 border-t border-neutral-200 py-4 text-sm">
                    <legend class="font-semibold">Original Price</legend>
                    <p class="text-sm">{{ format_money($listing->getPrice()) }}</p>
                </div>
                <div class="space-y-1 border-t border-neutral-200 py-4 text-sm">
                    <legend class="font-semibold">{{ $listing->getHost() }}</legend>
                    <p class="flex items-center gap-2 text-sm text-gray-900">
                        <a href="#" class="hover:underline">{{ $listing->user->getName() }}</a>
                        <x-filament::icon icon="heroicon-s-check-circle" class="text-info-600 size-10" />
                    </p>
                    <div class="flex items-center">
                        <x-filament::icon icon="heroicon-s-star" class="text-warning-500" />
                        <x-filament::icon icon="heroicon-s-star" class="text-warning-500" />
                        <x-filament::icon icon="heroicon-s-star" class="text-warning-500" />
                        <x-filament::icon icon="heroicon-s-star" class="text-warning-500" />
                        <x-filament::icon icon="heroicon-s-star" class="text-warning-500" />
                        <span class="ml-1">5.0</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
