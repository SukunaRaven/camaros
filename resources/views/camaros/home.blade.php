@extends('layouts.app')

@section('content')

    <div class="mb-6 flex flex-col md:flex-row md:items-center md:space-x-4 space-y-2 md:space-y-0">
        <form method="GET" action="{{ route('camaro.index') }}" class="flex w-full md:w-auto flex-col md:flex-row md:items-center md:space-x-2">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Zoek..." class="border rounded px-3 py-2 w-full md:w-64">
            <select name="category" class="border rounded px-3 py-2 w-full md:w-48">
                <option value="">Alle categorieën</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="bg-yellow-400 text-gray-900 px-4 py-2 rounded hover:bg-yellow-500 mt-2 md:mt-0">Zoeken</button>
        </form>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($camaros as $camaro)
            <div class="bg-gray-800 border border-gray-700 rounded shadow p-4 flex flex-col">
                @if($camaro->image_url)
                    <img src="{{ $camaro->image_url }}" alt="Camaro" class="w-full h-48 object-cover rounded mb-4">
                @endif
                <h2 class="text-xl font-bold mb-2">{{ $camaro->name }} ({{ $camaro->year }})</h2>
                <p class="text-gray-300 mb-2">{{ Str::limit($camaro->description, 100) }}</p>
                <p class="text-gray-500 text-sm mb-4">Categorie: {{ $camaro->category->name }}</p>
                <div class="mt-auto flex space-x-2">
                    <a href="{{ route('camaro.show', $camaro) }}" class="px-3 py-1 border rounded text-yellow-400 hover:bg-yellow-500 hover:text-white">Bekijk</a>
                    @can('update', $camaro)
                        <a href="{{ route('camaro.edit', $camaro) }}" class="px-3 py-1 border rounded text-gray-400 hover:bg-gray-700">Bewerk</a>
                    @endcan
                    <button class="px-3 py-1 border rounded text-green-400 hover:bg-green-600 toggle-status" data-id="{{ $camaro->id }}">
                        {{ $camaro->is_active ? 'Deactiveer' : 'Activeer' }}
                    </button>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $camaros->links() }}
    </div>

@endsection
