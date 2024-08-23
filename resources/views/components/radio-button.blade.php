@props(['name', 'value', 'label', 'checked' => false])

<div class="form-check">
    <input class="form-check-input" type="radio" name="{{ $name }}" id="{{ $name . '-' . $value }}" value="{{ $value }}"
        {{ $checked || old($name) == $value ? 'checked' : '' }}>
    <label for="{{ $name . '-' . $value }}" class="form-check-label" for="{{ $name . '-' . $value }}">
        {{ $label }}
    </label>
</div>