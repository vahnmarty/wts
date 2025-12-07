<div>
    <div class="rounded-xl border border-neutral-100 bg-white p-8">
        <div class="grid grid-cols-2 gap-8">
            <div>
                <h1 class="text-2xl font-bold">Your offer has been sent!</h1>
                <p class="mt-3">Your offer has been created and is now pending the host's confirmation. We'll notify
                    you once the transaction moves to the next step.</p>

                <div class="mt-8">
                    <div class="flex justify-between">
                        <h4 class="font-bold">Overview</h4>
                        <div>
                            <h4 class="text-danger-500 font-bold">{{ format_money($deal->offer_price) }}</h4>
                        </div>
                    </div>
                    <div class="mt-2 border-l-8 border-neutral-300 bg-neutral-100 p-4">
                        {!! $deal->message !!}
                    </div>
                </div>

                <div class="mt-8">
                    <x-filament::button icon="heroicon-o-home" href="{{ url('/home') }}" tag="a">
                        Back to Home
                    </x-filament::button>
                </div>
            </div>

            <div>
                <div class="rounded-xl border border border-neutral-200 bg-neutral-200/70 px-8">
                    <div class="flex gap-2 py-4 pt-8">
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
</div>
