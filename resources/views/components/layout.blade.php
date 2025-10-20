<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camaro´s</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Garage themed animations */
        @keyframes neon-flicker {
            0%, 19%, 21%, 23%, 25%, 54%, 56%, 100% { opacity: 1; }
            20%, 22%, 24%, 55% { opacity: 0.4; }
        }
        .neon-text {
            text-shadow: 0 0 2px #facc15, 0 0 4px #facc15, 0 0 6px #facc15;
            animation: neon-flicker 1.5s infinite alternate;
        }

        @keyframes car-light {
            0%, 100% { opacity: 0.6; }
            50% { opacity: 1; }
        }
        .car-light { animation: car-light 1s infinite alternate; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-400 { animation-delay: 0.4s; }
    </style>
</head>
<body class="font-sans antialiased bg-gray-900 text-gray-100">

<div class="min-h-screen flex flex-col">

    {{-- Navigation --}}
    @include('layouts.navigation')

    {{-- Hero Section --}}
    <section class="relative bg-gray-800 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 text-center">
            <h1 class="text-5xl sm:text-6xl font-extrabold text-yellow-400 neon-text">
                Welcome to the Camaro Collections
            </h1>
            <p class="mt-6 text-gray-300 text-lg sm:text-xl">
                Find every Camaro ever made here!
            </p>
        </div>
    </section>

    {{-- Page Heading --}}
    @isset($header)
        <header class="bg-gray-800 shadow-inner border-b border-yellow-400">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="text-2xl sm:text-3xl font-bold text-yellow-400 neon-text">
                    {{ $header }}
                </h2>
            </div>
        </header>
    @endisset

    {{-- Page Content --}}
    <main class="flex-1 bg-gray-900 px-4 sm:px-6 lg:px-8 py-8">
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <footer class="bg-gray-800 border-t border-yellow-400 py-6 text-center text-gray-400">
        <p>&copy; {{ date('Y') }} Garage. All rights reserved.</p>
        <div class="mt-2 flex justify-center space-x-3">
            <span class="w-3 h-3 bg-yellow-400 rounded-full car-light"></span>
            <span class="w-3 h-3 bg-yellow-400 rounded-full car-light delay-200"></span>
            <span class="w-3 h-3 bg-yellow-400 rounded-full car-light delay-400"></span>
        </div>
    </footer>

</div>

</body>
</html>
