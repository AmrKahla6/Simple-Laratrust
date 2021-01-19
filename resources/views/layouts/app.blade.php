<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- ionicons -->
    <link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">
    <!-- skin-blue -->
    {{-- <link rel="stylesheet" href="{{asset('css/skin-blue.min.css')}}"> --}}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" href="{{asset('css/fontawesome.min.css')}}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
       <!-- jQuery 2.1.4 -->
   <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>

    <!-- iCheck -->
    <script src="{{asset('css/all.css')}}"></script>

    <!-- ckeditor -->
    <script src="{{asset('js/ckeditor.js')}}"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('dashboard')}}">dashboard</a>
                        </li>

                        <!-- Check if this user has permission to read user or no -->
                        @if(auth()->user()->hasPermission('users-read'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('index_user')}}">Users</a>
                            </li>
                        @endif

                        <!-- Check if this user has permission to read categories or no -->
                        @if(auth()->user()->hasPermission('categories-read'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('category.index')}}">Categories</a>
                            </li>
                        @endif


                        <!-- Check if this user has permission to read products or no -->
                        @if(auth()->user()->hasPermission('products-read'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('product.index')}}">Products </a>
                            </li>
                        @endif

                         <!-- Check if this user has permission to read clients or no -->
                        @if(auth()->user()->hasPermission('clients-read'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('client.index')}}">Clients</a>
                            </li>
                        @endif

                         <!-- Check if this user has permission to read orders or no -->
                        @if(auth()->user()->hasPermission('orders-read'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('client.index')}}">Orders</a>
                            </li>
                        @endif

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<footer>
    <!-- REQUIRED JS SCRIPTS -->

        <!-- Bootstrap 3.3.4 -->
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('js/app.min.js')}}"></script>

        <!-- jquery number -->
        <script src="{{asset('js/jquery.number.min.js')}}"></script>

        <!-- jquery number -->
        <script src="{{asset('js/printThis.js')}}"></script>

        <!-- morris.. -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="{{asset('js/morris.min.js')}}"></script>
</footer>
</html>
