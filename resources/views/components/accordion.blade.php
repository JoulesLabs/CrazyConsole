<div {{ $attributes->merge(['class' =>'accordion']) }} id="{{ $id ?? 'accordion' }}" data-controller="accordion">
    {{ $slot }}
</div>
