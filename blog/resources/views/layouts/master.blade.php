<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title' , config('app.name'))</title>
</head>
<body>

{{-- Şablon Yapısı--}}


@include('layouts.partials.navbar')
@yield('content')
@include('layouts.partials.footer' , ['yil'=> 2018])  {{--Burada Yıl parametresini yazarak footer sayfasına değişken yolladık--}}



</body>
</html>