<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if( config('settings.site_favicon') )
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/'.config('settings.site_favicon')) }}" />
    @endif
    <title>@yield('title') - {{ config('app.name') }}</title>
    @include('site.partials.styles')
</head>
<body>
@include('site.partials.header')
@yield('content')
@include('site.partials.footer')
@include('site.partials.scripts')
</body>
</html>
