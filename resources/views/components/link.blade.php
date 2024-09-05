<a href="{{ $href }}" target="{{ $target }}" {{ $turboAttributes ?? '' }} {{ $icon ? $attributes->merge(['class' => 'icon-link']) : $attributes }}>
    @if ($icon)
        <svg class="bi" aria-hidden="true"><use xlink:href="{{ asset('/assets/vendors/@coreui/icons/svg/free.svg#' . $icon) }}"></use></svg>
    @endif
        {{ $slot }}</a>
