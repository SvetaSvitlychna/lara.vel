<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Site - @yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @yield('styles')
</head>

<body class="bg-light-gray flex flex-col h-screen lato">

    @yield('page')

    <script scr="{{asset('js/app.js')}}"></script>
    @stack('script')
 
</body>

</html>
