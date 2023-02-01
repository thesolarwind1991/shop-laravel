@extends('layouts.master')

@section('title')Корзина@endsection

@section('content')
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <? if (!empty($order)) {?>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Товар</th>
                        <th scope="col">Цена</th>
                        <th scope="col">Количество</th>
                        <th scope="col">Стоимость</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($order->products as $product)
                    <tr>
                        <td>
                            <div class="media">
                                <div class="d-flex">
                                    <!--<img src="img/cart/cart1.png" alt="">-->
                                    <? if (empty($product->image)) {?>
                                    <img class="card-img" style="width: 50px" src="img/product/product0.jpg" alt="{{$product->name}}">
                                    <? } else {?>
                                    <img class="card-img" style="width:50px;" src="{{Storage::url($product->image)}}" alt="{{$product->name}}">
                                    <?}?>
                                </div>
                                <div class="media-body">
                                    <p>{{ $product->name }}</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <h5>{{ $product->price }} руб.</h5>
                        </td>
                        <td>
                            <div class="product_count">
                                <input type="text" name="qty" id="sst{{$product->id}}" maxlength="12" value="{{$product->pivot->count}}" title="Quantity:"
                                       class="input-text qty">
                                <form action="{{ route('basket-add-cart', $product->id) }}" method="POST">
                                <button type="submit" onclick="var result = document.getElementById('sst{{$product->id}}');
                                                 var sst = result.value;
                                                 var total{{$product->id}} = document.getElementById('total{{$product->id}}');
                                                 if( !isNaN( sst )) result.value++;
                                                 total{{$product->id}}.innerHTML = (result.value * {{$product->price}});
                                                 //return false;"
                                        class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                                 @csrf
                                </form>
                                <form action="{{route('basket-remove', $product->id)}}" method="POST">
                                <button type="submit" onclick="var result = document.getElementById('sst{{$product->id}}');var sst = result.value;var total{{$product->id}} = document.getElementById('total{{$product->id}}');if((!isNaN(sst)) && (sst > 0)) result.value--;
                                                 total{{$product->id}}.innerHTML = (result.value * {{$product->price}});
                                                 //return false;"
                                        class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>

                                @csrf
                                </form>
                            </div>
                        </td>
                        <td>
                            <h5><span id="total{{$product->id}}">{{$product->getPriceForCount()}}</span> руб.</h5>
                        </td>
                    </tr>
                    @endforeach

                    <!------------------------>
                    <!--<tr class="bottom_button">
                        <td>
                            <a class="button" href="#">Обновить корзину</a>
                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                        <td>
                            <div class="cupon_text d-flex align-items-center">
                                <input type="text" placeholder="Coupon Code">
                                <a class="primary-btn" href="#">Применить</a>
                                <a class="button" href="#">Купон скидки</a>
                            </div>
                        </td>
                    </tr>-->
                    <tr>
                        <td>

                        </td>
                        <td>

                        </td>
                        <td>
                            <h5>Итого</h5>
                        </td>
                        <td>
                            <h5>{{$order->getFullPrice()}} руб.</h5>
                        </td>
                    </tr>
                    <!--
                    <tr class="shipping_area">
                        <td class="d-none d-md-block">

                        </td>
                        <td>

                        </td>
                        <td>
                            <h5>Shipping</h5>
                        </td>
                        <td>
                            <div class="shipping_box">
                                <ul class="list">
                                    <li><a href="#">Flat Rate: $5.00</a></li>
                                    <li><a href="#">Free Shipping</a></li>
                                    <li><a href="#">Flat Rate: $10.00</a></li>
                                    <li class="active"><a href="#">Local Delivery: $2.00</a></li>
                                </ul>
                                <h6>Calculate Shipping <i class="fa fa-caret-down" aria-hidden="true"></i></h6>
                                <select class="shipping_select">
                                    <option value="1">Bangladesh</option>
                                    <option value="2">India</option>
                                    <option value="4">Pakistan</option>
                                </select>
                                <select class="shipping_select">
                                    <option value="1">Select a State</option>
                                    <option value="2">Select a State</option>
                                    <option value="4">Select a State</option>
                                </select>
                                <input type="text" placeholder="Postcode/Zipcode">
                                <a class="gray_btn" href="#">Update Details</a>
                            </div>
                        </td>
                    </tr>
                    -->
                    <tr class="out_button_area">
                        <td class="d-none-l">

                        </td>
                        <td class="">

                        </td>
                        <td>

                        </td>
                        <td>
                            <div class="checkout_btn_inner d-flex align-items-center">
                                <a class="gray_btn" href="{{ route('index') }}">Продолжение покупок</a>
                                <a class="primary-btn ml-2" href="{{ route('cart-checkout') }}">Касса</a>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <? } else {?>
                  <h5>Корзина пуста</h5>
                <? }?>
            </div>
        </div>
    </div>

@endsection
