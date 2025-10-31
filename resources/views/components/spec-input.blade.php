@props(['label', 'name', 'value' => ''])

<div>
    <label class="text-gray-300 text-sm">{{ $label }}</label>
    <input type="text" name="{{ $name }}" value="{{ old($name, $value) }}"
           class="w-full px-2 py-1 rounded bg-gray-900 text-gray-100 border border-yellow-400 focus:outline-none focus:ring-1 focus:ring-yellow-400">
</div>
