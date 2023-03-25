<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>    
    @vite(['resources/css/app.css','resources/js/app.js'])
    @livewireStyles
</head>
<body>
    @include('includes.navbar')
    @yield('content')
    @livewireScripts
</body>
</html> 