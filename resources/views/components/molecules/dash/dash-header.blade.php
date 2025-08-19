<?php

use Livewire\Volt\Component;

new class extends Component {
    public $pageTitle;
};

?>
<header class="h16 b-b b-border sticky z60 bg-bg/50 backdrop-blur-sm top-0 flex items-center">
    <div class="flex items-center justify-between wfull dash-container px4 sm-px6 lg-px4">
        <div class="flex items-center text-fg gap3">
            <button data-offcanvas-trigger data-target="dashsidebar"
                class="flex lg-hidden text-fg p2 rd-lg hover-bg-bg-surface hover-text-fg-title">
                <div class="flex flex-col text-fg p-2 rd-lg hover-bg-bg-surface hover-text-fg-title">
                    <div class="h0.5 w6 bg-current rd transition duration-300 group-aria-expanded-rotate-45 group-aria-expanded-translate-y-1.5"
                        id="line-1" aria-hidden="true">
                    </div>
                    <div class="mt2 h0.5 w6 bg-current rd transition duration-300 group-aria-expanded--rotate-45 group-aria-expanded--translate-y-1.5"
                        id="line-2" aria-hidden="true">
                    </div>
                </div>
            </button>
            <button class="hidden lg-flex text-fg p2 rd-lg hover-bg-bg-surface hover-text-fg-title">
                <span class="flex i-ph-door-open text-xl text-fg p2 rd-lg"></span>
            </button>
            <span>
                {{ $pageTitle }}
            </span>
        </div>
        <div class="flex">
            <div class="hidden md-flex items-center">
                {{ $slotRight }}
            </div>
            <div class="lg-hidden ml2">
                <x-ui.dropdown.trigger size="none" dropdownId="headerUserDrop">
                    <span class="size-8 flex items-center justify-center rd-full ui-subtle ui-subtle-gray">
                        J
                    </span>
                </x-ui.dropdown.trigger>
            </div>
        </div>
    </div>
</header>
<x-ui.dropdown id="headerUserDrop" size="w65" zIndex="z60">
    <x-atoms.content-user-drop />
</x-ui.dropdown>
