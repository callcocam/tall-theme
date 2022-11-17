{{--
-- Important note:
--
-- This template is based on an example from Tailwind UI, and is used here with permission from Tailwind Labs
-- for educational purposes only. Please do not use this template in your own projects without purchasing a
-- Tailwind UI license, or they’ll have to tighten up the licensing and you’ll ruin the fun for everyone.
--
-- Purchase here: https://tailwindui.com/
--}}
@props(['label' => null])
<label {{ $attributes->merge(['class' => 'block']) }}>
    @if ($label)
        <span>{{ __($label) }}:</span>
    @endif
    <div class="relative mt-1.5 flex flex-col">
        {{ $slot }}
        @isset($icon)
            {{ $icon }}
        @endisset
    </div>
</label>
