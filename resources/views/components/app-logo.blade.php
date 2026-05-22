@props([
    'sidebar' => false,
])

@if ($sidebar)
    <flux:sidebar.brand name="Laravel Starter Kit" {{ $attributes }}>
        <x-slot name="logo"
            class="flex aspect-square size-8 items-center justify-center rounded-md dark:bg-accent-content text-accent-foreground">
            <img src="{{ asset('favicon_simple.png?v=2') }}" alt="Logo"
                class="size-8 fill-current text-white dark:text-black " />
        </x-slot>
    </flux:sidebar.brand>
@else
    <flux:brand name="Laravel Starter Kit" {{ $attributes }}>
        <x-slot name="logo"
            class="flex aspect-square size-8 items-center justify-center rounded-md bg-accent-content text-accent-foreground">
            <img src="{{ asset('favicon_simple.png?v=2') }}" alt="Logo"
                class="size-8 fill-current text-white dark:text-black" />
        </x-slot>
    </flux:brand>
@endif
