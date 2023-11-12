<!-- resources/views/components/x-file-input.blade.php -->

@props(['label', 'name', 'value'])

<div class="mb-4">
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
    <div class="mt-1">
        <input type="file" name="{{ $name }}" id="{{ $name }}" {{ $attributes->merge(['class' => 'border p-2 w-full']) }}>
    </div>
    @if ($value)
        <input type="hidden" name="{{ $name }}_current" value="{{ $value }}">
    @endif
</div>
