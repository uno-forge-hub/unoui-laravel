@props([
    'id' => null,
    'name' => '',
    'value' => '',
    'checked' => false,
    'disabled' => false,
    'size' => 'sm',
    'label' => '',
])

@php
    $sizes = [
        'sm' => 'w-4 h-4',
        'md' => 'w-5 h-5',
        'lg' => 'w-6 h-6'
    ];

    $baseClasses = 'ui-checkbox-radio-base ui-form-radio size-4 b b-border-light bg-bg  mt0.5 peer text-primary rd-full';
    $sizeClasses = $sizes[$size] ?? $sizes['sm'];
    $stateClasses = $disabled ? 'cursor-not-allowed opacity-60' : 'cursor-pointer';
    
    $id = $id ?? $name;

    $attributes = $attributes->class([
        $baseClasses,
        $sizeClasses,
        $stateClasses
    ])->merge([
        'type' => 'radio',
        'id' => $id,
        'name' => $name,
        'value' => $value,
        'checked' => $checked,
        'disabled' => $disabled,
    ]);
@endphp

<div class="flex items-center">
    <input {{ $attributes }}>
    @if($label)
        <label for="{{ $id }}" class="ml-2 text-sm font-medium text-gray-700 {{ $disabled ? 'opacity-60' : '' }}">
            {{ $label }}
        </label>
    @endif
</div>