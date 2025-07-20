<x-header></x-header>
{{ $slot }}
@if (Route::currentRouteName() === 'Login' || Route::currentRouteName() === 'Register')
@else
    <x-footer></x-footer>
@endif
