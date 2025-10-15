<nav>
    <x-menu-link href="{{route('home')}}" :active="request()->routeIs('home')">Home</x-menu-link>
    <x-menu-link href="{{route('contact')}}" :active="request()->routeIs('contact')">Contact</x-menu-link>
    <x-menu-link href="{{route('about-us')}}" :active="request()->routeIs('about-us')">About Us</x-menu-link>
</nav>

