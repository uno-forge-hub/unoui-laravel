@props(['id', 'contentClass' => '', 'overlayClass' => '', 'size' => 'md'])

@php
    $sizes = [
        'xs' => 'sm:max-w-sm',
        'sm' => 'sm:max-w-md',
        'md' => 'sm:max-w-lg',
        'lg' => 'sm:max-w-xl',
        'xl' => 'sm:max-w-2xl',
        '2xl' => 'sm:max-w-3xl',
        '3xl' => 'sm:max-w-4xl',
        '4xl' => 'sm:max-w-5xl',
        'full' => 'max-w-full',
    ];
@endphp

<dialog x-modal data-modal-id="{{ $id }}" wire:ignore.self
    {{ $attributes->merge(['class' => 'fixed top-0 left-0 w-screen h-screen z80 hidden fx-open-flex items-center justify-center bg-transparent']) }}>
    <span data-modal-overlay wire:ignore
        class="fixed inset-0 bg-gray-800/80 backdrop-blur-sm {{ $overlayClass }}"></span>
    <div data-modal-content wire:ignore.self class="flex relative bg-bg shadow-sm p5 rd-lg {{ $contentClass }} {{ $sizes[$size] }}">
        {{ $slot }}
    </div>
</dialog>
