<form wire:submit="search" class="grid w-full grid-cols-1">
    <input type="search" wire:model="keyword"  placeholder="Search"
        class="col-start-1 row-start-1 block w-full rounded-md bg-white py-1.5 pl-10 pr-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-rose-500 sm:text-sm/6" />

    <x-filament::icon icon="heroicon-o-magnifying-glass"
        class="pointer-events-none col-start-1 row-start-1 ml-3 size-10 size-5 flex-shrink-0 self-center text-gray-400 text-neutral-200 md:size-16" />
</form>
