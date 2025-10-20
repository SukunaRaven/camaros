<form method="POST" action="{{ $camaro ? route('camaro.update', $camaro) : route('camaro.store') }}" enctype="multipart/form-data">
    @csrf
    @if($camaro)
        @method('PUT')
    @endif

    <div class="mb-4">
        <label class="block mb-1">Naam</label>
        <input type="text" name="name" value="{{ old('name', $camaro->name ?? '') }}" class="w-full border rounded px-3 py-2">
    </div>

    <div class="mb-4">
        <label class="block mb-1">Jaar</label>
        <input type="number" name="year" value="{{ old('year', $camaro->year ?? '') }}" class="w-full border rounded px-3 py-2">
    </div>

    <div class="mb-4">
        <label class="block mb-1">Beschrijving</label>
        <textarea name="description" class="w-full border rounded px-3 py-2">{{ old('description', $camaro->description ?? '') }}</textarea>
    </div>

    <div class="mb-4">
        <label class="block mb-1">Categorie</label>
        <select name="category_id" class="w-full border rounded px-3 py-2">
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ (old('category_id', $camaro->category_id ?? '') == $cat->id) ? 'selected' : '' }}>{{ $cat->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label class="block mb-1">Afbeelding</label>
        <input type="file" name="image" class="w-full">
        @if($camaro && $camaro->image_url)
            <img src="{{ $camaro->image_url }}" class="mt-2 w-32 h-32 object-cover rounded">
        @endif
    </div>

    <button type="submit" class="bg-yellow-400 text-gray-900 px-4 py-2 rounded hover:bg-yellow-500">
        {{ $camaro ? 'Update Camaro' : 'Voeg Camaro toe' }}
    </button>

    @if ($errors->any())
        <div class="mt-4 bg-red-600 text-white p-3 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</form>
