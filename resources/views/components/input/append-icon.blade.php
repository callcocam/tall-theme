@props(['icon' => null])
<div
    class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
    @if ($icon)
        <x-tall-icon name="{{ $icon }}" />
    @else
        {{ $slot }}
    @endif

</div>
