<nav class="bg-gray-800 text-yellow-400 p-4 flex justify-between items-center border-b border-yellow-500 shadow-md">
    {{-- Linkerkant: Navigatie links --}}
    <div class="flex space-x-6 items-center">
        <a href="{{ route('home') }}" class="font-bold text-xl hover:text-white transition">
            Camaro Garage
        </a>

        <a href="{{ route('camaro.camaroExhibition') }}" class="hover:text-white transition">
            Camaro Exhibition
        </a>

        @auth
            <a href="{{ route('camaro.create') }}" class="hover:text-white transition">
                Add Camaro
            </a>
        @endauth
    </div>

    {{-- Rechterkant: Auth-links --}}
    <div class="flex items-center space-x-4">
        @auth
            {{-- Admin link --}}
            @if(Auth::user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}" class="hover:text-white font-semibold transition">
                    Admin
                </a>
            @else
                {{-- Gewone gebruiker --}}
                <a href="{{ route('profile.show') }}" class="hover:text-white transition">
                    Profile
                </a>
            @endif
        @else
            {{-- Login & Register --}}
            <a href="{{ route('login') }}" class="hover:text-white transition">
                Login
            </a>
            <a href="{{ route('register') }}" class="hover:text-white transition">
                Register
            </a>
        @endauth
    </div>
</nav>
