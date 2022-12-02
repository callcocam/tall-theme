@if ($permission)
    <a href="{{ $route }}"
        class="{{ $classe }} {{ $routePrefix ? $active : $deactive }}"
        x-tooltip.placement.right="'{{ data_get($menu, 'name') }}'">
        <x-tall-icon name="{{ $icone }}" class="h-7 w-7" />
    </a>
@endif
