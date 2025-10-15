<nav>
    <x-menu-link href="{{route('home')}}" :active="request()->routeIs('home')">Home</x-menu-link>
    <x-menu-link href="{{route('show')}}" :active="request()->routeIs('show')">Show Camaros</x-menu-link>
    <x-menu-link href="{{route('edit')}}" :active=" request()->routeIs('edit')">Edit Camaros</x-menu-link>
    <x-menu-link href="{{route('create')}}" :active="request()->routeIs('create')">Create Camaros</x-menu-link>
    <x-menu-link href="{{route('userProfile')}}" :active="request()->routeIs('userProfile')">Profile</x-menu-link>
    <x-menu-link href="{{route('admin')}}" :active="request()->routeIs('admin')">Admin</x-menu-link>
</nav>

