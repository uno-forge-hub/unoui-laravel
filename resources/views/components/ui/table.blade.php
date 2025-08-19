<div {{ $attributes->merge(['class'=>"relative overflow-x-auto rd-md w-full"]) }}>
    <table class="w-full text-fg text-left">
        {{ $slot }}
    </table>
</div>