<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camaro Garage</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gradient-to-b from-black via-gray-900 to-gray-950 text-gray-200 overflow-x-hidden relative">

{{-- Smoke background --}}
<div class="absolute inset-0 overflow-hidden">
    <div class="absolute w-[150%] h-[150%] bg-[radial-gradient(circle,rgba(255,255,255,0.03)_0%,rgba(0,0,0,0)_70%)] blur-3xl opacity-30 animate-[drift_20s_linear_infinite]"></div>
</div>

<div class="min-h-screen flex flex-col relative z-10">

    {{-- Navigation --}}
    @include('layouts.navigation')

    {{-- Hero Section --}}
    <section class="relative border-b-4 border-yellow-500 bg-gradient-to-b from-gray-900 to-black shadow-inner text-center py-20 sm:py-28">
        <div class="max-w-5xl mx-auto px-4">
            <h1 class="text-5xl sm:text-6xl font-extrabold text-yellow-400 drop-shadow-[0_0_15px_rgba(250,204,21,0.8)] animate-pulse uppercase">
                Welcome to the Camaro Garage
            </h1>
            <p class="mt-6 text-lg text-gray-400 sm:text-xl">
                Explore, restore, and relive the legends of the Camaro legacy.
            </p>
        </div>
    </section>

    {{-- Page Heading --}}
    @isset($header)
        <header class="bg-gray-800 border-b border-yellow-500 shadow-inner">
            <div class="max-w-7xl mx-auto py-6 px-6 sm:px-10 flex justify-between items-center">
                <h2 class="text-3xl font-bold text-yellow-400 drop-shadow-[0_0_10px_rgba(250,204,21,0.8)] uppercase">
                    {{ $header }}
                </h2>
            </div>
        </header>
    @endisset

    {{-- Page Content --}}
    <main class="flex-1 px-4 sm:px-8 lg:px-12 py-10 bg-gradient-to-b from-gray-900 via-black to-gray-900">
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <footer class="bg-gray-800 border-t border-yellow-500 py-6 text-center text-gray-400 relative">
        <div class="flex justify-center items-center space-x-2 mb-2">
            <span class="w-3 h-3 bg-yellow-400 rounded-full animate-pulse"></span>
            <span class="w-3 h-3 bg-yellow-400 rounded-full animate-[pulse_1s_0.2s_infinite]"></span>
            <span class="w-3 h-3 bg-yellow-400 rounded-full animate-[pulse_1s_0.4s_infinite]"></span>
        </div>
        <p>&copy; {{ date('Y') }} Camaro Garage — Built for true car enthusiasts.</p>
    </footer>
</div>

{{-- Custom Tailwind animations --}}
<style>
    @keyframes drift {
        from { transform: translate(-20%, -10%) rotate(0deg); }
        to { transform: translate(20%, 10%) rotate(360deg); }
    }
</style>
</body>
</html>
