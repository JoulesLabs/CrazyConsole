@if($label)
<label class="form-label" for="{{ $id ?? $name }}">{{ $label }}</label>
@endif
<input {{ $attributes->merge(['class' =>'form-control']) }} type="{{ $type }}" name="{{ $name }}" id="{{ $id ?? $name }}">
