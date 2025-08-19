@props(['class'=>'', 'withoutPadding'=>false])

<div class="{{ $withoutPadding ? '' : 'p5' }} rd-lg b b-border shadow-sm bg-subtle/40 dark-bg-bg-surface/50 {{$class}}">
    {{ $slot }}
</div>
