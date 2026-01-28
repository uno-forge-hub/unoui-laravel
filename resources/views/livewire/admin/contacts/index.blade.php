<?php
use Livewire\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts::dash')] class extends Component {
    //
}; ?>

<x-organisms.dash.dash-page-wrapper pageTitle="Contacts">
    <x-slot name="slotRight">
        <x-ui.button size="icon-sm">
            <span class="i-ph-plus"></span>
        </x-ui.button>
    </x-slot>

    <div class="flex flex-col dash-container px4 sm-px6 lg-px4 mt6">

    </div>
</x-organisms.dash.dash-page-wrapper>
