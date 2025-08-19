@props(['title', 'description', 'noPaddingTop' => false, 'icon' => null, 'noContainer'=>false])
<div class="{{ $noContainer ? '' :'dash-container px4 sm-px6 lg-px4' }} {{ $noPaddingTop ? ' ' : 'pt4' }}">
    <div class="flex items-center pb-4 b-b b-border ">
        @if ($icon)
            <span class="size-11 d-flex-place-center mr-4 ui-subtle ui-subtle-gray rd-full">
                <span class="flex text-xl {{ $icon }}"></span>
            </span>
        @endif
        <div class="flex flex-col flex-1">
            <span class="text-fg-title font-semibold">{{ $title }}</span>
            <p class="text-fg-muted text-sm">{{ $description }}</p>
        </div>
    </div>
</div>
