<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{--<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>--}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
          crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
            crossorigin=""></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- For Date -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <!-- Styles -->
    @livewireStyles
</head>
<body class="font-sans antialiased">
<x-banner />

<div class="min-h-screen bg-white">
    @livewire('navigation-menu')
    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-transparent">
{{--            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">--}}
                {{ $header }}
{{--            </div>--}}
        </header>
    @endif

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
    <footer class="bg-gradient-to-r from-[#EFF0F2] to-[#B7DAE8] text-[#333333]">
        <div class="container mx-auto py-8 px-4">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold text-[#333333]">Rentfly</h1>
                    <p class="mt-2 text-lg text-[#666666]">Experience the best in accommodation booking</p>
                </div>
                <ul class="flex space-x-6">
                    <li><a href="#" class="text-lg text-[#333333] hover:text-[#FF7F7F]">Help</a></li>
                    <li><a href="#" class="text-lg text-[#333333] hover:text-[#FF7F7F]">FAQ</a></li>
                    <li><a href="#" class="text-lg text-[#333333] hover:text-[#FF7F7F]">Customer</a></li>
                    <li><a href="#" class="text-lg text-[#333333] hover:text-[#FF7F7F]">How it Works</a></li>
                    <li><a href="#" class="text-lg text-[#333333] hover:text-[#FF7F7F]">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </footer>
</div>

@stack('modals')

@livewireScripts
</body>
</html>
