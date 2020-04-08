<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=VT323&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap&subset=cyrillic"
          rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div id="navbarContainer" class="container">
            <a class="navbar-brand" href="{{ route('home') }}" style="font-family: VT323; font-size: 40px;">PCShop</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04"
                    aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample04">
                <ul class="navbar-nav mr-auto">
                    @if (Auth::check())
                        @if (Auth::user()->role->name !== 'client')
                            <li class="nav-item nav-item-header">
                                <a class="nav-link" href="{{ route('admin.panel') }}">Admin panel</a>
                            </li>
                        @endif
                        <li class="nav-item nav-item-header">
                            <a class="nav-link" href="{{ route('dashboard-me') }}">Account</a>
                        </li>
                        <li class="nav-item nav-item-header">
                            <a class="nav-link"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @else
                        <li class="nav-item nav-item-header">
                            <a class="nav-link" href="/login">Login</a>
                        </li>
                        <li class="nav-item nav-item-header">
                            <a class="nav-link" href="/register">Register</a>
                        </li>
                    @endif
                    <li class="nav-item nav-item-header">
                        <a class="nav-link" href="{{ route('about_us') }}">
                            About Us
                        </a>
                    </li>
                    <li class="nav-item nav-item-header">
                        <a class="nav-link" href="{{ route('delivery_and_payments') }}">
                            Deliveries and Payments
                        </a>
                    </li>
                    <li class="nav-item nav-item-header">
                        <a class="nav-link" href="{{ route('contacts') }}">
                            Contacts
                        </a>
                    </li>
                    <li class="nav-item nav-item-header">
                        <a class="nav-link" href="{{ route('make_order_form') }}">
                            <img src="{{ asset('images/shopping-cart.png') }}" alt="cart">
                        </a>
                        @if (Auth::check())
                            <span id="cartCount">{{ count(Cache::get('user_cart_' . Auth::user()->id) ?? []) }}</span>
                        @endif
                    </li>
                </ul>
                <form class="form-inline my-2 my-md-0" action="{{ route('home') }}" method="GET">
                    <input class="form-control" name="search" type="text" placeholder="Search">
                </form>
            </div>
        </div>
    </nav>
</header>


<main class="main">
    @yield('content')
</main>

<footer class="footer">
    <div class="container-menu">
        <div class="site-logo">
            <p>pcshop</p>
        </div>
        <div>
            <a href="mailto:Pcshopinfo7@gmail.com">Write to us</a>
        </div>
    </div>
</footer>

</body>
</html>
