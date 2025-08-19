@props([
    'type' => 'text',
    'size' => 'md',
    'disabled' => false,
    'readonly' => false,
    'label' => null,
])

@php
    $sizes = [
        'sm' => 'ui-form-input-sm',
        'md' => 'ui-form-input-md',
        'lg' => 'ui-form-input-lg',
    ];

    $baseClasses = 'ui-form-base ui-form-input b b-[--input] shadow-sm bg-bg rd-lg text-fg';
    $sizeClasses = $sizes[$size] ?? $sizes['md'];
    
    $id = $attributes->get('id') ?? $attributes->get('name', uniqid('input-'));

    $attributes = $attributes->class([$baseClasses, $sizeClasses])->merge([
        'type' => $type,
        'disabled' => $disabled,
        'readonly' => $readonly,
        'id' => $id,
    ]);
@endphp

@if ($label)
    <div class="flex flex-col space-y-1">
        <label for="{{ $id }}" class="text-sm font-medium leading-none text-fg-muted block peer-disabled:cursor-not-allowed peer-disabled:opacity-70">{{ $label }}</label>
        <input {{ $attributes }}>
    </div>
@else
    <input {{ $attributes }}>
@endif
