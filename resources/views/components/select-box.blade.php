<!-- resources/views/components/select-box.blade.php -->
<div>
    <label for="{{ $name }}">{{ $label }}:</label>
    <select class="form-control" id="{{ $name }}" name="{{ $name }}" {{ $required ? 'required' : '' }}>
        @foreach($options as $value => $optionLabel)
            <option value="{{ $value }}" {{ $value == old($name, $selected) ? 'selected' : '' }}>
                {{ $optionLabel }}
            </option>
        @endforeach
    </select>
</div>
