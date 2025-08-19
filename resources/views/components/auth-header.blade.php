@props(['title', 'description'])

<div class="flex w-full flex-col text-center b-b mb5 pb4">
    <div class="size-12 mxa mb3 d-flex-place-center bg-gradient-to-br from-primary from-55% to-secondary rd-lg flex">
        <svg width="700" height="700" class="size-10" viewBox="0 0 700 700" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_13_163)">
                <path
                    d="M177.534 177L522.602 522.068C427.314 617.356 272.822 617.356 177.534 522.068C82.2463 426.78 82.2463 272.288 177.534 177Z"
                    fill="currentColor" class="text-white" />
                <path
                    d="M589.659 355.5C589.659 380.629 542.788 450.5 517.659 450.5C492.53 450.5 498.659 380.629 498.659 355.5C498.659 330.371 519.03 310 544.159 310C569.288 310 589.659 330.371 589.659 355.5Z"
                    fill="currentColor" class="text-white"/>
                <circle cx="349.429" cy="349.759" r="110" transform="rotate(48.3973 349.429 349.759)"
                    fill="currentColor" stroke="white" class="text-white stroke-primary" stroke-width="80" />
                <path
                    d="M415 177C415 202.129 318.629 207 293.5 207C268.371 207 248 186.629 248 161.5C248 136.371 268.371 116 293.5 116C318.629 116 415 151.871 415 177Z"
                    fill="currentColor" class="text-white" />
                <path
                    d="M523 207.5C523 232.629 521.129 321.5 496 321.5C470.871 321.5 432 232.629 432 207.5C432 182.371 452.371 162 477.5 162C502.629 162 523 182.371 523 207.5Z"
                    fill="currentColor" class="text-white" />
            </g>
            <defs>
                <clipPath id="clip0_13_163">
                    <rect width="488" height="488" fill="white" transform="translate(106 106)" />
                </clipPath>
            </defs>
        </svg>
    </div>
    <h1 class="font-semibold text-fg-title text-lg">{{ $title }}</h1>
    <p class="text-sm text-fg-muted">{{ $description }}</p>
</div>
