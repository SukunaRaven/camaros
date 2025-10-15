<nav class="bg-gray-900 text-gray-100 shadow-lg">
    <ul class="flex justify-center space-x-8 py-6">

        <!-- Home -->
        <x-menu-link href="{{ route('camaros.home') }}"
                     :active="request()->routeIs('camaros.home')"
                     class="relative flex items-center px-4 py-2 font-bold uppercase tracking-wider text-gray-100
                            transition-all duration-300 hover:text-yellow-400 hover:scale-105">
            <span class="mr-2 transform transition-transform duration-500 group-hover:translate-x-1">Home</span>
            <span class="absolute left-0 bottom-0 w-0 h-1 bg-yellow-400 transition-all duration-300 group-hover:w-full"></span>
        </x-menu-link>

        <!-- Show Camaros -->
        <x-menu-link href="{{ route('camaros.show') }}"
                     :active="request()->routeIs('camaros.show')"
                     class="relative flex items-center px-4 py-2 font-bold uppercase tracking-wider text-gray-100
                            transition-all duration-300 hover:text-yellow-400 hover:scale-105">
            <span class="mr-2 transform transition-transform duration-500 group-hover:translate-x-1">Show Camaros</span>
            <span class="absolute left-0 bottom-0 w-0 h-1 bg-yellow-400 transition-all duration-300 group-hover:w-full"></span>
        </x-menu-link>

        <!-- Edit Camaros -->
        <x-menu-link href="{{ route('camaros.edit') }}"
                     :active="request()->routeIs('camaros.edit')"
                     class="relative flex items-center px-4 py-2 font-bold uppercase tracking-wider text-gray-100
                            transition-all duration-300 hover:text-yellow-400 hover:scale-105">
            <span class="mr-2 transform transition-transform duration-500 group-hover:translate-x-1">Edit Camaros</span>
            <span class="absolute left-0 bottom-0 w-0 h-1 bg-yellow-400 transition-all duration-300 group-hover:w-full"></span>
        </x-menu-link>

        <!-- Create Camaros -->
        <x-menu-link href="{{ route('camaros.create') }}"
                     :active="request()->routeIs('camaros.create')"
                     class="relative flex items-center px-4 py-2 font-bold uppercase tracking-wider text-gray-100
                            transition-all duration-300 hover:text-yellow-400 hover:scale-105">
            <span class="mr-2 transform transition-transform duration-500 group-hover:translate-x-1">Create Camaros</span>
            <span class="absolute left-0 bottom-0 w-0 h-1 bg-yellow-400 transition-all duration-300 group-hover:w-full"></span>
        </x-menu-link>

        @guest
            <!-- Login Button -->
            <x-menu-link href="{{ route('users.loginUser') }}"
                         :active="request()->routeIs('users.loginUser')"
                         class="relative flex items-center px-4 py-2 font-bold uppercase tracking-wider text-gray-100
                                transition-all duration-300 hover:text-yellow-400 hover:scale-105">
                <span class="mr-2 transform transition-transform duration-500 group-hover:translate-x-1">Login</span>
                <span class="absolute left-0 bottom-0 w-0 h-1 bg-yellow-400 transition-all duration-300 group-hover:w-full"></span>
            </x-menu-link>
        @else
            @if(auth()->user()->role === 'admin')
                <!-- Admin Button -->
                <x-menu-link href="{{ route('admin.admin') }}"
                             :active="request()->routeIs('admin.admin')"
                             class="relative flex items-center px-4 py-2 font-bold uppercase tracking-wider text-gray-100
                                    transition-all duration-300 hover:text-yellow-400 hover:scale-105">
                    <span class="mr-2 transform transition-transform duration-500 group-hover:translate-x-1">Admin</span>
                    <span class="absolute left-0 bottom-0 w-0 h-1 bg-yellow-400 transition-all duration-300 group-hover:w-full"></span>
                </x-menu-link>
            @else
                <!-- Profile Button -->
                <x-menu-link href="{{ route('users.userProfile') }}"
                             :active="request()->routeIs('users.userProfile')"
                             class="relative flex items-center px-4 py-2 font-bold uppercase tracking-wider text-gray-100
                                    transition-all duration-300 hover:text-yellow-400 hover:scale-105">
                    <span class="mr-2 transform transition-transform duration-500 group-hover:translate-x-1">Profile</span>
                    <span class="absolute left-0 bottom-0 w-0 h-1 bg-yellow-400 transition-all duration-300 group-hover:w-full"></span>
                </x-menu-link>
            @endif
        @endguest

    </ul>
</nav>
