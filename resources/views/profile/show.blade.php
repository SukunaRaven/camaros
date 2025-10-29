<x-app-layout>
    <section class="max-w-5xl mx-auto py-10 px-6 bg-gray-900 rounded-lg shadow-lg border border-yellow-400">

        {{-- Success Message --}}
        @if(session('success'))
            <div class="bg-green-600 text-gray-100 px-4 py-2 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        {{-- Profielfoto & Naam --}}
        <div class="text-center mb-8">
            <img src="{{ $user->profile_photo ? Storage::url($user->profile_photo) : '/default-avatar.png' }}"
                 alt="{{ $user->name }}"
                 class="w-32 h-32 mx-auto rounded-full object-cover mb-4 border-4 border-yellow-400">
            <h1 class="text-3xl font-bold text-yellow-400">{{ $user->name }}</h1>
            <p class="text-gray-400">{{ $user->email }}</p>
        </div>

        {{-- Update Forms --}}
        <div class="bg-gray-800 p-6 rounded-lg mb-8">
            {{-- Name / Profile Photo --}}
            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-gray-200 font-semibold">Name</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}"
                           class="w-full px-3 py-2 rounded bg-gray-700 text-gray-100 border border-yellow-400 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    @error('name')<p class="text-red-400 text-sm mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-gray-200 font-semibold">Profile Photo</label>
                    <input type="file" name="profile_photo" class="w-full text-gray-100">
                    @error('profile_photo')<p class="text-red-400 text-sm mt-1">{{ $message }}</p>@enderror
                </div>
                <button type="submit" class="px-6 py-2 bg-yellow-400 text-gray-900 font-semibold rounded hover:bg-yellow-300 transition">
                    Update Profile
                </button>
            </form>

            {{-- Email --}}
            <form method="POST" action="{{ route('profile.updateEmail') }}" class="mt-6 space-y-4">
                @csrf
                <h2 class="text-xl font-bold text-yellow-400 mb-2">Update Email</h2>
                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                       class="w-full px-3 py-2 rounded bg-gray-700 text-gray-100 border border-yellow-400 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                <button type="submit" class="px-6 py-2 bg-yellow-400 text-gray-900 font-semibold rounded hover:bg-yellow-300 transition">
                    Update Email
                </button>
            </form>

            {{-- Password --}}
            <form method="POST" action="{{ route('profile.updatePassword') }}" class="mt-6 space-y-4">
                @csrf
                <h2 class="text-xl font-bold text-yellow-400 mb-2">Change Password</h2>
                <input type="password" name="password" placeholder="New Password"
                       class="w-full px-3 py-2 rounded bg-gray-700 text-gray-100 border border-yellow-400 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                <input type="password" name="password_confirmation" placeholder="Confirm Password"
                       class="w-full px-3 py-2 rounded bg-gray-700 text-gray-100 border border-yellow-400 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                <button type="submit" class="px-6 py-2 bg-yellow-400 text-gray-900 font-semibold rounded hover:bg-yellow-300 transition">
                    Update Password
                </button>
            </form>
        </div>

        {{-- User Camaros --}}
        <h2 class="text-2xl font-bold text-yellow-400 mb-4">Your Camaros</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($camaros as $camaro)
                <div class="bg-gray-800 rounded-lg overflow-hidden shadow-lg border border-yellow-400">
                    <img src="{{ $camaro->image_url ?? '/default-car.png' }}" alt="{{ $camaro->name }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-bold text-yellow-400">{{ $camaro->name }}</h3>
                        <p class="text-gray-400">{{ $camaro->year }}</p>
                        <p class="text-gray-300 mt-1">{{ $camaro->category->name ?? 'Uncategorized' }}</p>
                        <p class="text-gray-200 mt-2 truncate">{{ strip_tags($camaro->description) }}</p>

                        {{-- View button --}}
                        <a href="{{ route('camaro.show', $camaro) }}"
                           class="mt-2 inline-block px-4 py-2 bg-yellow-400 text-gray-900 font-semibold rounded hover:bg-yellow-300 transition">
                            View
                        </a>

                        {{-- Public / Private toggle --}}
                        <form method="POST" action="{{ route('camaro.togglePrivacy', $camaro) }}" class="mt-2">
                            @csrf
                            @method('PATCH')
                            <label class="flex items-center space-x-2 cursor-pointer">
                                <input type="checkbox" name="is_public" onchange="this.form.submit()" {{ $camaro->is_public ? 'checked' : '' }} class="form-checkbox h-5 w-5 text-yellow-400">
                                <span class="text-gray-200 text-sm">{{ $camaro->is_public ? 'Public' : 'Private' }}</span>
                            </label>
                        </form>

                    </div>
                </div>
            @empty
                <p class="text-gray-400">You haven’t uploaded any Camaros yet.</p>
            @endforelse
        </div>

    </section>
</x-app-layout>
