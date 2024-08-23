<div class="form-group">
    @props(['centers', 'field' => '','selected' => null])

    <label for="{{ $field }}" class="text-capitalize fw-bold fs-5 pb-1">{{ $field }}</label>
    <select {{ $attributes->merge(['class' => 'form-control']) }}>
        @foreach ($centers as $center)
            <option value="{{ $center->id }}" {{ $selected == $center->id ? 'selected' : '' }}>
            {{ $center->name }}
            </option>
        @endforeach
    </select>
</div>
@error($field)
<div class="text-red-600 text-sm">{{ $message }}</div>
@enderror
