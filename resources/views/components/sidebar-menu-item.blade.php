@props(['url', 'icon'])

<a href="{{  $url }}"
    class="group flex items-center rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
    <x-filament::icon icon="heroicon-o-{{ $icon }}" class="-ml-1 mr-3 size-6 shrink-0 text-gray-500" />
    <span class="truncate">{{  $slot }}</span>
</a>
