@props([
    'title' => null,
    'description' => null,
    'titleId' => 'modal-title-' . uniqid(),
    'descriptionId' => 'modal-description-' . uniqid(),
])


<div
    class="relative flex items-start gap-3.5 py-4 px-6 before:absolute before:inset-x-0 before:bottom-0 before:border-b before:border-border">
    <div class="flex-1 space-y-1 pr-14">
        <h2 id="{{ $titleId }}" class="text-fg-title">
            @if (isset($title))
                {{ $title }}
            @else
                {{ $titleSlot }}
            @endif
        </h2>
        @if (isset($description) || isset($descriptionSlot))
            <p id="{{ $descriptionId }}" class="text-sm text-fg-muted">
                @if (isset($description))
                    {{ $description }}
                @else
                    {{ $descriptionSlot }}
                @endif
            </p>
        @endif
    </div>
    <x-ui.modal.close class="absolute top-4 right-4" size="icon-sm" variant="none" class="hover:bg-bg-surface rounded-full text-fg" intent="none">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="size-4" viewBox="0 0 256 256">
            <path
                d="M205.66,194.34a8,8,0,0,1-11.32,11.32L128,139.31,61.66,205.66a8,8,0,0,1-11.32-11.32L116.69,128,50.34,61.66A8,8,0,0,1,61.66,50.34L128,116.69l66.34-66.35a8,8,0,0,1,11.32,11.32L139.31,128Z">
            </path>
        </svg>
    </x-ui.modal.close>
</div>
