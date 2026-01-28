<?php
use Livewire\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts::dash')] class extends Component {
    //
}; ?>

@php
    $stats = [
        [
            'title' => 'New Leads',
            'value' => '125',
            'comparisonText' => 'compared to last week',
            'comparisonValue' => '15%',
            'type' => 'increase',
        ],
        [
            'title' => 'Deals Closed',
            'value' => '30',
            'comparisonText' => 'compared to last month',
            'comparisonValue' => '5%',
            'type' => 'decrease',
        ],
        [
            'title' => 'Revenue Generated',
            'value' => '$12,500',
            'comparisonText' => 'this quarter',
            'comparisonValue' => '8%',
            'type' => 'increase',
        ],
    ];

    $deals = [
        [
            'title' => 'Enterprise Software Solution',
            'ID' => 'DEA-2023-001',
            'org-avatar' => 'AC',
            'company' => 'Acme Corporation',
            'value' => '120,000',
            'progress' => [
                'percentage' => '12',
                'hasIncreased' => true,
            ],
            'close-date' => 'May 15, 2025',
            'remaining-days' => '3 weeks',
            'status' => 'active',
        ],
        [
            'title' => 'Website Development',
            'ID' => 'DEA-2023-002',
            'org-avatar' => 'WP',
            'company' => 'WordPress',
            'value' => '15,000',
            'progress' => [
                'percentage' => '50',
                'hasIncreased' => true,
            ],
            'close-date' => 'April 15, 2025',
            'remaining-days' => '10 days',
            'status' => 'active',
        ],
        [
            'title' => 'Software Upgrade',
            'ID' => 'DEA-2023-003',
            'org-avatar' => 'MS',
            'company' => 'Microsoft',
            'value' => '30,000',
            'progress' => [
                'percentage' => '25',
                'hasIncreased' => false,
            ],
            'close-date' => 'May 10, 2025',
            'remaining-days' => '1 week',
            'status' => 'active',
        ],
        [
            'title' => 'Cloud Services Integration',
            'ID' => 'DEA-2023-004',
            'org-avatar' => 'GC',
            'company' => 'Google Cloud',
            'value' => '50,000',
            'progress' => [
                'percentage' => '30',
                'hasIncreased' => true,
            ],
            'close-date' => 'June 5, 2025',
            'remaining-days' => '4 weeks',
            'status' => 'active',
        ],
        [
            'title' => 'Mobile App Development',
            'ID' => 'DEA-2023-005',
            'org-avatar' => 'AP',
            'company' => 'Apple Inc.',
            'value' => '75,000',
            'progress' => [
                'percentage' => '40',
                'hasIncreased' => true,
            ],
            'close-date' => 'July 15, 2025',
            'remaining-days' => '8 weeks',
            'status' => 'active',
        ],
        [
            'title' => 'Data Analysis Project',
            'ID' => 'DEA-2023-006',
            'org-avatar' => 'DA',
            'company' => 'Data Analytics Co.',
            'value' => '60,000',
            'progress' => [
                'percentage' => '10',
                'hasIncreased' => false,
            ],
            'close-date' => 'August 1, 2025',
            'remaining-days' => '10 weeks',
            'status' => 'active',
        ],
        [
            'title' => 'AI Research Initiative',
            'ID' => 'DEA-2023-007',
            'org-avatar' => 'AI',
            'company' => 'AI Innovations',
            'value' => '90,000',
            'progress' => [
                'percentage' => '35',
                'hasIncreased' => true,
            ],
            'close-date' => 'September 20, 2025',
            'remaining-days' => '12 weeks',
            'status' => 'active',
        ],
        [
            'title' => 'E-commerce Platform Revamp',
            'ID' => 'DEA-2023-008',
            'org-avatar' => 'EC',
            'company' => 'E-Shop Ltd.',
            'value' => '45,000',
            'progress' => [
                'percentage' => '20',
                'hasIncreased' => false,
            ],
            'close-date' => 'October 5, 2025',
            'remaining-days' => '15 weeks',
            'status' => 'active',
        ],
        [
            'title' => 'Financial Software Development',
            'ID' => 'DEA-2023-009',
            'org-avatar' => 'FS',
            'company' => 'Finance Corp.',
            'value' => '110,000',
            'progress' => [
                'percentage' => '45',
                'hasIncreased' => true,
            ],
            'close-date' => 'November 15, 2025',
            'remaining-days' => '20 weeks',
            'status' => 'active',
        ],
        [
            'title' => 'Network Infrastructure Upgrade',
            'ID' => 'DEA-2023-010',
            'org-avatar' => 'NI',
            'company' => 'NetTech',
            'value' => '85,000',
            'progress' => [
                'percentage' => '15',
                'hasIncreased' => false,
            ],
            'close-date' => 'December 1, 2025',
            'remaining-days' => '18 weeks',
            'status' => 'active',
        ],
    ];
@endphp

<x-organisms.dash.dash-page-wrapper pageTitle="Home">
    <x-slot name="slotRight">
        <x-ui.button size="icon-sm">
            <span class="i-ph-plus"></span>
        </x-ui.button>
    </x-slot>
    <div class="flex flex-col dash-container px4 sm-px6 lg-px4 mt-10">
        <div class="flex justify-between items-center">
            <div>
                <span class="text-fg">Dashboard</span>
            </div>
            <div class="flex items-center gap-2">
                <button class="btn btn-sm btn-outline btn-outline-gray rd-md text-fg ">
                    <span class="i-ph-funnel flex mr2"></span>
                    Filter
                </button>
                <button class="btn btn-sm btn-outline btn-outline-gray rd-md text-fg ">
                    <span class="i-ph-cloud-arrow-down flex mr2"></span>
                    Export
                </button>
            </div>
        </div>
        <div class="mt8 grid sm-grid-cols-2 lg-grid-cols-3 gap-5">
            @foreach ($stats as $stat)
                <x-atoms.home-stat :title="$stat['title']" :value="$stat['value']" :comparisonText="$stat['comparisonText']" :comparisonValue="$stat['comparisonValue']"
                    :type="$stat['type']" />
            @endforeach

            <livewire:blocks.dash-chart />
            <x-atoms.card class="order-last col-span-full flex flex-col">
                <div class="mb-6">
                    <h2 class="block text-fg-title text-lg font-medium">
                        Deals
                    </h2>
                    <p class="text-fg text-sm font-normal mt-0.5">
                        Active deals by value
                    </p>
                </div>
                <x-ui.table>
                    <x-ui.table.header>
                        <tr>
                            <x-ui.table.head class="uppercase tracking-wider">
                                Deal
                            </x-ui.table.head>
                            <x-ui.table.head class="uppercase tracking-wider">
                                Company
                            </x-ui.table.head>
                            <x-ui.table.head class="uppercase tracking-wider">
                                Value
                            </x-ui.table.head>
                            <x-ui.table.head class="uppercase tracking-wider">
                                Close Date
                            </x-ui.table.head>
                            <x-ui.table.head class="uppercase tracking-wider">
                                Status
                            </x-ui.table.head>
                            <x-ui.table.head>

                            </x-ui.table.head>
                        </tr>
                    </x-ui.table.header>
                    <x-ui.table.body class="divide-y- divide-border">
                        @foreach ($deals as $deal)
                            <x-ui.table.row wire:key="deal-row-{{ $deal['ID'] }}"
                                class="hover-bg-bg-muted/50 ease-linear duration-100">
                                <x-ui.table.cell class="whitespace-nowrap">
                                    <div class="text-sm font-medium text-fg-title">
                                        {{ $deal['title'] }}
                                    </div>
                                    <div class="text-xs text-fg-muted">
                                        ID: {{ $deal['ID'] }}
                                    </div>
                                </x-ui.table.cell>
                                <x-ui.table.cell class="whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="size-8 rd-full ui-subtle ui-subtle-gray d-flex-place-center d text-sm mr-2">
                                            {{ $deal['org-avatar'] }}
                                        </div>
                                        <div class="text-sm text-fg-title">
                                            {{ $deal['company'] }}
                                        </div>
                                    </div>
                                </x-ui.table.cell>
                                <x-ui.table.cell class="whitespace-nowrap">
                                    <div class="text-sm font-medium text-fg-title">${{ $deal['value'] }}</div>
                                    <div
                                        class="text-xs {{ $deal['progress']['hasIncreased'] ? 'text-success' : 'text-danger' }} ">
                                        {{ $deal['progress']['hasIncreased'] ? '+' : '-' }}
                                        {{ $deal['progress']['percentage'] }}% from avg</div>
                                </x-ui.table.cell>
                                <x-ui.table.cell class="whitespace-nowrap">
                                    <div class="text-sm text-fg-title">
                                        {{ $deal['close-date'] }}
                                    </div>
                                    @if ($deal['remaining-days'])
                                        <div class="text-xs text-warning">In {{ $deal['remaining-days'] }}</div>
                                    @endif
                                </x-ui.table.cell>
                                <x-ui.table.cell class="whitespace-nowrap">
                                    <span
                                        class="px2 inline-flex text-xs leading-5 font-semibold rd-full ui-subtle  {{ $deal['status'] === 'active' ? 'ui-subtle-success' : 'ui-subtle-danger' }} ">
                                        {{ $deal['status'] }}
                                    </span>
                                </x-ui.table.cell>
                                <x-ui.table.cell class="whitespace-nowrap">
                                    <x-ui.dropdown.trigger variant="solid" intent="gray"
                                        dropdownId="dealDropdown-{{ $deal['ID'] }}">
                                        <span class="i-ph-dots-three-vertical text-sm"></span>
                                    </x-ui.dropdown.trigger>
                                </x-ui.table.cell>
                            </x-ui.table.row>
                            <x-ui.dropdown wire:key="dealDropdown-{{ $deal['ID'] }}" size="w-40"
                                id="dealDropdown-{{ $deal['ID'] }}">
                                <x-ui.dropdown.item>
                                    <span class="i-ph-eye text-sm mr2"></span>
                                    View deal
                                </x-ui.dropdown.item>
                                <x-ui.dropdown.item>
                                    <span class="i-ph-pencil text-sm mr2"></span>
                                    Edit Deal
                                </x-ui.dropdown.item>
                                <x-ui.dropdown.item>
                                    <span class="i-ph-archive text-sm mr2"></span>
                                    Archive Deal
                                </x-ui.dropdown.item>
                                <x-ui.dropdown.item danger>
                                    <span class="i-ph-x text-sm mr2"></span>
                                    Close Deal
                                </x-ui.dropdown.item>
                            </x-ui.dropdown>
                        @endforeach
                    </x-ui.table.body>
                </x-ui.table>
            </x-atoms.card>
        </div>
    </div>
</x-organisms.dash.dash-page-wrapper>
