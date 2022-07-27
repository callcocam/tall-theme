<!-- Fonts -->
@if ($fonts = config('theme.plugins.fonts'))
    @foreach ($fonts as $font)
        <link href="{{ $font }}" rel="stylesheet">
    @endforeach
@endif

<script src="{{ config('theme.plugins.universalsmoothscroll') }}">
</script>
<!-- Styles -->
<link rel="stylesheet" href="{{ mix(config('theme.plugins.app_css')) }}">
@livewireStyles
@wireUiScripts
<link rel="stylesheet" href="{{ config('theme.plugins.flat_piker.css') }}">
@if ($styles = config('theme.plugins.styles'))
    @foreach ($styles as $style)
        @if (\Str::contains($style, 'http'))
            <link href="{{ $style }}" rel="stylesheet">
        @else
            <link href="{{ asset($style) }}" rel="stylesheet">
        @endif
    @endforeach
@endif
@stack("styles")