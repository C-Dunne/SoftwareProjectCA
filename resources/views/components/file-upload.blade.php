<div class="form-group py-2">
    @props([
    'disabled' => false,
    'name' => '',
    'field' => '',
    'value' => '',
    'label'=> '',
    'accept' => 'image/*',
])

    <label for="{{ $field }}" class="text-capitalize fw-bold fs-5 pb-1">{{ $label }}</label>

    <input type="file" {{ $disabled ? 'disabled' : '' }} name="{{ $name }}" value="{{ $value }}"
        accept="{{ $accept }}" class="custom-file-input form-control">

    @error($field)
        <div class="text-red-600 text-sm">{{ $message }}</div>
    @enderror

</div>

