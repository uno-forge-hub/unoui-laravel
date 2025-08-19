@props([
    'variant' => 'solid',
    'intent' => 'primary',
    'size' => 'md',
    'disabled' => false,
    'type' => 'button',
    'radius' => 'rd-lg',
    'href' => null,
])

@php
    $variants = [
        'solid' => [
            'base' => 'btn-solid',
            'intents' => [
                'primary' => 'btn-solid-primary text-white',
                'secondary' => 'btn-solid-secondary text-white',
                'accent' => 'btn-solid-accent text-white',
                'success' => 'btn-solid-success text-white',
                'danger' => 'btn-solid-danger text-white',
                'warning' => 'btn-solid-warning text-white',
                'neutral'=>'btn-solid-neutral text-bg'
            ],
        ],
        'soft' => [
            'base' => 'btn-soft',
            'intents' => [
                'primary' => 'btn-soft-primary',
                'secondary' => 'btn-soft-secondary',
                'accent' => 'btn-soft-accent',
                'danger' => 'btn-soft-danger',
                'success' => 'btn-soft-success',
                'gray' => 'btn-soft-gray',
            ],
        ],
        'outline' => [
            'base' => 'btn-outline',
            'intents' => [
                'primary' => 'btn-outline-primary',
                'secondary' => 'btn-outline-secondary',
                'accent' => 'btn-outline-accent',
                'danger' => 'btn-outline-danger',
                'success' => 'btn-outline-success',
                'gray' => 'btn-outline-gray',
            ],
        ],
        'none' => [
        ],
    ];

    $sizes = [
        'xs' => 'btn-xs',
        'sm' => 'btn-sm',
        'md' => 'btn-md',
        'lg' => 'btn-lg',
        'xl' => 'btn-xl',
        'icon-sm' => 'btn-icon-sm',
        'icon-md' => 'btn-icon-md',
        'icon-lg' => 'btn-icon-lg',
        'none'=>''
    ];
    $baseClasses = 'btn ease-linear duration-200 ';
    if ($variant !== 'none') {
        $baseClasses .= isset($variants[$variant]) ? $variants[$variant]['base'] : 'ee';
    }

    $variantClasses = '';
    if ($variant !== 'none') {
        if (isset($variants[$variant]) && isset($variants[$variant]['intents'][$intent])) {
            $variantClasses = $variants[$variant]['intents'][$intent];
        } elseif (isset($variants['solid']['intents'][$intent])) {
            $variantClasses = $variants['solid']['intents'][$intent];
        }
    }
    
    $sizeClasses = isset($sizes[$size]) ? $sizes[$size] : $sizes['md'];

    $tag = $href ? 'a' : 'button';

    $attributes = $attributes->class([
        $baseClasses,
        $variantClasses,
        $sizeClasses,
        $radius,
        'cursor-not-allowed' => $disabled,
    ]);

    $attributes =
        $tag === 'button'
            ? ($attributes = $attributes->merge([
                'type' => $type,
                'disabled' => $disabled,
            ]))
            : $attributes->merge([
                'href' => $disabled ? null : $href,
                'aria-disabled' => $disabled ? 'true' : null,
                'tabindex' => $disabled ? '-1' : null,
            ]);


@endphp

<{{ $tag }} {{ $attributes }}>
    {{ $slot }}
</{{ $tag }}>
