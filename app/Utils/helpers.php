<?php

if (!function_exists('user')) {
    function user(?string $guard = 'web'): ?\Illuminate\Contracts\Auth\Authenticatable
    {
        return auth($guard)->user();
    }
}

if (!function_exists('main_frame')) {
    function main_frame($frame = ''): string
    {
        return config('admin.main_frame') . ($frame ? '.' . $frame : '');
    }
}


if (!function_exists('html_attrs')) {
    function html_attrs(array $attrs): string
    {
        $result = [];
        foreach ($attrs as $key => $value) {
            $result[] = "$key=\"$value\" ";
        }

        return implode(' ', $result);
    }
}


if (!function_exists('show_if_request_is')) {
    function show_if_request_is(string $value, string ...$paths): string
    {
        return in_array(request()->path(), $paths) ? $value : '';
    }
}

if (!function_exists('show_if_request_matches')) {
    function show_if_request_matches(string $value, string ...$paths): string
    {
        return request()->is(...$paths) ? $value : '';
    }
}
