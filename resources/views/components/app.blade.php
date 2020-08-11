<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="border-bottom py-3 mb-4">
        @php
            $totalItemInCart = session('cart', collect([]))->count();
        @endphp

        <a href="{{route('home')}}">Home</a>&nbsp;|&nbsp;

        @if($totalItemInCart > 0)
            <a href="{{route('cart.index')}}">
                Cart ({{$totalItemInCart}})
            </a>
        @else
            Cart ({{$totalItemInCart}})
        @endif
    </div>
    <x-alert></x-alert>
    {{$slot}}
</div>
</body>
</html>
