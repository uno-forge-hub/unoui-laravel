@props([
    'dropdownId',
    'variant' => 'none',
    'intent' => 'none',
    'danger' => false,
    'href' => null,
    'disabled' => false,
])
@php
    $itemClassDefault = $danger
        ? 'focus-outline-danger focus-bg-danger50 hover-bg-danger100 text-danger dark-hover-bg-danger900/30 dark-focus-bg-danger900/30'
        : 'focus:outline-primary focus:bg-bg-muted hover:bg-bg-muted';
    $className = 'focus:outline rounded-md py-1.5 px-3 outline-none ease-linear duration-200 flex items-center ';

    $attributes = $attributes->class([$className, $itemClassDefault, 'cursor-not-allowed' => $disabled]);

    $tag = $href ? 'a' : 'button';
    $attributes =
        $tag === 'button'
            ? ($attributes = $attributes->merge([
                'disabled' => $disabled,
            ]))
            : $attributes->merge([
                'href' => $disabled ? null : $href,
                'aria-disabled' => $disabled ? 'true' : null,
                'tabindex' => $disabled ? '-1' : null,
            ]);
@endphp

<{{ $tag }} {{ $attributes }}>
    {{ $slot }}
    </{{ $tag }}>
