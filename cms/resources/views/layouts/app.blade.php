<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Админка сайта') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="icon" href="<?=asset('img/Fevicon.png')?>" type="image/png">
    <link rel="stylesheet" href="<?=asset('vendors/bootstrap/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?=asset('vendors/fontawesome/css/all.min.css');?>">
    <link rel="stylesheet" href="<?=asset('vendors/themify-icons/themify-icons.css');?>">
    <link rel="stylesheet" href="<?=asset('vendors/linericon/style.css');?>">
    <link rel="stylesheet" href="<?=asset('vendors/nice-select/nice-select.css');?>">
    <link rel="stylesheet" href="<?=asset('vendors/owl-carousel/owl.theme.default.min.css');?>">
    <link rel="stylesheet" href="<?=asset('vendors/owl-carousel/owl.carousel.min.css');?>">

    <link rel="stylesheet" href="<?=asset('css/style.css');?>">
    <!-- Scripts
    @_v_i_t_e(['resources/sass/app.scss', 'resources/js/app.js'])
    -->
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('dashboard') }}">Страница пользователя</a>
                        </li>

                    <!--</ul>

                    <!-- Right Side Of Navbar -->
                    <!--<ul class="navbar-nav ms-auto">-->
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Вход</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
                                </li>
                            @endif
                        @else
                            @admin
                             <li class="nav-item">
                                <a class="nav-link" href="{{ route('orders') }}">Заказы</a>
                             </li>

                             <li class="nav-item">
                                <a class="nav-link" href="{{ route('categories.index') }}">Категории</a>
                             </li>
                             <li class="nav-item">
                                <a class="nav-link" href="{{ route('products.index') }}">Товары</a>
                             </li>
                             @else
                              <li class="nav-item">
                               <a class="nav-link" href="{{ route('person.orders.index') }}">Заказы мои</a>
                              </li>
                              @endadmin

                            <li class="nav-item dropdown">
                                <div class="dropdown-menu_ dropdown-menu-end_" aria-labelledby="navbarDropdown">

                                <!--<a id="navbarDropdown" class="nav-link dropdown-toggle_" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                </a>-->


                                    <!--<a class="dropdown-item_" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        () Выход
                                    </a>-->

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none_">
                                        <button type="submit">{{ Auth::user()->name }} ВЫХОД</button>
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 container">
            <div class="product_image_area">
                @if(session()->has('success'))
                    <p class="alert alert-success">{{ session()->get('success') }}</p>
                @endif
                @if(session()->has('warning'))
                    <p class="alert alert-warning">{{ session()->get('warning') }}</p>
                @endif
            </div>

            @yield('content')
        </main>
    </div>
    <script src="<?=asset('vendors/jquery/jquery-3.2.1.min.js');?>"></script>
    <script src="<?=asset('vendors/bootstrap/bootstrap.bundle.min.js');?>"></script>
    <script src="<?=asset('vendors/skrollr.min.js');?>"></script>
    <script src="<?=asset('vendors/owl-carousel/owl.carousel.min.js');?>"></script>
    <script src="<?=asset('vendors/nice-select/jquery.nice-select.min.js');?>"></script>
    <script src="<?=asset('vendors/jquery.ajaxchimp.min.js');?>"></script>
    <script src="<?=asset('vendors/mail-script.js');?>"></script>
    <script src="<?=asset('js/main.js');?>"></script>

</body>
</html>
