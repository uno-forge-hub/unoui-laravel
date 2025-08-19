
<div x-data="setupEditor(
    $wire.entangle('{{ $attributes->wire('model')->value() }}')
)" x-init="() => init($refs.editor)" wire:ignore {{ $attributes->whereDoesntStartWith('wire:model') }} class="bg-white border border-gray-200 rounded-lg overflow-hidden">
        <div
            class="sticky top-0 bg-white flex align-middle gap-x-0.5 border-b border-gray-200 p-2 dark:bg-neutral-900 dark:border-neutral-700">
            <button
                class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                type="button" @click="toggleBold();">
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M14 12a4 4 0 0 0 0-8H6v8"></path>
                    <path d="M15 20a4 4 0 0 0 0-8H6v8Z"></path>
                </svg>
            </button>
            <button @click="toggleItalic();"
                class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                type="button" >
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <line x1="19" x2="10" y1="4" y2="4"></line>
                    <line x1="14" x2="5" y1="20" y2="20"></line>
                    <line x1="15" x2="9" y1="4" y2="20"></line>
                </svg>
            </button>
            <button
                class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                type="button" @click="toggleUnderline();">
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M6 4v6a6 6 0 0 0 12 0V4"></path>
                    <line x1="4" x2="20" y1="20" y2="20"></line>
                </svg>
            </button>
            <button
                class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                type="button" @click="toggleOrderedList();">
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <line x1="10" x2="21" y1="6" y2="6"></line>
                    <line x1="10" x2="21" y1="12" y2="12"></line>
                    <line x1="10" x2="21" y1="18" y2="18"></line>
                    <path d="M4 6h1v4"></path>
                    <path d="M4 10h2"></path>
                    <path d="M6 18H4c0-1 2-2 2-3s-1-1.5-2-1"></path>
                </svg>
            </button>
            <button
                class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                type="button" @click="toggleBulletList()">
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <line x1="8" x2="21" y1="6" y2="6"></line>
                    <line x1="8" x2="21" y1="12" y2="12"></line>
                    <line x1="8" x2="21" y1="18" y2="18"></line>
                    <line x1="3" x2="3.01" y1="6" y2="6"></line>
                    <line x1="3" x2="3.01" y1="12" y2="12"></line>
                    <line x1="3" x2="3.01" y1="18" y2="18"></line>
                </svg>
            </button>
        </div>
        <div class="h-40 min-h-40 w-full overflow-auto flex markdow-content-block" x-ref="editor"></div>
</div>