@if ($permission)
    <a href="{{ route(data_get($menu, 'link')) }}"
        class="{{ $classe }} {{ $routePrefix ? $active : $deactive }}"
        x-tooltip.placement.right="'{{ data_get($menu, 'name') }}'">
        <x-tall-icon name="{{ data_get($menu, 'icone') }}" class="h-7 w-7" />
    </a>
@endif
