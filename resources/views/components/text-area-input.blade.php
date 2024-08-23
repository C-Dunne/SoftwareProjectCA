<div class="form-group py-2">
    @props(['disabled' => false, 'field' => '', 'value' => '', 'placeholder' => '', 'rows' => 3, 'cols' => 1])

    <label for="{{ $field }}" class="text-capitalize fw-bold fs-5 pb-1">{{ $placeholder }}</label>
    <textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
        'class' =>
            'form-control',
    ]) !!} 
    value="{{ $value }}"
    placeholder="{{ $placeholder }}" 
    rows="{{ $rows }}" 
    cols="{{ $cols }}">
    </textarea>

    @error($field)
        <div class="text-red-600 text-sm">{{ $message }}</div>
    @enderror
</div>
