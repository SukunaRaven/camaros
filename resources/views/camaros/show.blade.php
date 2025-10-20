@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="md:col-span-2">
            <h1 class="text-3xl font-bold mb-4">
                {{ $camaro->name ?? 'Camaro niet gevonden' }} ({{ $camaro->year ?? '' }})
            </h1>

            @if(!empty($camaro->image_url))
                <img src="{{ $camaro->image_url }}" alt="Camaro" class="w-full h-64 object-cover rounded mb-4">
            @endif

            <p class="text-gray-300">{{ $camaro->description ?? '' }}</p>
            <p class="text-gray-500 mt-2">
                Uploader: {{ $camaro->uploader->name ?? 'Onbekend' }}
            </p>
        </div>

        <div>
            <h2 class="text-xl font-bold mb-2">Reviews</h2>

            @if(!empty($camaro->reviews) && $camaro->reviews->count() > 0)
                @foreach($camaro->reviews as $review)
                    <div class="border border-gray-700 p-2 mb-2 rounded">
                        <strong>{{ $review->user->name ?? 'Onbekend' }}</strong> — {{ $review->rating }}/5
                        <p class="text-gray-300">{{ $review->comment }}</p>
                    </div>
                @endforeach
            @else
                <p class="text-gray-400">Geen reviews gevonden.</p>
            @endif

            @auth
                <form method="POST" action="{{ route('reviews.store') }}" class="mt-4">
                    @csrf
                    <input type="hidden" name="camaro_id" value="{{ $camaro->id ?? 0 }}">
                    <div class="mb-2">
                        <label class="block mb-1">Rating</label>
                        <select name="rating" class="border rounded px-2 py-1 w-full">
                            @for($i=1;$i<=5;$i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="block mb-1">Comment</label>
                        <textarea name="comment" class="border rounded px-2 py-1 w-full" required></textarea>
                    </div>
                    <button type="submit" class="bg-yellow-400 text-gray-900 px-4 py-2 rounded hover:bg-yellow-500">
                        Plaats review
                    </button>
                </form>
            @endauth
        </div>
    </div>
@endsection
