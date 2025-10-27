<x-app-layout>
    <section class="max-w-5xl mx-auto py-10 px-6 bg-gray-900 rounded-lg shadow-lg border border-yellow-400">
        {{-- Camaro Image --}}
        @if($camaro->image_url)
            <img src="{{ $camaro->image_url }}" alt="{{ $camaro->name }}" class="w-full h-72 object-cover rounded-lg mb-6">
        @else
            <div class="w-full h-72 bg-gray-800 flex items-center justify-center text-gray-500 italic rounded-lg mb-6">
                No Image Available
            </div>
        @endif

        {{-- Camaro Info --}}
        <div class="text-center mb-8">
            <h1 class="text-4xl font-extrabold text-yellow-400">{{ $camaro->name }}</h1>
            <p class="text-gray-400 italic text-lg mt-1">{{ $camaro->year }}</p>
            <p class="text-gray-300 mt-2">Category: <span class="text-yellow-400">{{ $camaro->category->name ?? 'Uncategorized' }}</span></p>
        </div>

        {{-- Description --}}
        <div class="text-gray-200 mb-8 leading-relaxed border-t border-gray-700 pt-4">
            {{ $camaro->description }}
        </div>

        {{-- Uploader --}}
        <p class="text-gray-400 text-sm mb-6">
            Uploaded by: <span class="text-yellow-400">{{ $camaro->uploader->name ?? 'Unknown' }}</span>
        </p>

        {{-- Actions --}}
        @auth
            @if(Auth::id() === $camaro->user_id || Auth::user()->is_admin)
                <div class="flex justify-center gap-4 mb-6">
                    <a href="{{ route('camaro.edit', $camaro) }}"
                       class="px-6 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-400 transition shadow-lg">
                        Edit
                    </a>
                    <form action="{{ route('camaro.destroy', $camaro) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="px-6 py-2 bg-red-500 text-white font-semibold rounded hover:bg-red-400 transition shadow-lg">
                            Delete
                        </button>
                    </form>
                </div>
            @endif
        @endauth

        {{-- Back Link --}}
        <div class="text-center">
            <a href="{{ route('camaro.camaroExhibition') }}" class="text-yellow-400 hover:underline">
                Back to Exhibition
            </a>
        </div>
    </section>
</x-app-layout>
