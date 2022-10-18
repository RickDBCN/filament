@captureSlots([
    'detail',
])

<x-filament-support::dropdown.header
    :attributes="\Filament\Support\prepare_inherited_attributes($attributes)->merge($slots)"
    :dark-mode="config('filament-actions.dark_mode')"
>
    {{ $slot }}
</x-filament-support::dropdown.header>