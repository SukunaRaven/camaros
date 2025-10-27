@props(['camaro'])

<div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden hover:shadow-yellow-400/20 transition transform hover:-translate-y-1">
    {{-- Image --}}
    @if($camaro->image_url)
        <img src="{{ $camaro->image_url }}" alt="{{ $camaro->name }}" class="w-full h-48 object-cover">
    @else
        <div class="w-full h-48 bg-gray-700 flex items-center justify-center text-gray-500 italic">
            No Image Available
        </div>
    @endif

    {{-- Content --}}
    <div class="p-5">
        <h3 class="text-xl font-bold text-yellow-400">{{ $camaro->name }}
            <span class="text-gray-400 text-base">({{ $camaro->year }})</span>
        </h3>
        <p class="text-gray-300 mt-2">{{ Str::limit($camaro->description, 120) }}</p>

        {{-- Uploader info --}}
        <p class="text-sm text-gray-400 mt-2">Uploaded by: <span class="text-yellow-400">{{ $camaro->uploader->name ?? 'Unknown' }}</span></p>

        {{-- Actions --}}
        <div class="mt-4 flex justify-between items-center">
            <a href="{{ route('camaro.show', $camaro) }}" class="text-yellow-400 font-semibold hover:underline">View Details</a>

            @auth
                @if(Auth::id() === $camaro->user_id || Auth::user()->is_admin)
                    <div class="space-x-2">
                        <a href="{{ route('camaro.edit', $camaro) }}" class="text-blue-400 hover:underline">Edit</a>
                        <form action="{{ route('camaro.destroy', $camaro) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-400 hover:underline">Delete</button>
                        </form>
                    </div>
                @endif
            @endauth
        </div>
    </div>
</div>
