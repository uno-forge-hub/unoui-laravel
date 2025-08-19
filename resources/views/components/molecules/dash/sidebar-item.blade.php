@props([
    'href',
    'icon',
    'text',
    'active'=>false
])

<li>
    <a href="{{ $href }}" 
    data-state="{{ $active ? 'active' : 'inactive' }}"
    class="flex items-center text-sm gap2.5 px3 py2 text-fg-muted hover-bg-bg-surface hover-text-fg-subtitle rd-lg fx-active-bg-white dark-fx-active-bg-bg-surface b b-transparent fx-active-b-gray200 dark-fx-active-b-gray800/50 fx-active-shadow-sm" wire:navigate>
        <span class="{{ $icon }} size-[18px] transition duration-75"></span>
        <span class="inline truncate">{{ $text }}</span>
    </a>
</li>