<!DOCTYPE html>
<html lang="en">

<head>
    @include('clients.modules.css')
    @yield('head')
    @yield('schema')
    <title>@yield('title')</title>
</head>

<body>
    <div class="shop__haiphonglife">
        @include('clients.templates.header')

        @yield('content')

        @include('clients.templates.footer')
    </div>
    @include('clients.modules.js')
    @yield('foot')
</body>

</html>
