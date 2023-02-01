@extends('layouts.master')

@section('title')Категория <?if(isset($catname->name)) echo $catname->name;?>@endsection

<!-- ================ category section start ================= -->
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
                        @foreach ($catname->products()->with('category')->get() as $product)
                        <div class="col-md-6 col-lg-4">
                            <div class="card text-center card-product">
                                <div class="card-product__img">
                                    <? if (empty($product->image)) {?>
                                    <img class="card-img" src="<?=asset('/img/product/product0.jpg')?>" alt="{{$product->name}}">
                                    <? } else {?>
                                    <img class="card-img" src="<?=Storage::url($product->image)?>" alt="{{$product->name}}">
                                    <?}?>
                                        <form action="{{ route('basket-add', $product) }}" method="POST">
                                            <ul class="card-product__imgOverlay">
                                                <!--<li><button><i class="ti-search"></i></button></li>-->
                                                <li><button type="submit"><i class="ti-shopping-cart"></i></button></li>
                                                <!--<li><button><i class="ti-heart"></i></button></li>-->
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
                </section>
                <!-- End Best Seller -->
            </div>
        </div>
    </div>
@endsection
<!-- ================ category section end ================= -->



