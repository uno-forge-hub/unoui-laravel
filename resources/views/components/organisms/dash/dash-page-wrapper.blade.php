@props(['pageTitle'])

<div class="block min-h-vh pb5">
    <x-molecules.dash.dash-header :pageTitle="$pageTitle">
        <x-slot name="slotRight">
            {{ $slotRight }}
        </x-slot>
    </x-molecules.dash.dash-header>
    {{ $slot }}
</div>