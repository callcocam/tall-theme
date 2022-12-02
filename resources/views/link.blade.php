@if(Route::has($route))
<a href="{{ route($route, compact('model','key')) }}">{{ $value }}</a>
@endif