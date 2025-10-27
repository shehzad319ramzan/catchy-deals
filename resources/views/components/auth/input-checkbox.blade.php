<div class="{{ $marginTop }}">
    @if ($label != null)
        <label for="{{ $id }}" class="form-label fs  fw-semibold">{{ $label }}</label>
    @endif

    <div class="form-check form-switch">
        <input @if (old($name, $value)) checked @endif
            class="form-check-input {{ $extraclasses }} @error($name) is-invalid @enderror" type="checkbox" value="1"
            name="{{ $name }}" id="{{ $id }}" {{ $required == null ? '' : 'required' }}
            {{ $attributes }}>

        @if ($errors->has($name))
            <span for="{{ $id }}" class="text-danger">{{ $errors->first($name) }}</span>
        @endif
    </div>
</div>
