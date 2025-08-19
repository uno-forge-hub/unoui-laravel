@props(['name','id', 'icon', 'items' => []])

<div class="flex flex-col gap2">
    <a href="#" aria-label="{{ $name }}" data-collapse-trigger data-target="collapse{{$id}}" aria-expanded="true"
        class="group flex items-center text-sm px3 py2 text-fg-muted hover-bg-bg-surface hover-text-fg-subtitle rd-lg">
        <div class="flex items-center gap-2.5 wfull">
            <span class="{{ $icon }} size-[18px] transition duration-75"></span>
            <span class="flex-1"> {{ $name }}</span>
            <span class="i-ph-caret-right-fill flex text-sm op70 group-aria-expanded-rotate-90 ease-linear transition-transform"></span>
        </div>
    </a>
    <div x-data x-f-collapse id="collapse{{$id}}" data-state="open" class="tansition-[height] duration-300 ease-linear overflow-hidden w-full h-0 fx-open:h-auto">
        <ul
            class="space-y-1 relative before-absolute before-inset-y-0 before-left-4.5 before-w0.5 before-rd-lg before-bg-bg-muted before-content-empty">
            @foreach ($items as $item)
                <li>
                    <a data-state="{{ $item['isActive'] ? 'active' : 'inactive' }}"
                        href="{{ $item['href'] ?? '#' }}"
                        class="flex fx-active-relative items-center text-sm gap-2.5 px3 py1.5 text-fg-muted hover-bg-bg-surface hover-text-fg-subtitle fx-active-bg-white dark-fx-active-bg-bg-surface b b-transparent fx-active-b-gray200 dark-fx-active-b-gray800/50 fx-active-shadow-sm rd-lg nav-sub-item-ind">
                        <span class="ml-7">
                            {{ $item['name'] }}
                        </span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
