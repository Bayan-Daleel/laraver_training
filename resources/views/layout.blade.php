<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{--    <script src="/app.js"></script>--}}
    <link rel="stylesheet" href="/app.css">
    <link rel="stylesheet" href="/another.css">
</head>
<body>

    <header>
        @yield('my-header')
    </header>
    @yield('content')


</body>
</html>