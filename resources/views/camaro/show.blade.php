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

        <div class="max-w-6xl mx-auto p-6 bg-gray-900 rounded-2xl shadow-xl space-y-12">

            {{-- BASIC FEATURES --}}
            <div>
                <h2 class="text-yellow-400 text-3xl font-bold mb-4 text-center">Basic Features</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-gray-300 border-collapse border border-gray-700">
                        <tbody>
                        <tr class="bg-gray-800">
                            <td class="px-4 py-2 font-semibold">New fiscal price</td>
                            <td class="px-4 py-2 text-right">€{{ $camaro->fiscal_price }}</td>
                        </tr>
                        <tr class="bg-gray-700">
                            <td class="px-4 py-2 font-semibold">New ready-to-drive price</td>
                            <td class="px-4 py-2 text-right">€{{ $camaro->ready_to_drive_price }}</td>
                        </tr>
                        <tr class="bg-gray-800">
                            <td class="px-4 py-2 font-semibold">Delivery costs</td>
                            <td class="px-4 py-2 text-right">€{{ $camaro->delivery_costs }}</td>
                        </tr>
                        <tr class="bg-gray-700">
                            <td class="px-4 py-2 font-semibold">Road tax (3 months)</td>
                            <td class="px-4 py-2 text-right">€{{ $camaro->road_tax }}</td>
                        </tr>
                        <tr class="bg-gray-800">
                            <td class="px-4 py-2 font-semibold">Classification</td>
                            <td class="px-4 py-2 text-right">{{ $camaro->classification }}</td>
                        </tr>
                        <tr class="bg-gray-700">
                            <td class="px-4 py-2 font-semibold">Body</td>
                            <td class="px-4 py-2 text-right">{{ $camaro->body }}</td>
                        </tr>
                        <tr class="bg-gray-800">
                            <td class="px-4 py-2 font-semibold">Number of seats</td>
                            <td class="px-4 py-2 text-right">{{ $camaro->seats }}</td>
                        </tr>
                        <tr class="bg-gray-700">
                            <td class="px-4 py-2 font-semibold">Gearbox</td>
                            <td class="px-4 py-2 text-right">{{ $camaro->gearbox }}</td>
                        </tr>
                        <tr class="bg-gray-800">
                            <td class="px-4 py-2 font-semibold">Segment</td>
                            <td class="px-4 py-2 text-right">{{ $camaro->segment }}</td>
                        </tr>
                        <tr class="bg-gray-700">
                            <td class="px-4 py-2 font-semibold">Energy label</td>
                            <td class="px-4 py-2 text-right">{{ $camaro->energy_label }}</td>
                        </tr>
                        <tr class="bg-gray-800">
                            <td class="px-4 py-2 font-semibold">Additional tax liability</td>
                            <td class="px-4 py-2 text-right">{{ $camaro->additional_tax }}</td>
                        </tr>
                        <tr class="bg-gray-700">
                            <td class="px-4 py-2 font-semibold">Introduction</td>
                            <td class="px-4 py-2 text-right">{{ $camaro->introduction }}</td>
                        </tr>
                        <tr class="bg-gray-800">
                            <td class="px-4 py-2 font-semibold">End</td>
                            <td class="px-4 py-2 text-right">{{ $camaro->end }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- ENGINE --}}
            <div>
                <h2 class="text-yellow-400 text-3xl font-bold mb-4 text-center">Engine</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-gray-300 border-collapse border border-gray-700">
                        <tbody>
                        <tr class="bg-gray-800">
                            <td class="px-4 py-2 font-semibold">Powertrain</td>
                            <td class="px-4 py-2 text-right">{{ $camaro->powertrain }}</td>
                        </tr>
                        <tr class="bg-gray-700">
                            <td class="px-4 py-2 font-semibold">Powertrain type</td>
                            <td class="px-4 py-2 text-right">{{ $camaro->powertrain_type }}</td>
                        </tr>
                        <tr class="bg-gray-800">
                            <td class="px-4 py-2 font-semibold">Max total power</td>
                            <td class="px-4 py-2 text-right">{{ $camaro->max_power }}</td>
                        </tr>
                        <tr class="bg-gray-700">
                            <td class="px-4 py-2 font-semibold">Max total torque</td>
                            <td class="px-4 py-2 text-right">{{ $camaro->max_torque }}</td>
                        </tr>
                        <tr class="bg-gray-800">
                            <td class="px-4 py-2 font-semibold">Drive</td>
                            <td class="px-4 py-2 text-right">{{ $camaro->drive }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- FUEL ENGINE --}}
            <div>
                <h2 class="text-yellow-400 text-3xl font-bold mb-4 text-center">Fuel Engine</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-gray-300 border-collapse border border-gray-700">
                        <tbody>
                        <tr class="bg-gray-800">
                            <td class="px-4 py-2 font-semibold">Cylinders</td>
                            <td class="px-4 py-2 text-right">{{ $camaro->cylinders }}</td>
                        </tr>
                        <tr class="bg-gray-700">
                            <td class="px-4 py-2 font-semibold">Valves per cylinder</td>
                            <td class="px-4 py-2 text-right">{{ $camaro->valves_per_cylinder }}</td>
                        </tr>
                        <tr class="bg-gray-800">
                            <td class="px-4 py-2 font-semibold">Displacement (cc)</td>
                            <td class="px-4 py-2 text-right">{{ $camaro->engine_capacity }}</td>
                        </tr>
                        <tr class="bg-gray-700">
                            <td class="px-4 py-2 font-semibold">Bore x stroke</td>
                            <td class="px-4 py-2 text-right">{{ $camaro->bore_stroke }}</td>
                        </tr>
                        <tr class="bg-gray-800">
                            <td class="px-4 py-2 font-semibold">Compression ratio</td>
                            <td class="px-4 py-2 text-right">{{ $camaro->compression_ratio }}</td>
                        </tr>
                        <tr class="bg-gray-700">
                            <td class="px-4 py-2 font-semibold">Max power</td>
                            <td class="px-4 py-2 text-right">{{ $camaro->max_power }}</td>
                        </tr>
                        <tr class="bg-gray-800">
                            <td class="px-4 py-2 font-semibold">Max torque</td>
                            <td class="px-4 py-2 text-right">{{ $camaro->max_torque }}</td>
                        </tr>
                        <tr class="bg-gray-700">
                            <td class="px-4 py-2 font-semibold">Fuel system</td>
                            <td class="px-4 py-2 text-right">{{ $camaro->fuel_system }}</td>
                        </tr>
                        <tr class="bg-gray-800">
                            <td class="px-4 py-2 font-semibold">Valve control</td>
                            <td class="px-4 py-2 text-right">{{ $camaro->valve_control }}</td>
                        </tr>
                        <tr class="bg-gray-700">
                            <td class="px-4 py-2 font-semibold">Turbocharger</td>
                            <td class="px-4 py-2 text-right">{{ $camaro->turbo }}</td>
                        </tr>
                        <tr class="bg-gray-800">
                            <td class="px-4 py-2 font-semibold">Catalytic converter</td>
                            <td class="px-4 py-2 text-right">{{ $camaro->catalytic_converter }}</td>
                        </tr>
                        <tr class="bg-gray-700">
                            <td class="px-4 py-2 font-semibold">Fuel tank (l)</td>
                            <td class="px-4 py-2 text-right">{{ $camaro->fuel_tank }}</td>
                        </tr>
                        <tr class="bg-gray-800">
                            <td class="px-4 py-2 font-semibold">RPM at 100 km/h</td>
                            <td class="px-4 py-2 text-right">{{ $camaro->rpm_100 }}</td>
                        </tr>
                        <tr class="bg-gray-700">
                            <td class="px-4 py-2 font-semibold">RPM at 130 km/h</td>
                            <td class="px-4 py-2 text-right">{{ $camaro->rpm_130 }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

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
