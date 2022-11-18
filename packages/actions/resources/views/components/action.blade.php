@props([
    'action',
    'component',
    'icon' => null,
])

@php
    $isDisabled = $action->isDisabled();
    $url = $action->getUrl();
@endphp

<x-dynamic-component
    :component="$component"
    :form="$action->getFormToSubmit()"
    :tag="$url ? 'a' : 'button'"
    :x-on:click="$action->getAlpineMountAction()"
    :wire:click="$action->getLivewireMountAction()"
    :href="$isDisabled ? null : $url"
    :target="($url && $action->shouldOpenUrlInNewTab()) ? '_blank' : null"
    :type="$action->canSubmitForm() ? 'submit' : 'button'"
    :color="$action->getColor()"
    :key-bindings="$action->getKeybindings()"
    :tooltip="$action->getTooltip()"
    :disabled="$isDisabled"
    :icon="$icon ?? $action->getIcon()"
    :size="$action->getSize()"
    :label-sr-only="$action->isLabelHidden()"
    dusk="filament.actions.action.{{ $action->getName() }}"
    :attributes="\Filament\Support\prepare_inherited_attributes($attributes)->merge($action->getExtraAttributes(), escape: false)"
>
    {{ $slot }}
</x-dynamic-component>
