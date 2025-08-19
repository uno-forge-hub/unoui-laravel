@props([
    'type' => 'text',
    'size' => 'md',
    'disabled' => false,
    'readonly' => false,
])

@php
    $sizes = [
        'sm' => 'form-input-sm',
        'md' => 'form-input-md',
        'lg' => 'form-input-lg',
    ];

    $baseClasses = 'ui-form-input rounded-lg w-full min-h-20';
    $sizeClasses = $sizes[$size] ?? $sizes['md'];

    $attributes = $attributes->class([$baseClasses, $sizeClasses])->merge([
        'type' => $type,
        'disabled' => $disabled,
        'readonly' => $readonly,
    ]);
@endphp

<textarea {{ $attributes }}>{{ $slot }}</textarea>
