@props(['modalId', 'size' => 'sm', 'variant' => 'solid', 'intent' => 'white'])

<x-ui.button data-modal-id="{{ $modalId }}" data-modal-trigger aria-haspopup="dialog"
    {{ $attributes->merge([
        'type' => 'button',
        'size' => $size,
        'variant' => $variant,
        'intent' => $intent,
    ]) }}>
    {{ $slot }}
</x-ui.button>

