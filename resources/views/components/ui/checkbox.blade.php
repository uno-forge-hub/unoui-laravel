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
        'sm' => 'size-4',
        'md' => 'size-5',
        'lg' => 'size-6',
    ];

    $baseClasses = 'ui-checkbox-radio-base ui-form-checkbox mt0.5 peer text-primary bg-bg b b-border shadow-sm rd';
    $sizeClasses = $sizes[$size] ?? $sizes['sm'];
    $stateClasses = $disabled ? 'cursor-not-allowed op60' : 'cursor-pointer';

    $id = $id ?? $name;

    $attributes = $attributes->class([$baseClasses, $sizeClasses, $stateClasses])->merge([
        'type' => 'checkbox',
        'id' => $id,
        'name' => $name,
        'value' => $value,
        'checked' => $checked,
        'disabled' => $disabled,
    ]);
@endphp



@if ($label)
    <div class="flex items-center">
        <input {{ $attributes }}>
        <label for="{{ $id }}" class="ml2 mt0.5 text-sm select-none font-medium text-fg-muted {{ $disabled ? 'op60' : '' }}">
            {{ $label }}
        </label>
    </div>
@else
    <input {{ $attributes }}>
@endif
