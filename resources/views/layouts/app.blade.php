<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <script src="{{URL::asset('js/modernizr-2.8.3.js')}}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<header>
    <nav class="menu" role="navigation">
        <ul>
            <li><h2><a href="{{route('/')}}">{{__('Ecommerce')}}</a></h2></li>
            <li><a href="{{route('orders.index')}}">{{__('Order List')}}</a></li>
            <li><a href="{{route('categories.index')}}">{{__('Category')}}</a></li>
            <li><a href="{{route('products.index')}}">{{__('Product')}}</a></li>
            <li><a href="{{route('/')}}">{{__('Setting')}}</a></li>
            <li><a href="{{route('/')}}">{{__('User')}}</a></li>
            <li>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
    <a href="#" class="nav-toggle"><span class="fa fa-bars"></span></a>
</header>
<div id="info">
    <main class="py-4">
        @if(Session::has('message'))
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="alert alert-info">{{Session('message')}}</div>
                </div>
            </div>
        @endif
        @if(Session::has('error'))
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="alert alert-danger">{{Session('error')}}</div>
                </div>
            </div>
        @endif
        @yield('content')
    </main>
</div>
</body>
</html>
