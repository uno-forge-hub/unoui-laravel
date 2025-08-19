@props(['title', 'description', 'icon'])
<div {{ $attributes->merge(['class' => 'wfull flex flex-col sm-flex-row sm-justify-between sm-items-center pb4 b-b b-border']) }}>
    <div class="flex items-center gap4">
        <span class="size-10 d-flex-place-center ui-subtle ui-subtle-gray rd-full">
            <span class="flex {{ $icon }}"></span>
        </span>
        <div class="">
            <h2 class="block text-fg-title font-medium">
                {{ $title }}
            </h2>
            <p class="text-fg text-sm font-normal">
                {{ $description }}
            </p>
        </div>
    </div>
    <div class="flex">
        {{ $slot }}
    </div>
</div>
