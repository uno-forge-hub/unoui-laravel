@php
    $items = [
        [
            'id' => '0001',
            'name' => 'Dashboard',
            'icon' => 'i-ph-house',
            'href' => '/dashboard',
            'isActive' => request()->routeIs('admin.dashboard'),
        ],
        [
            'id' => '0002',
            'name' => 'Inbox',
            'icon' => 'i-ph-tray',
            'href' => '/dashboard/inbox',
            'isActive' => request()->routeIs('admin.inbox.index'),
        ],
        [
            'id' => '0003',
            'name' => 'Leads',
            'icon' => 'i-ph-campfire',
            'href' => '/dashboard/leads',
            'isActive' => request()->routeIs('admin.leads.index'),
        ],
        [
            'id' => '0005',
            'name' => 'Contacts',
            'icon' => 'i-ph-address-book',
            'href' => '/dashboard/contacts',
            'isActive' => request()->routeIs('admin.contacts.index'),
        ],
        [
            'id' => '0004',
            'name' => 'Deals & Opportunities',
            'icon' => 'i-ph-handshake',
            'href' => '#',
            'isActive' => false,
            'has_children' => true,
            'items' => [
                [
                    'name' => 'Deals',
                    'href' => '/dashboard/deals',
                    'isActive' => request()->routeIs('admin.deals.index'),
                ],
                [
                    'name' => 'Opportunities',
                    'href' => '/dashboard/deals/opportunities',
                    'isActive' => request()->routeIs('admin.deals.opportunities'),
                ],
                [
                    'name' => 'Reports & Analytics',
                    'href' => '/dashboard/deals/reports',
                    'isActive' => request()->routeIs('admin.deals.reports'),
                ],
            ],
        ],

        [
            'id' => '0005',
            'name' => 'Companies',
            'icon' => 'i-ph-buildings',
            'href' => '/dashboard/leads',
            'isActive' => request()->routeIs('admin.companies.index'),
        ],
        [
            'id' => '0005',
            'name' => 'Tasks',
            'icon' => 'i-ph-kanban',
            'href' => '/dashboard/leads',
            'isActive' => request()->routeIs('admin.tasks.index'),
        ],
    ];
@endphp
<aside x-data x-offcanvas id="dashsidebar"
    class="fixed top-0 h-dvh bg-bg b-r b-border bg-bg max-w-72 w11/12 lg-max-wnone lg-w72 p-4 -translate-x-full lg-translate-x-0 left-0 fx-open-translate-x-0 op0 fx-open-op100 lg-op100 ease-linear duration-200 lg-transition-none lg-duration-0">
    <div class="flex flex-col wfull hfull">
        <div class="flex items-center gap-3">
            <a href="#">
                <div class="size-9 bg-bg-surface b b-border-strong rd-lg flex items-center justify-center">
                    <svg width="700" height="700" class="size-8" viewBox="0 0 700 700" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_13_163)">
                            <path
                                d="M177.534 177L522.602 522.068C427.314 617.356 272.822 617.356 177.534 522.068C82.2463 426.78 82.2463 272.288 177.534 177Z"
                                fill="currentColor" class="text-fg-title" />
                            <path
                                d="M589.659 355.5C589.659 380.629 542.788 450.5 517.659 450.5C492.53 450.5 498.659 380.629 498.659 355.5C498.659 330.371 519.03 310 544.159 310C569.288 310 589.659 330.371 589.659 355.5Z"
                                fill="black" />
                            <circle cx="349.429" cy="349.759" r="110" transform="rotate(48.3973 349.429 349.759)"
                                fill="currentColor" stroke="white" class="text-fg-title stroke-bg" stroke-width="80" />
                            <path
                                d="M415 177C415 202.129 318.629 207 293.5 207C268.371 207 248 186.629 248 161.5C248 136.371 268.371 116 293.5 116C318.629 116 415 151.871 415 177Z"
                                fill="currentColor" class="text-fg-title" />
                            <path
                                d="M523 207.5C523 232.629 521.129 321.5 496 321.5C470.871 321.5 432 232.629 432 207.5C432 182.371 452.371 162 477.5 162C502.629 162 523 182.371 523 207.5Z"
                                fill="currentColor" class="text-fg-title" />
                        </g>
                        <defs>
                            <clipPath id="clip0_13_163">
                                <rect width="488" height="488" fill="white" transform="translate(106 106)" />
                            </clipPath>
                        </defs>
                    </svg>
                </div>
            </a>
        </div>
        <div class="mt-6">
            <form class="relative wfull">
                <x-ui.input type="text" placeholder="Your email here" class="ps9 text-fg" />
                <span aria-hidden="true"
                    class="absolute left-3 hfull flex items-center top-0 op60 text-fg-muted pointer-events-none">
                    <span aria-hidden="true" class="flex i-ph-magnifying-glass text-lg"></span>
                </span>
            </form>
        </div>
        <nav class="flex flex-1 flex-col pt7">
            <ul class="flex flex-col space-y-1">
                @foreach ($items as $item)
                    @if (!isset($item['has_children']) || !$item['has_children'])
                        <x-molecules.dash.sidebar-item :active="$item['isActive']" :href="$item['href']" :icon="$item['icon']"
                            :text="$item['name']" />
                    @else
                        <x-molecules.dash.sidebar-item-collapsible :id="$item['id']" :name="$item['name']" :icon="$item['icon']"
                            :items="$item['items']" />
                    @endif
                @endforeach
            </ul>
        </nav>
        <div class="h-max w-full pt3 b-t b-border">
            <nav>
                <ul class="flex flex-col space-y-1">
                    <x-molecules.dash.sidebar-item href="/settings/appearance" icon="i-ph-gear" :text="__('Settings')"
                        :active="str_contains(request()->route()->getName(), 'settings')" />
                    <li class="flex w-full">
                        <x-ui.dropdown.trigger dropdownId="userDrop" intent="none" variant="none" size="none"
                            class="flex items-center text-sm gap-2.5 px-2 py-1 text-fg-muted hover-bg-bg-surface hover-text-fg-subtitle rd-lg wfull">
                            <span class="size-8 flex items-center justify-center rd-full ui-subtle ui-subtle-gray">
                                J
                            </span>
                            <span class="flex-1 truncate text-left font-medium">
                                Johnkat Mj
                            </span>
                            <span class="i-ph-caret-up-down flex"></span>
                        </x-ui.dropdown.trigger>
                    </li>
                </ul>
            </nav>

        </div>
    </div>
    <x-ui.dropdown id="userDrop" size="w65">
        <x-atoms.content-user-drop />
    </x-ui.dropdown>
</aside>
