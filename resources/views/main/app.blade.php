<!DOCTYPE html>
<html lang="en">

<head>
    @include('main.partials.head')
</head>

<body>
    @include('main.partials.header')

    @yield('main.panel')

    @include('main.partials.script')
</body>

</html>
