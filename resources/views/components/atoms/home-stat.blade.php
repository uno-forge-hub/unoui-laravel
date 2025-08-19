@props(['title', 'value', 'comparisonText', 'comparisonValue', 'type' => 'increase'])
<x-atoms.card class="flex flex-col">
    <span class="text-fg text-sm">
        {{ $title }}
    </span>
    <span class="text-fg-title font-semibold text-2xl md:text-4xl mt4">
        {{ $value }}
    </span>
    <div class="flex justify-between wfull items-center mt-2">
        <div class="flex items-center text-sm text-fg-muted">
            @if ($type === 'increase')
                <span class="i-ph-trend-up mr2 text-success"></span>
            @elseif ($type === 'decrease')
                <span class="i-ph-trend-down text-danger mr2"></span>
            @else
                <span class="i-ph-arrow-right text-primary mr2"></span>
            @endif
             {{ $comparisonValue }} {{ $comparisonText }}
        </div>

    </div>
</x-atoms.card>
