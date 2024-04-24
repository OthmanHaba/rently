<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- For Date -->
    <script  type="text/javascript" src="{{ asset('js/Datepicker.js') }}"></script>

    <!-- Styles -->
    @livewireStyles
</head>
<body class="font-sans antialiased">
<x-banner />

<div class="min-h-screen bg-white">
    @livewire('navigation-menu')

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white shadow">
            {{--            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">--}}
            {{ $header }}
            {{--            </div>--}}
        </header>
    @endif

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
    <footer>
        <div class="flex justify-between bg-white py-[20px] px-20">
            <div class="flex flex-col gap-1.5">
                <p class="font-bold text-[20px]">Rentfly</p>
                <p class="">Your favorite accommodation booking experience</p>
            </div>
            <div>
                <ul>
                    <li><a href="">Help</a></li>
                    <li><a href="">FAQ</a></li>
                    <li><a href="">Customer</a></li>
                    <li><a href="">How it Work</a></li>
                    <li><a href="">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </footer>
</div>

@stack('modals')

@livewireScripts
</body>
</html>
