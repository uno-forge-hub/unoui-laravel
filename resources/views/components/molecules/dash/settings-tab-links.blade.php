@props(['activeName'])

@php
    $tabs = [
        [
            'id' => 'tab1',
            'text' => 'Profile',
            'href' => '/settings/profile',
            'icon' => 'i-ph-user',
        ],
        [
            'id' => 'tab2',
            'text' => 'Password',
            'href' => '/settings/password',
            'icon' => 'i-ph-password',
        ],
        [
            'id' => 'tab3',
            'text' => 'Appearance',
            'href' => '/settings/appearance',
            'icon' => 'i-ph-palette',
        ],
    ];
@endphp


<div class="shadow-sm b b-border ui-card cp-1 c-rd-lg bg-bg ">
    <ul class="items-center gap1 flex flex-col">
        @foreach ($tabs as $tab)
            <li wire:key="{{ $tab['id'] }}" class="flex items wfull">
                <a href="{{ $tab['href'] }}" data-state="{{ $activeName === $tab['id'] ? 'active' : 'inactive' }}"
                    class="flex items-center text-fg gap3 px2 py1.5 text-sm inner-radius hover-bg-bg-surface hover-text-fg-title fx-active-bg-bg-surface wfull">
                    <span class="i-ph {{ $tab['icon'] }} mr2"></span>
                    <span>{{ $tab['text'] }}</span>
                </a>
            </li>
        @endforeach
    </ul>
</div>