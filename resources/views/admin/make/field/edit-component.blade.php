<table x-data="{ expanded: false }" class="w-full text-left draggable" data-id="{{ $model->id }}">
    <tbody>
        <tr class="border-y border-transparent">
            <td class="whitespace-nowrap px-1 py-0 sm:px-5">
                @if ($field = form('column_name', $fields))
                    <x-dynamic-component component="tall-{{ $field->component }}" :field="$field" />
                    {{-- <x-tall-input-error :for="$field->key" /> --}}
                @endif
            </td>
            <td class="whitespace-nowrap px-1 py-0 sm:px-5">
                @if ($field = form('column_type', $fields))
                    <x-dynamic-component component="tall-{{ $field->component }}" :field="$field" />
                    {{-- <x-tall-input-error :for="$field->key" /> --}}
                @endif
            </td>
            <td class="whitespace-nowrap px-4 py-1 sm:px-5">
                @if ($field = form('column_with', $fields))
                    <x-dynamic-component component="tall-{{ $field->component }}" :field="$field" />
                    {{-- <x-tall-input-error :for="$field->key" /> --}}
                @endif
            </td>
            <td class="whitespace-nowrap px-1 py-0 font-medium text-slate-700 dark:text-navy-100 sm:px-5">
                @if ($field = form('column_nullable', $fields))
                    <x-dynamic-component component="tall-{{ $field->component }}" :field="$field" />
                    {{-- <x-tall-input-error :for="$field->key" /> --}}
                @endif
            </td>
            <td class="whitespace-nowrap px-1 py-0 font-medium text-slate-700 dark:text-navy-100 sm:px-5">
                @if ($field = form('column_primary', $fields))
                    <x-dynamic-component component="tall-{{ $field->component }}" :field="$field" />
                    {{-- <x-tall-input-error :for="$field->key" /> --}}
                @endif
            </td>
            <td class="whitespace-nowrap px-1 py-0 font-medium text-slate-700 dark:text-navy-100 sm:px-5">
                @if ($field = form('column_index', $fields))
                    <x-dynamic-component component="tall-{{ $field->component }}" :field="$field" />
                    {{-- <x-tall-input-error :for="$field->key" /> --}}
                @endif
            </td>
            <td class="whitespace-nowrap px-1 py-0 font-medium text-slate-700 dark:text-navy-100 sm:px-5">
                @if ($field = form('column_unique', $fields))
                    <x-dynamic-component component="tall-{{ $field->component }}" :field="$field" />
                    {{-- <x-tall-input-error :for="$field->key" /> --}}
                @endif
            </td>
            <td class="whitespace-nowrap px-1 py-0 sm:px-5">
                @if ($field = form('column_default', $fields))
                    <x-dynamic-component component="tall-{{ $field->component }}" :field="$field" />
                    {{-- <x-tall-input-error :for="$field->key" /> --}}
                @endif
            </td>
            <td class="whitespace-nowrap px-1 py-0 sm:px-5 draggable-handler text-center">
                @if ($field = form('ordering', $fields))
                    <x-tall-icon name="arrows-expand" />
                @endif
            </td>
            <td class="whitespace-nowrap px-1 py-0 sm:px-5">
                <button type="button" wire:click='saveAndStay'
                    class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <x-tall-icon name="pencil" />
                </button>
                <button type="button" wire:click='delete'
                    class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <x-tall-icon name="trash" />
                </button>
                <button type="button" @click="expanded = !expanded"
                    class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                    <i :class="expanded && '-rotate-180'" class="fas fa-chevron-down text-sm transition-transform"></i>
                </button>
            </td>
        </tr>
    </tbody>
    <tfoot x-show="expanded">
        <tr>
            <td colspan="100">
                @livewire('tall::admin.make.field.attributes.create-component', compact('model'), key(sprintf('create-make-field-attributes-%s', $model->id)))
            </td>
        </tr>
    </tfoot>
</table>
