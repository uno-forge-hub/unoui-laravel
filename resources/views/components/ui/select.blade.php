@props([
    'size' => 'md',
    'disabled' => false,
    'readonly' => false,
])

@php
    $sizes = [
        'sm' => 'form-input-sm',
        'md' => 'form-input-md',
        'lg' => 'form-input-lg'
    ];

    $baseClasses = 'ui-form-input rounded-lg w-full';
    $sizeClasses = $sizes[$size] ?? $sizes['md'];
    
    $attributes = $attributes->class([
        $baseClasses,
        $sizeClasses
    ])->merge([
        'disabled' => $disabled,
        'readonly' => $readonly
    ]);
@endphp

<select {{ $attributes }}>
    {{ $slot }}
</select>