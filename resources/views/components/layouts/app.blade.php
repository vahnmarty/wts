<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8" />

    <meta name="application-name" content="{{ config('app.name') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>{{ config('app.name') }}</title>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="h-full antialiased">

    <div class="min-h-full">
        @include('partials.header')

        <div class="py-10">
            <div class="mx-auto max-w-3xl sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-12 lg:gap-8 lg:px-8">
                @include('partials.sidebar')

                <main class="lg:col-span-9 xl:col-span-6">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>

    @livewire('notifications')

    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>
