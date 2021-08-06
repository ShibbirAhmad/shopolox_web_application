<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="keywords" content="ecommerce,online retail shop,online shop in Bangladesh">
    <meta name="description" content="online retail shop,online shop in Bangladesh">
    <title>
        shopolox || @yield('title') 
    </title>
    @include('frontend.inc.css')
    @stack('extra_css')
</head>

<body>
    @include('frontend.inc.header')
    

        @yield('content')
    

    @include('frontend.inc.footer')
    
    @include('frontend.inc.js')
    @stack('extra_js')
</body>

</html>
