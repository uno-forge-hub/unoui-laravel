@props(['as' => 'div'])

@php
    $tag = in_array($as, ['form', 'div']) ? $as : 'div';
@endphp

<{{ $tag }} {{ $attributes->merge(['class' => 'w-full p-[var(--content-padding,2.5rem)]']) }}>
    {{ $slot }}
</{{ $tag }}>
