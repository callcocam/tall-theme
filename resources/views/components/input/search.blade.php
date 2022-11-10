{{--
-- Important note:
--
-- This template is based on an example from Tailwind UI, and is used here with permission from Tailwind Labs
-- for educational purposes only. Please do not use this template in your own projects without purchasing a
-- Tailwind UI license, or they’ll have to tighten up the licensing and you’ll ruin the fun for everyone.
--
-- Purchase here: https://tailwindui.com/
--}}
<div class="flex items-center" x-data="{ isInputActive: false }">
    <x-tall-input.label>
        <input x-effect="isInputActive === true && $nextTick(() => { $el.focus()});"
            {{ $attributes->class('form-input rounded-full w-32 lg:w-48 border-0 bg-transparent px-3 focus:outline-none text-right transition-all duration-100 placeholder:text-slate-500 dark:placeholder:text-navy-200') }} />
    </x-tall-input.label>
    <x-tall-button.flat x-on:click="isInputActive = !isInputActive">
        <x-tall-icon name="search" />
    </x-tall-button.flat>
</div>
