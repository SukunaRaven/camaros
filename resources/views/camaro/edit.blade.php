<x-app-layout>
    <section class="max-w-4xl mx-auto py-10 px-6 bg-gray-900 rounded-lg shadow-lg border border-yellow-400">
        <h1 class="text-3xl font-extrabold text-yellow-400 mb-6 text-center">
            Edit Camaro
        </h1>

        <form method="POST" action="{{ route('camaro.update', $camaro) }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Name --}}
            <div>
                <label for="name" class="block text-yellow-400 font-semibold mb-1">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $camaro->name) }}"
                       class="w-full px-3 py-2 rounded bg-gray-800 text-gray-100 border border-yellow-400 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                @error('name')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Year --}}
            <div>
                <label for="year" class="block text-yellow-400 font-semibold mb-1">Year</label>
                <input type="number" name="year" id="year" value="{{ old('year', $camaro->year) }}"
                       class="w-full px-3 py-2 rounded bg-gray-800 text-gray-100 border border-yellow-400 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                @error('year')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Category --}}
            <div>
                <label for="category_id" class="block text-yellow-400 font-semibold mb-1">Category</label>
                <select name="category_id" id="category_id"
                        class="w-full px-3 py-2 rounded bg-gray-800 text-gray-100 border border-yellow-400 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $camaro->category_id) == $category->id ? 'selected':'' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Description --}}
            <div>
                <label for="description" class="block text-yellow-400 font-semibold mb-1">Description</label>
                <textarea name="description" id="description" rows="4"
                          class="w-full px-3 py-2 rounded bg-gray-800 text-gray-100 border border-yellow-400 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                          required>{{ old('description', $camaro->description) }}</textarea>
                @error('description')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Image --}}
            <div>
                <label for="image" class="block text-yellow-400 font-semibold mb-1">Upload Image</label>
                <input type="file" name="image" id="image" class="w-full text-gray-100">
                @if($camaro->image_url)
                    <img src="{{ $camaro->image_url }}" alt="{{ $camaro->name }}" class="mt-2 w-48 h-32 object-cover rounded border border-yellow-400">
                @endif
                @error('image')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit --}}
            <div class="text-center">
                <button type="submit"
                        class="px-8 py-2 bg-yellow-400 text-gray-900 font-bold rounded hover:bg-yellow-300 transition shadow-lg">
                    Update Camaro
                </button>
            </div>
        </form>
    </section>
</x-app-layout>
