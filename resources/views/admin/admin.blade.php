<x-app-layout>
    <section class="max-w-6xl mx-auto py-10 px-6 bg-gray-900 rounded-lg shadow-lg border border-yellow-400">
        <h1 class="text-3xl font-bold text-yellow-400 mb-6">Admin Dashboard</h1>
        <h2 class="text-2xl font-semibold text-yellow-400 mb-4">Gebruikersbeheer</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach($users as $user)
                <div class="bg-gray-800 rounded-lg shadow p-4 border border-yellow-400 flex justify-between items-center">
                    <div>
                        <p class="text-yellow-400 font-bold">{{ $user->name }}</p>
                        <p class="text-gray-400 text-sm">{{ $user->email }}</p>
                        <p class="text-gray-400 text-sm">Rol: {{ $user->role }}</p>
                    </div>
                    @if($user->id !== auth()->id())
                        <form action="{{ route('admin.user.destroy', $user) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-400">
                                Verwijder
                            </button>
                        </form>
                    @endif
                </div>
            @endforeach
        </div>
    </section>
</x-app-layout>
