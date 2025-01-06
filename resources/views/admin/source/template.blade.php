<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pettie Dashboard</title>
</head>
<body>
    {{-- navbar --}}
 @include('admin.source.partials.navBar')

 {{-- sidebar --}}

 @include('admin.source.partials.sideBar')

 {{-- content --}}

 @yield('content')

{{-- footer --}}
 @include('admin.source.partials.base')

</body>
</html>