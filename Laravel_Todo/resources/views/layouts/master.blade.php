<!-- resources/views/layouts/master.blade.php-->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
</head>
<body>
<div>
    @include('layouts.header')
</div>
<div>
    @yield('content')
</div>
<div>
    @include('layouts.footer')
</div>
</body>
</html>