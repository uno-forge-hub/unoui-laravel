<ul>
    <li class="flex items-center gap-3 px2 b-b pb2 b-border">
        <div class="w-max">
            <span class="size-10 flex items-center justify-center rd-full ui-subtle ui-subtle-gray">
                J
            </span>
        </div>
        <div>
            <h6 class="text-fg-subtitle text-sm font-semibold">John Doe</h6>
            <small class="text-fg-muted text-sm">jhon@doe.com</small>
        </div>
    </li>
    <li class=" b-b py1.5 b-border grid grid-cols-2 gap2 ">
        <x-ui.button size="sm" variant="none" x-on:click="$store.theme.setToLight()"
            class="hover-bg-bg-suface bg-bg-surface dark-bg-bg justify-center b b-border dark-b-transparent">
            <span class="i-ph-sun flex"></span>
        </x-ui.button>
        <x-ui.button size="sm" variant="none" x-on:click="$store.theme.setToDark()"
            class="hover-bg-bg-suface bg-bg dark-bg-bg-surface justify-center b b-transparent dark-b-border-light">
            <span class="i-ph-moon flex"></span>
        </x-ui.button>
    </li>
    <li class="wfull pt2">
        <x-ui.dropdown.item href="#" class="wfull">
            <span class="i-ph-user flex mr2"></span>
            Profil
        </x-ui.dropdown.item>
    </li>
    <li class="wfull">
        <livewire:blocks.logout-item />
    </li>
</ul>
