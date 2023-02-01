<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aroma магазин - @yield('title')</title>
    <link rel="icon" href="<?=asset('img/Fevicon.png')?>" type="image/png">
    <link rel="stylesheet" href="<?=asset('vendors/bootstrap/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?=asset('vendors/fontawesome/css/all.min.css');?>">
    <link rel="stylesheet" href="<?=asset('vendors/themify-icons/themify-icons.css');?>">
    <link rel="stylesheet" href="<?=asset('vendors/linericon/style.css');?>">
    <link rel="stylesheet" href="<?=asset('vendors/nice-select/nice-select.css');?>">
    <link rel="stylesheet" href="<?=asset('vendors/owl-carousel/owl.theme.default.min.css');?>">
    <link rel="stylesheet" href="<?=asset('vendors/owl-carousel/owl.carousel.min.css');?>">

    <link rel="stylesheet" href="<?=asset('css/style.css');?>">
</head>
<body>
<!--================ Start Header Menu Area =================-->
<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand logo_h" href="{{ route('index') }}"><img src="<?=asset('img/logo.png');?>" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
                        <li class="nav-item @routeactive('index')" ><a class="nav-link" href="{{ route('index') }}">Главная</a></li>
                        <li  class="nav-item  submenu dropdown @routeactive('cart*')" >
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                               aria-expanded="false">Корзина</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="{{ route('cart-checkout') }}">Касса</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('cart') }}">Корзина</a></li>
                            </ul>
                        </li>
                        <li class="nav-item submenu dropdown @routeactive('blogs*')" >
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                               aria-expanded="false">Блоги</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="{{ route('blogs') }}">Блоги</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('blogs-news') }}">Новости</a></li>
                            </ul>
                        </li>
                        <li class="nav-item submenu dropdown" >
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                               aria-expanded="false">Информация</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Авторизация</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Регистрация</a></li>
                            </ul>
                        </li>
                        <li class="nav-item @routeactive('contact')" ><a class="nav-link" href="{{ route('contact') }}">Контакты</a></li>
                    </ul>

                    <ul class="nav-shop">
                        <li class="nav-item"><button><i class="ti-search"></i></button></li>
                        <li class="nav-item"><button><i class="ti-shopping-cart"></i><span class="nav-shop__circle">3</span></button> </li>
                        <li class="nav-item"><a class="button button-header" href="#">Купить сейчас</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<!--================ End Header Menu Area =================-->

<!-- ================ start banner area ================= -->
<section class="blog-banner-area" id="blog">
    <div class="container h-100">
        <div class="blog-banner">
            <div class="text-center">
                <h1>@yield('title')</h1>
                <nav aria-label="breadcrumb" class="banner-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Главная</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Данная страница</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- ================ end banner area ================= -->


<!--================Single Product Area =================-->
<div class="product_image_area">
    @if(session()->has('success'))
        <p class="alert alert-success">{{ session()->get('success') }}</p>
    @endif
    @if(session()->has('warning'))
        <p class="alert alert-warning">{{ session()->get('warning') }}</p>
    @endif

    @yield('content')
</div>
<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->

<!--================End Product Description Area =================-->

<!--================ Start related Product area =================-->

<!--================ end related Product area =================-->

<!--================ Start footer Area  =================-->
<footer>
    <div class="footer-area footer-only">
        <div class="container">
            <div class="row section_gap">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget tp_widgets ">
                        <h4 class="footer_title large_title">Наша цель</h4>
                        <p>
                            Итак, мы хотим сделать доступными для продажи в интернете экслюзивные товары, которые могут быть интересны
                            пользователям. Для этого необходимо просто собрать себе корзину и осуществить покупку
                        </p>
                        <p>
                            Все товары с гарантией, и подлежат возврату в случае их некачественности и порче.
                        </p>
                    </div>
                </div>
                <div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget tp_widgets">
                        <h4 class="footer_title">Быстрые ссылки</h4>
                        <ul class="list">
                            <li><a href="{{ route('index') }}">Главная</a></li>
                            <li><a href="#">Блог</a></li>
                            <li><a href="{{ route('product', 'null') }}">Товар</a></li>
                            <li><a href="{{ route('cart') }}">Корзина</a></li>
                            <li><a href="{{ route('contact') }}">Контакты</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget instafeed">
                        <h4 class="footer_title">Галерея</h4>
                        <ul class="list instafeed d-flex flex-wrap">
                            <li><img src="<?=asset('img/gallery/r1.jpg');?>" alt=""></li>
                            <li><img src="<?=asset('img/gallery/r2.jpg');?>" alt=""></li>
                            <li><img src="<?=asset('img/gallery/r3.jpg');?>" alt=""></li>
                            <li><img src="<?=asset('img/gallery/r5.jpg');?>" alt=""></li>
                            <li><img src="<?=asset('img/gallery/r7.jpg');?>" alt=""></li>
                            <li><img src="<?=asset('img/gallery/r8.jpg');?>" alt=""></li>
                        </ul>
                    </div>
                </div>
                <div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget tp_widgets">
                        <h4 class="footer_title">Связь с нами</h4>
                        <div class="ml-40">
                            <p class="sm-head">
                                <span class="fa fa-location-arrow"></span>
                                Головной офис
                            </p>
                            <p>Россия, г.Кемерово, ул.Островского 8</p>

                            <p class="sm-head">
                                <span class="fa fa-phone"></span>
                                Телефон
                            </p>
                            <p>
                                +7913-134-09-42 <br>
                                +123 456 7890
                            </p>

                            <p class="sm-head">
                                <span class="fa fa-envelope"></span>
                                Почта
                            </p>
                            <p>
                                integralal@mail.ru <br>
                                www.thesolarwind.ru
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row d-flex">
                <p class="col-lg-12 footer-text text-center">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
        </div>
    </div>
</footer>
<!--================ End footer Area  =================-->



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
