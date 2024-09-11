<div class="form-check">
    <input {{ $attributes->merge(['class' =>'form-check-input']) }} type="{{ $type }}" name="{{ $name }}" id="{{ $id ?? $name }}">
    @if($label)
    <label class="form-check-label" for="{{ $id ?? $name }}">
        {{ $label }}
    </label>
    @endif
</div>
