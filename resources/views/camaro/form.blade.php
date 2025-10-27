<div class="space-y-4">
    <div>
        <label for="name" class="block text-gray-300 font-semibold">Model Name</label>
        <input type="text" id="name" name="name" value="{{ old('name', $camaro->name ?? '') }}" required
               class="w-full mt-1 px-3 py-2 bg-gray-800 border border-gray-700 rounded text-gray-100">
        @error('name') <p class="text-red-400 text-sm">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="year" class="block text-gray-300 font-semibold">Year</label>
        <input type="number" id="year" name="year" value="{{ old('year', $camaro->year ?? '') }}" required
               class="w-full mt-1 px-3 py-2 bg-gray-800 border border-gray-700 rounded text-gray-100">
        @error('year') <p class="text-red-400 text-sm">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="description" class="block text-gray-300 font-semibold">Description</label>
        <textarea id="description" name="description" rows="5" required
                  class="w-full mt-1 px-3 py-2 bg-gray-800 border border-gray-700 rounded text-gray-100">{{ old('description', $camaro->description ?? '') }}</textarea>
        @error('description') <p class="text-red-400 text-sm">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="category_id" class="block text-gray-300 font-semibold">Category</label>
        <select name="category_id" id="category_id"
                class="w-full mt-1 px-3 py-2 bg-gray-800 border border-gray-700 rounded text-gray-100">
            <option value="">Select a Category</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ old('category_id', $camaro->category_id ?? '') == $cat->id ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>
        @error('category_id') <p class="text-red-400 text-sm">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="image" class="block text-gray-300 font-semibold">Image</label>
        <input type="file" name="image" id="image" class="w-full mt-1 text-gray-200">
        @if(isset($camaro) && $camaro->image_url)
            <img src="{{ $camaro->image_url }}" alt="Camaro image" class="mt-3 w-48 rounded shadow">
        @endif
        @error('image') <p class="text-red-400 text-sm">{{ $message }}</p> @enderror
    </div>
</div>
