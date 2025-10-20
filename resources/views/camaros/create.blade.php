@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto p-6 bg-gray-800 rounded shadow">

        <h1 class="text-2xl font-bold text-yellow-400 mb-6">
            {{ isset($camaro) ? 'Bewerk Camaro' : 'Voeg nieuwe Camaro toe' }}
        </h1>

        <form method="POST"
              action="{{ isset($camaro) ? route('camaro.update', $camaro) : route('camaro.store') }}"
              enctype="multipart/form-data">
            @csrf
            @if(isset($camaro))
                @method('PUT')
            @endif

            <!-- Naam -->
            <div class="mb-4">
                <label class="block mb-1">Naam</label>
                <input type="text" name="name" value="{{ old('name', $camaro->name ?? '') }}"
                       class="w-full border rounded px-3 py-2 bg-gray-900 text-gray-100">
                @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <!-- Jaar -->
            <div class="mb-4">
                <label class="block mb-1">Jaar</label>
                <input type="number" name="year" value="{{ old('year', $camaro->year ?? '') }}"
                       class="w-full border rounded px-3 py-2 bg-gray-900 text-gray-100">
                @error('year')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <!-- Beschrijving -->
            <div class="mb-4">
                <label class="block mb-1">Beschrijving</label>
                <textarea name="description" class="w-full border rounded px-3 py-2 bg-gray-900 text-gray-100">{{ old('description', $camaro->description ?? '') }}</textarea>
                @error('description')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <!-- Categorie -->
            <div class="mb-4">
                <label class="block mb-1">Categorie</label>
                <select name="category_id" class="w-full border rounded px-3 py-2 bg-gray-900 text-gray-100">
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}"
                            {{ old('category_id', $camaro->category_id ?? '') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <!-- Afbeelding -->
            <div class="mb-4">
                <label class="block mb-1">Afbeelding</label>
                <input type="file" name="image" class="w-full text-gray-100">
                @if(isset($camaro) && $camaro->image_url)
                    <img src="{{ $camaro->image_url }}" class="mt-2 w-32 h-32 object-cover rounded">
                @endif
                @error('image')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <!-- Submit -->
            <button type="submit"
                    class="bg-yellow-400 text-gray-900 px-6 py-2 rounded hover:bg-yellow-500">
                {{ isset($camaro) ? 'Update Camaro' : 'Voeg Camaro toe' }}
            </button>
        </form>
    </div>
@endsection
