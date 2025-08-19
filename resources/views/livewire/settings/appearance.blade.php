<?php

use Livewire\Volt\Component;

use Livewire\Attributes\Layout;

new #[Layout('layouts.dash')] class extends Component {
    //
}; ?>



@php
    $themes = [
        [
            'id' => 'light',
            'icon' => 'i-ph-sun',
            'title' => 'Light Mode',
            'description' => 'Pick a clean and classic light theme.',
        ],
        [
            'id' => 'dark',
            'icon' => 'i-ph-moon',
            'title' => 'Dark Mode',
            'description' => 'Pick a dark theme for a more relaxing experience.',
        ],
        [
            'id' => 'system',
            'icon' => 'i-ph-airplay',
            'title' => 'System',
            'description' => "Adapts to your device's theme.",
        ],
    ];
@endphp

<x-organisms.dash.dash-page-wrapper pageTitle="Settings">
    <x-slot name="slotRight">
        <x-ui.button size="icon-sm">
            <span class="i-ph-plus"></span>
        </x-ui.button>
    </x-slot>
    <x-molecules.dash.dash-block-header icon="i-ph-gear" title="Setting page"
        description="Manage your preferences and configure various options." />
    <div class="dash-container px4 sm-px6 lg-px4 mt-10 wfull grid md-grid-cols-[240px_1fr] gap6 md-gap10 lg-gap16">
        <div class="wfull">
            <x-molecules.dash.settings-tab-links activeName="tab3" />
        </div>
        <div class="wfull grid">
            <div class="flex flex-col gap6 max-wxl wfull">
                <x-molecules.dash.dash-block-header title="Theme Options"
                    description="Pick theme to personalize experience." noPaddingTop noContainer />
                <form class="flex flex-col">
                    <div class="flex flex-col gap-2">
                        @foreach ($themes as $theme)
                        <label for="radio_theme_{{ $theme['id'] }}" wire:key="theme-{{ $theme['id'] }}"
                            class="flex gap-x3 text-sm items-center p-4 rd-lg b b-border shadow-sm has-[:checked]:b-primary cursor-pointer hover-bg-bg-surface">
                            <div class="size-8 d-flex-place-center rd-full b b-border">
                                <span class="flex {{ $theme['icon'] }}"></span>
                            </div>
                            <div
                                class="flex flex-1 flex-col peer-disabled:opacity-80 peer-disabled:pointer-events-none relative">
                                <x-ui.radio  :checked="$loop->first" name="theme" id="radio_theme_{{ $theme['id'] }}"
                                    value="{{ $theme['id'] }}" class="absolute right-0 top-0" />
                                <span class="text-fg-title font-medium">
                                    {{ $theme['title'] }}
                                </span>
                                <p class="text-fg-muted text-sm">
                                    {{ $theme['description'] }}
                                </p>
                            </div>
                        </label>
                    @endforeach
                    </div>
                    <div class="grid grid-cols-2 gap2 mt5">
                        <x-ui.button class="justify-center" variant="outline" intent="gray">
                            Discard
                        </x-ui.button>
                        <x-ui.button class="justify-center">
                            Apply changes
                        </x-ui.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-organisms.dash.dash-page-wrapper>
