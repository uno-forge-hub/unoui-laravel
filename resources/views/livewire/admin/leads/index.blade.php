<?php
use Livewire\Component;
use Livewire\Attributes\Layout;

new 
#[Layout('layouts::dash')] 
class extends Component {
    //
}; ?>
@php
    $leads = [
        [
            'ID' => 'IX393DLK',
            'name' => 'John Smith',
            'phone' => '+1-555-0123',
            'email' => 'john.smith@email.com',
            'status' => 'New',
            'source' => 'Website',
            'created_at' => '2024-03-01',
            'assigned_to' => [
                ['name' => 'Sarah Wilson', 'avatar' => 'SW'],
                ['name' => 'Alex Carter', 'avatar' => 'AC'],
            ],
        ],
        [
            'ID' => 'IX394DLM',
            'name' => 'Emma Johnson',
            'phone' => '+1-555-0124',
            'email' => 'emma.j@email.com',
            'status' => 'In Progress',
            'source' => 'Referral',
            'created_at' => '2024-03-02',
            'assigned_to' => [['name' => 'Mike Brown', 'avatar' => 'MB'], ['name' => 'Anna Vega', 'avatar' => 'AV']],
        ],
        [
            'ID' => 'IX395DLN',
            'name' => 'Michael Davis',
            'phone' => '+1-555-0125',
            'email' => 'm.davis@email.com',
            'status' => 'Qualified',
            'source' => 'LinkedIn',
            'created_at' => '2024-03-03',
            'assigned_to' => [['name' => 'Lisa Chen', 'avatar' => 'LC']],
        ],
        [
            'ID' => 'IX396DLP',
            'name' => 'Sarah Miller',
            'phone' => '+1-555-0126',
            'email' => 's.miller@email.com',
            'status' => 'New',
            'source' => 'Facebook',
            'created_at' => '2024-03-04',
            'assigned_to' => [['name' => 'Tom Wilson', 'avatar' => 'TW'], ['name' => 'Becky Ross', 'avatar' => 'BR']],
        ],
        [
            'ID' => 'IX397DLQ',
            'name' => 'David Wilson',
            'phone' => '+1-555-0127',
            'email' => 'd.wilson@email.com',
            'status' => 'Contacted',
            'source' => 'Trade Show',
            'created_at' => '2024-03-05',
            'assigned_to' => [['name' => 'Emily White', 'avatar' => 'EW']],
        ],
        [
            'ID' => 'IX398DLR',
            'name' => 'Jennifer Brown',
            'phone' => '+1-555-0128',
            'email' => 'j.brown@email.com',
            'status' => 'In Progress',
            'source' => 'Website',
            'created_at' => '2024-03-06',
            'assigned_to' => [
                ['name' => 'James Taylor', 'avatar' => 'JT'],
                ['name' => 'Alice Bennett', 'avatar' => 'AB'],
            ],
        ],
        [
            'ID' => 'IX399DLS',
            'name' => 'Robert Taylor',
            'phone' => '+1-555-0129',
            'email' => 'r.taylor@email.com',
            'status' => 'Qualified',
            'source' => 'Email Campaign',
            'created_at' => '2024-03-07',
            'assigned_to' => [['name' => 'Anna Lee', 'avatar' => 'AL']],
        ],
        [
            'ID' => 'IX400DLT',
            'name' => 'Lisa Anderson',
            'phone' => '+1-555-0130',
            'email' => 'l.anderson@email.com',
            'status' => 'New',
            'source' => 'Google Ads',
            'created_at' => '2024-03-08',
            'assigned_to' => [['name' => 'David Park', 'avatar' => 'DP']],
        ],
        [
            'ID' => 'IX401DLU',
            'name' => 'James Martin',
            'phone' => '+1-555-0131',
            'email' => 'j.martin@email.com',
            'status' => 'Contacted',
            'source' => 'Website',
            'created_at' => '2024-03-09',
            'assigned_to' => [['name' => 'Sophie Chen', 'avatar' => 'SC']],
        ],
        [
            'ID' => 'IX402DLV',
            'name' => 'Mary Thompson',
            'phone' => '+1-555-0132',
            'email' => 'm.thompson@email.com',
            'status' => 'In Progress',
            'source' => 'Referral',
            'created_at' => '2024-03-10',
            'assigned_to' => [
                ['name' => 'Ryan Miller', 'avatar' => 'RM'],
                ['name' => 'Angela White', 'avatar' => 'AW'],
            ],
        ],
    ];

@endphp


<x-organisms.dash.dash-page-wrapper pageTitle="Leads">
    <x-slot name="slotRight">
        <x-ui.button size="icon-sm">
            <span class="i-ph-plus"></span>
        </x-ui.button>
    </x-slot>



    <div class="flex flex-col dash-container px4 sm-px6 lg-px4 mt6">
        <x-organisms.dash.page-header icon="i-ph-campfire" title="Leads" description="Liste of leads" class="mb5">
        </x-organisms.dash.page-header>
        <x-atoms.card>
            <div class="flex items-center justify-between mb4">
                <div class="relative wfull max-w240px flex-1">
                    <x-ui.input placeholder="Search something" class="ps9" />
                    <span class="absolute top-3 left-3 i-ph-magnifying-glass text-sm text-fg-muted"></span>
                </div>
                <div class="flex items-center gap2.5">
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
            <x-ui.table>
                <x-ui.table.header>
                    <tr>
                        <x-ui.table.head class="w10">
                            <x-ui.checkbox/>
                        </x-ui.table.head>
                        <x-ui.table.head class="uppercase tracking-wider">
                            Name
                        </x-ui.table.head>
                        <x-ui.table.head class="uppercase tracking-wider">
                            Contact
                        </x-ui.table.head>
                        <x-ui.table.head class="uppercase tracking-wider">
                            Status
                        </x-ui.table.head>
                        <x-ui.table.head class="uppercase tracking-wider">
                            Source
                        </x-ui.table.head>
                        <x-ui.table.head class="uppercase tracking-wider">
                            Assigned To
                        </x-ui.table.head>
                        <x-ui.table.head>

                        </x-ui.table.head>
                    </tr>
                </x-ui.table.header>
                <x-ui.table.body class="divide-y- divide-border">
                    @foreach ($leads as $lead)
                        <x-ui.table.row wire:key="deal-row-{{ $lead['ID'] }}"
                            class="hover-bg-bg-muted/50 ease-linear duration-100">
                            <x-ui.table.cell class="w10">
                                <x-ui.checkbox/>
                            </x-ui.table.cell>
                            <x-ui.table.cell class="whitespace-nowrap">
                                <div class="text-sm font-medium text-fg-title">
                                    {{ $lead['name'] }}
                                </div>
                            </x-ui.table.cell>
                            <x-ui.table.cell class="whitespace-nowrap">
                                <div class="flex flex-col">
                                    <div class="text-sm text-fg-title">
                                        {{ $lead['phone'] }}
                                    </div>
                                    <div class="text-sm text-fg-muted">
                                        {{ $lead['email'] }}
                                    </div>
                                </div>
                            </x-ui.table.cell>
                            <x-ui.table.cell class="whitespace-nowrap">
                                <span
                                    class="ui-subtle px1.5 py0.5 rd-lg text-sm {{ $lead['status'] === 'New' ? 'ui-subtle-primary' : ($lead['status'] === 'Contacted' ? 'ui-subtle-success' : ($lead['status'] === 'Qualified' ? 'ui-subtle-secondary' : 'ui-subtle-warning')) }}">
                                    {{ $lead['status'] }}
                                </span>
                            </x-ui.table.cell>
                            <x-ui.table.cell class="whitespace-nowrap">
                                <div class="text-sm text-fg-title">
                                    {{ $lead['source'] }}
                                </div>
                            </x-ui.table.cell>
                            <x-ui.table.cell class="whitespace-nowrap">
                                <div class="flex items-center -space-x-3">
                                    @foreach ($lead['assigned_to'] as $assigned)
                                        <span wire:key="user-{{ $assigned['avatar'] }}"
                                            class="ui-subtle ui-subtle-gray size-8 d-flex-place-center rd-full text-sm">
                                            {{ $assigned['avatar'] }}
                                        </span>
                                    @endforeach
                                </div>
                            </x-ui.table.cell>
                            <x-ui.table.cell class="whitespace-nowrap">
                                <x-ui.dropdown.trigger variant="solid" intent="gray"
                                    dropdownId="dealDropdown-{{ $lead['ID'] }}">
                                    <span class="i-ph-dots-three-vertical text-sm"></span>
                                </x-ui.dropdown.trigger>
                            </x-ui.table.cell>
                        </x-ui.table.row>
                        <x-ui.dropdown wire:key="dealDropdown-{{ $lead['ID'] }}" size="w56" class="space-y-1.5"
                            id="dealDropdown-{{ $lead['ID'] }}">
                            <x-ui.dropdown.item>
                                <span class="i-ph-eye text-sm mr2"></span>
                                View deal
                            </x-ui.dropdown.item>
                            <x-ui.dropdown.item>
                                <span class="i-ph-pencil text-sm mr2"></span>
                                Convert to Opportunity
                            </x-ui.dropdown.item>
                            <x-ui.dropdown.item>
                                <span class="i-ph-archive text-sm mr2"></span>
                                Archive lead
                            </x-ui.dropdown.item>
                            <x-ui.dropdown.item danger>
                                <span class="i-ph-trash text-sm mr2"></span>
                                Delete
                            </x-ui.dropdown.item>
                        </x-ui.dropdown>
                    @endforeach
                </x-ui.table.body>
            </x-ui.table>
            <div class="mt5 flex justify-between items-center gap3">
                <div class="flex items-center gap2">
                    <x-ui.button variant="soft" intent="gray" size="sm">
                        <span class="flex mr1.5 i-ph-arrow-left"></span>
                        Prev
                    </x-ui.button>
                    <x-ui.button variant="soft" intent="gray" size="sm">
                        Next
                        <span class="flex ml1.5 i-ph-arrow-right"></span>
                    </x-ui.button>
                </div>
            </div>
        </x-atoms.card>
    </div>
</x-organisms.dash.dash-page-wrapper>
