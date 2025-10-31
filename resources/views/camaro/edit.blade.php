<x-app-layout>
    <section class="max-w-5xl mx-auto py-10 px-6 bg-gray-900 rounded-lg shadow-lg border border-yellow-400">
        <h1 class="text-3xl font-extrabold text-yellow-400 mb-6 text-center">
            Edit Camaro
        </h1>

        <form method="POST" action="{{ route('camaro.update', $camaro) }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Name (required) --}}
            <x-spec-input label="Name *" name="name" :value="old('name', $camaro->name)" />
            @error('name')
            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror

            {{-- Year (required) --}}
            <x-spec-input label="Year *" name="year" :value="old('year', $camaro->year)" />
            @error('year')
            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror

            {{-- Category (required) --}}
            <div>
                <label for="category_id" class="block text-yellow-400 font-semibold mb-1">Category *</label>
                <select name="category_id" id="category_id" required
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

            {{-- Description (required) --}}
            <div>
                <label for="description" class="block text-yellow-400 font-semibold mb-1">Description *</label>
                <textarea name="description" id="description" rows="4"
                          class="w-full px-3 py-2 rounded bg-gray-800 text-gray-100 border border-yellow-400 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                          required>{{ old('description', $camaro->description) }}</textarea>
                @error('description')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Image (required) --}}
            <div>
                <label for="image" class="block text-yellow-400 font-semibold mb-1">Upload Image *</label>
                <input type="file" name="image" id="image" class="w-full text-gray-100">
                @if($camaro->image_url)
                    <img src="{{ $camaro->image_url }}" alt="{{ $camaro->name }}" class="mt-2 w-48 h-32 object-cover rounded border border-yellow-400">
                @endif
                @error('image')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Additional Specs (optional) --}}
            <x-spec-input label="New fiscal price (€)" name="fiscal_price" :value="old('fiscal_price', $camaro->fiscal_price)" />
            <x-spec-input label="New ready-to-drive price (€)" name="ready_to_drive_price" :value="old('ready_to_drive_price', $camaro->ready_to_drive_price)" />
            <x-spec-input label="Delivery costs (€)" name="delivery_costs" :value="old('delivery_costs', $camaro->delivery_costs)" />
            <x-spec-input label="Road tax (3 months €)" name="road_tax" :value="old('road_tax', $camaro->road_tax)" />
            <x-spec-input label="Classification" name="classification" :value="old('classification', $camaro->classification)" />
            <x-spec-input label="Body" name="body" :value="old('body', $camaro->body)" />
            <x-spec-input label="Number of seats" name="seats" :value="old('seats', $camaro->seats)" />
            <x-spec-input label="Gearbox" name="gearbox" :value="old('gearbox', $camaro->gearbox)" />
            <x-spec-input label="Segment" name="segment" :value="old('segment', $camaro->segment)" />
            <x-spec-input label="Energy label" name="energy_label" :value="old('energy_label', $camaro->energy_label)" />
            <x-spec-input label="Additional tax liability" name="additional_tax" :value="old('additional_tax', $camaro->additional_tax)" />
            <x-spec-input label="Introduction" name="introduction" :value="old('introduction', $camaro->introduction)" />
            <x-spec-input label="End" name="end" :value="old('end', $camaro->end)" />

            {{-- Engine --}}
            <x-spec-input label="Powertrain" name="powertrain" :value="old('powertrain', $camaro->powertrain)" />
            <x-spec-input label="Powertrain type" name="powertrain_type" :value="old('powertrain_type', $camaro->powertrain_type)" />
            <x-spec-input label="Max total power" name="max_power" :value="old('max_power', $camaro->max_power)" />
            <x-spec-input label="Max total torque" name="max_torque" :value="old('max_torque', $camaro->max_torque)" />
            <x-spec-input label="Drive" name="drive" :value="old('drive', $camaro->drive)" />

            {{-- Fuel Engine --}}
            <x-spec-input label="Cylinders" name="cylinders" :value="old('cylinders', $camaro->cylinders)" />
            <x-spec-input label="Valves per cylinder" name="valves_per_cylinder" :value="old('valves_per_cylinder', $camaro->valves_per_cylinder)" />
            <x-spec-input label="Displacement (cc)" name="engine_capacity" :value="old('engine_capacity', $camaro->engine_capacity)" />
            <x-spec-input label="Bore x stroke" name="bore_stroke" :value="old('bore_stroke', $camaro->bore_stroke)" />
            <x-spec-input label="Compression ratio" name="compression_ratio" :value="old('compression_ratio', $camaro->compression_ratio)" />
            <x-spec-input label="Max power" name="max_power" :value="old('max_power', $camaro->max_power)" />
            <x-spec-input label="Max torque" name="max_torque" :value="old('max_torque', $camaro->max_torque)" />
            <x-spec-input label="Fuel system" name="fuel_system" :value="old('fuel_system', $camaro->fuel_system)" />
            <x-spec-input label="Valve control" name="valve_control" :value="old('valve_control', $camaro->valve_control)" />
            <x-spec-input label="Turbocharger" name="turbo" :value="old('turbo', $camaro->turbo)" />
            <x-spec-input label="Catalytic converter" name="catalytic_converter" :value="old('catalytic_converter', $camaro->catalytic_converter)" />
            <x-spec-input label="Fuel tank (l)" name="fuel_tank" :value="old('fuel_tank', $camaro->fuel_tank)" />
            <x-spec-input label="RPM at 100 km/h" name="rpm_100" :value="old('rpm_100', $camaro->rpm_100)" />
            <x-spec-input label="RPM at 130 km/h" name="rpm_130" :value="old('rpm_130', $camaro->rpm_130)" />

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
