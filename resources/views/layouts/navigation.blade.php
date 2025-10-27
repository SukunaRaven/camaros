<nav class="bg-gray-800 text-yellow-400 p-4 flex justify-between items-center">
    <div class="flex space-x-6 items-center">
        <a href="{{ route('home') }}" class="font-bold text-xl">Camaro Garage</a>
        <a href="{{ route('camaro.camaroExhibition') }}" class="hover:text-white">Alle Camaro’s</a>
        <a href="{{ route('camaro.create') }}" class="hover:text-white">Voeg Camaro toe</a>
    </div>

    <div class="space-x-4">
        @auth
            <form method="POST" action="{{ route('logout') }}" class="inline">@csrf
                <button type="submit" class="hover:text-white">Log uit</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="hover:text-white">Login</a>
            <a href="{{ route('register') }}" class="hover:text-white">Register</a>
        @endauth
    </div>
</nav>
