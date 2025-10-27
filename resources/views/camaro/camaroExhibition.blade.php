<x-app-layout>
    <section class="text-center py-12 bg-gray-900 border-b border-yellow-400">
        <h1 class="text-5xl font-extrabold text-yellow-400 mb-4">Camaro Exhibition</h1>
        <p class="text-gray-300 max-w-2xl mx-auto">
            Explore our collection of legendary Chevrolet Camaros — from the first generation muscle beasts to the latest high-performance track machines.
        </p>
    </section>

    <section class="bg-gray-800 py-6 border-b border-yellow-400">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Filter + Search --}}
            <form method="GET" action="{{ route('camaro.camaroExhibition') }}" class="flex flex-col md:flex-row gap-4 justify-center">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search Camaro models..."
                       class="px-3 py-2 rounded text-black w-full md:w-1/3">
                <select name="category" class="px-3 py-2 rounded text-black w-full md:w-1/4">
                    <option value="">All Categories</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="px-6 py-2 bg-yellow-400 text-gray-900 font-semibold rounded hover:bg-yellow-300 transition">
                    Filter
                </button>
            </form>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-6 py-10 bg-gray-900">
        @if($camaros->count())
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($camaros as $camaro)
                    <x-camaro-card :camaro="$camaro" />
                @endforeach
            </div>
        @else
            <p class="text-gray-400 text-center">No Camaros found.</p>
        @endif
    </section>
</x-app-layout>
