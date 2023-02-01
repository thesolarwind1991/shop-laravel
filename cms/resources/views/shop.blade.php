@extends('layouts.master')

@section('title')Главная страница@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="sidebar-categories">
                    <div class="head">Категории</div>
                    <ul class="main-categories">
                        <li class="common-filter">
                            <form action="#">
                                <ul>
                                    @foreach ($categories as $category)
                                        <li class="filter-list">
                                            <!--<input class="pixel-radio" type="radio" id="men" name="brand">-->
                                            <a href="{{ route('category', $category->code) }}"><label>{{ $category->name }}</label></a></li></a></li>
                                    @endforeach
                                </ul>
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="sidebar-filter">
                    <div class="top-filter-head">Фильтры</div>
                    <div class="common-filter">
                        <form method="GET" action="{{route("index")}}">
                            <div class="filters row" style="margin-left: 15px;">
                                <div class="col-sm-6 col-md-3">
                                    <label for="price_from">От
                                        <input type="text" name="price_from" id="price_from" size="6" value="{{ request()->price_from}}">
                                    </label>
                                    <label for="price_to">до
                                        <input type="text" name="price_to" id="price_to" size="6"  value="{{ request()->price_to }}">
                                    </label>
                                </div><br>
                                <div style="clear:both"></div>
                                <div class="col-sm-10 col-md-10">
                                    <label for="hit">
                                        <input type="checkbox" name="hit" id="hit" @if(request()->has('hit')) checked @endif> Хит
                                    </label>
                                </div>
                                <div class="col-sm-10 col-md-10">
                                    <label for="new">
                                        <input type="checkbox" name="new" id="new" @if(request()->has('new')) checked @endif> Новинка
                                    </label>
                                </div>
                                <div class="col-sm-10 col-md-10">
                                    <label for="recommend">
                                        <input type="checkbox" name="recommend" id="recommend" @if(request()->has('recommend')) checked @endif> Рекомендуемые
                                    </label>
                                </div>
                                <div style="clear:both"></div>
                                <div class="col-sm-6 col-md-3 btn-group">
                                    <button type="submit" class="btn btn-primary" style="float:left">Искать</button>
                                    <a href="{{ route("index") }}" class="btn btn-warning">Сброс</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--<div class="common-filter">
                        <div class="head">Color</div>
                        <form action="#">
                            <ul>
                                <li class="filter-list"><input class="pixel-radio" type="radio" id="black" name="color"><label for="black">Black<span>(29)</span></label></li>
                                <li class="filter-list"><input class="pixel-radio" type="radio" id="balckleather" name="color"><label for="balckleather">Black
                                        Leather<span>(29)</span></label></li>
                                <li class="filter-list"><input class="pixel-radio" type="radio" id="blackred" name="color"><label for="blackred">Black
                                        with red<span>(19)</span></label></li>
                                <li class="filter-list"><input class="pixel-radio" type="radio" id="gold" name="color"><label for="gold">Gold<span>(19)</span></label></li>
                                <li class="filter-list"><input class="pixel-radio" type="radio" id="spacegrey" name="color"><label for="spacegrey">Spacegrey<span>(19)</span></label></li>
                            </ul>
                        </form>
                    </div>-->
                    <!--<div class="common-filter">
                        <div class="head">Price</div>
                        <div class="price-range-area">
                            <div id="price-range"></div>
                            <div class="value-wrapper d-flex">
                                <div class="price">Price:</div>
                                <span>$</span>
                                <div id="lower-value"></div>
                                <div class="to">to</div>
                                <span>$</span>
                                <div id="upper-value"></div>
                            </div>
                        </div>
                    </div>-->
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-7">
                <!-- Start Filter Bar -->
                <div class="filter-bar d-flex flex-wrap align-items-center">
                    <div class="sorting">
                        <select>
                            <option value="1">Default sorting</option>
                            <option value="1">Default sorting</option>
                            <option value="1">Default sorting</option>
                        </select>
                    </div>
                    <div class="sorting mr-auto">
                        <select>
                            <option value="1">Show 12</option>
                            <option value="1">Show 12</option>
                            <option value="1">Show 12</option>
                        </select>
                    </div>
                    <div>
                        <div class="input-group filter-bar-search">
                            <input type="text" placeholder="Search">
                            <div class="input-group-append">
                                <button type="button"><i class="ti-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Filter Bar -->
                <!-- Start Best Seller -->
                <section class="lattest-product-area pb-40 category-list">
                    <div class="row">
                        @foreach ($products as $product)
                        <div class="col-md-6 col-lg-4">
                            <div class="card text-center card-product">
                                <div class="labels">
                                    @if($product->isNew())
                                        <span class="badge badge-success">Новинки</span>
                                    @endif

                                    @if($product->isRecommend())
                                        <span class="badge badge-warning">Рекомендуемые</span>
                                    @endif

                                    @if($product->isHit())
                                        <span class="badge badge-danger">Хит</span>
                                    @endif
                                </div>
                                <div class="card-product__img">
                                    <? if (empty($product->image)) {?>
                                        <img class="card-img" src="img/product/product0.jpg" alt="{{$product->name}}">
                                    <? } else {?>
                                        <img class="card-img" src="{{ Storage::url($product->image)}}" alt="{{$product->name}}">
                                    <?}?>
                                    <form action="{{ route('basket-add', $product) }}" method="POST">
                                    <ul class="card-product__imgOverlay">
                                        <!--<li><button><i class="ti-search"></i></button></li>-->
                                            <!--<li><button><i class="ti-heart"></i></button></li>-->
                                        @if ($product->isAvailable())
                                            <li><button type="submit"><i class="ti-shopping-cart"></i></button></li>
                                        @else
                                            <li>Недоступен</li>
                                        @endif
                                    </ul>
                                    @csrf
                                    </form>
                                </div>
                                <div class="card-body">
                                    <p>{{$product->category->name}}</p>
                                    <h4 class="card-product__title"><a href="{{ route('product', $product->id) }}">{{$product->name}}</a></h4>
                                    <p class="card-product__price">{{$product->price}} руб.</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    {{$products->links()}}
                </section>
                <!-- End Best Seller -->
            </div>
        </div>
    </div>
@endsection

<!-- ================ category section end ================= -->

<!-- ================ top product area start ================= -->
@section('top-products')
<section class="related-product-area">
    <div class="container">
        <div class="section-intro pb-60px">
            <p>Popular Item in the market</p>
            <h2>Top <span class="section-intro__style">Product</span></h2>
        </div>
        <div class="row mt-30">
            <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
                <div class="single-search-product-wrapper">
                    <div class="single-search-product d-flex">
                        <a href="#"><img src="img/product/product-sm-1.png" alt=""></a>
                        <div class="desc">
                            <a href="#" class="title">Gray Coffee Cup</a>
                            <div class="price">$170.00</div>
                        </div>
                    </div>
                    <div class="single-search-product d-flex">
                        <a href="#"><img src="img/product/product-sm-2.png" alt=""></a>
                        <div class="desc">
                            <a href="#" class="title">Gray Coffee Cup</a>
                            <div class="price">$170.00</div>
                        </div>
                    </div>
                    <div class="single-search-product d-flex">
                        <a href="#"><img src="img/product/product-sm-3.png" alt=""></a>
                        <div class="desc">
                            <a href="#" class="title">Gray Coffee Cup</a>
                            <div class="price">$170.00</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
                <div class="single-search-product-wrapper">
                    <div class="single-search-product d-flex">
                        <a href="#"><img src="img/product/product-sm-4.png" alt=""></a>
                        <div class="desc">
                            <a href="#" class="title">Gray Coffee Cup</a>
                            <div class="price">$170.00</div>
                        </div>
                    </div>
                    <div class="single-search-product d-flex">
                        <a href="#"><img src="img/product/product-sm-5.png" alt=""></a>
                        <div class="desc">
                            <a href="#" class="title">Gray Coffee Cup</a>
                            <div class="price">$170.00</div>
                        </div>
                    </div>
                    <div class="single-search-product d-flex">
                        <a href="#"><img src="img/product/product-sm-6.png" alt=""></a>
                        <div class="desc">
                            <a href="#" class="title">Gray Coffee Cup</a>
                            <div class="price">$170.00</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
                <div class="single-search-product-wrapper">
                    <div class="single-search-product d-flex">
                        <a href="#"><img src="img/product/product-sm-7.png" alt=""></a>
                        <div class="desc">
                            <a href="#" class="title">Gray Coffee Cup</a>
                            <div class="price">$170.00</div>
                        </div>
                    </div>
                    <div class="single-search-product d-flex">
                        <a href="#"><img src="img/product/product-sm-8.png" alt=""></a>
                        <div class="desc">
                            <a href="#" class="title">Gray Coffee Cup</a>
                            <div class="price">$170.00</div>
                        </div>
                    </div>
                    <div class="single-search-product d-flex">
                        <a href="#"><img src="img/product/product-sm-9.png" alt=""></a>
                        <div class="desc">
                            <a href="#" class="title">Gray Coffee Cup</a>
                            <div class="price">$170.00</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
                <div class="single-search-product-wrapper">
                    <div class="single-search-product d-flex">
                        <a href="#"><img src="img/product/product-sm-1.png" alt=""></a>
                        <div class="desc">
                            <a href="#" class="title">Gray Coffee Cup</a>
                            <div class="price">$170.00</div>
                        </div>
                    </div>
                    <div class="single-search-product d-flex">
                        <a href="#"><img src="img/product/product-sm-2.png" alt=""></a>
                        <div class="desc">
                            <a href="#" class="title">Gray Coffee Cup</a>
                            <div class="price">$170.00</div>
                        </div>
                    </div>
                    <div class="single-search-product d-flex">
                        <a href="#"><img src="img/product/product-sm-3.png" alt=""></a>
                        <div class="desc">
                            <a href="#" class="title">Gray Coffee Cup</a>
                            <div class="price">$170.00</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ================ top product area end ================= -->
@endsection


<!-- ================ Subscribe section start ================= -->
@section('subscribe')
<section class="subscribe-position">
    <div class="container">
        <div class="subscribe text-center">
            <h3 class="subscribe__title">Get Update From Anywhere</h3>
            <p>Bearing Void gathering light light his eavening unto dont afraid</p>
            <div id="mc_embed_signup">
                <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe-form form-inline mt-5 pt-1">
                    <div class="form-group ml-sm-auto">
                        <input class="form-control mb-1" type="email" name="EMAIL" placeholder="Enter your email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '" >
                        <div class="info"></div>
                    </div>
                    <button class="button button-subscribe mr-auto mb-1" type="submit">Subscribe Now</button>
                    <div style="position: absolute; left: -5000px;">
                        <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                    </div>

                </form>
            </div>

        </div>
    </div>
</section>
<!-- ================ Subscribe section end ================= -->
@endsection
