<script>
    window.onload = function() {

    }
</script>
@if (filled(config('theme.plugins.flat_piker.js')))
    <script src="{{ config('theme.plugins.flat_piker.js') }}"></script>
@endif
@if (filled(config('theme.plugins.flat_piker.tall')))
    <script src="{{ config('theme.plugins.flat_piker.tall') }}"></script>
@endif
@if (filled(config('theme.plugins.flat_piker.translate')))
    <script src="{{ config('theme.plugins.flat_piker.translate') }}"></script>
@endif
<!-- Scripts -->
<script src="{{ asset(config('theme.plugins.app_js')) }}" defer></script>
@if ($scripts = config('theme.plugins.scripts'))
    @foreach ($scripts as $script)
        @if (\Str::contains($script, 'http')) 
            <script src="{{ $script }}"></script>
        @else
            <script src="{{ asset($script) }}"></script>
        @endif
    @endforeach
@endif
@livewireScripts
