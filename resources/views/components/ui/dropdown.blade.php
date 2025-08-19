@props(['id','size'=>'w-60','zIndex'=>'z40'])

@php
    $boxClass= "ui-popper {$zIndex} op0 invisible translate-y-3 fx-open-op100 fx-open-visible fx-open-translate-y-0 text-sm p2 bg-bg b b-border shadow-sm rd-lg flex flex-col overflow-hidden text-fg ease-linear transition-transform {$size}";
@endphp
<div x-data x-dropdown wire:ignore.self role="list" id="dropdown-{{ $id }}" data-drop-down
    {{ $attributes->merge(['class' => $boxClass]) }}>
    {{ $slot }}
</div>
