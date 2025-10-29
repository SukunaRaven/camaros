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

    {{-- Rechterkant: Auth-links + profielfoto + logout --}}
    <div class="flex items-center space-x-4">
        @auth
            {{-- Admin link --}}
            @if(Auth::user()->role === 'admin')
                <a href="{{ route('admin.admin') }}" class="hover:text-white font-semibold transition">
                    Admin
                </a>
            @else
                {{-- Gewone gebruiker --}}
                <a href="{{ route('profile.show') }}" class="hover:text-white transition">
                    Profile
                </a>
            @endif

            {{-- Profielfoto --}}
            <a href="{{ route('profile.show') }}">
                <img src="{{ Auth::user()->profile_photo ? Storage::url(Auth::user()->profile_photo) : '/default-avatar.png' }}"
                     alt="{{ Auth::user()->name }}"
                     class="w-10 h-10 rounded-full object-cover border-2 border-yellow-400">
            </a>

            {{-- Logout knop --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-400 transition text-sm">
                    Logout
                </button>
            </form>
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
