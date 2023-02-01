@extends('layouts.app')

@section('title', 'Заказ ' . $order->id)

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="justify-content-center">
                <div class="panel">
                    <h1>Заказ №{{ $order->id }}</h1>
                    <p>Заказчик: <b>{{ $order->name }}</b></p>
                    <p>Номер телефона: <b>{{ $order->phone }}</b></p>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Название</th>
                            <th>Кол-во</th>
                            <th>Цена</th>
                            <th>Стоимость</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($skus as $product)
                            <tr>
                                <td>
                                    <a href="{{ route('product', $product) }}">
                                        <? if (empty($product->image)) {?>
                                        <img height="56px" src="<?=asset('img/product/product0.jpg');?>" alt="">
                                        <? } else {?>
                                        <img height="56px" src="<?=Storage::url($product->image);?>" alt="">
                                        <? } ?>
                                        {{ $product->name }}
                                    </a>
                                </td>
                                <td><span></span></td>
                                <td>{{$product->price}} руб.</td>
                                <td>{{$product->getPriceForCount()}} руб.</td>
                            </tr>

                        @endforeach
                        <?/*@foreach ($skus as $sku)
                            <tr>
                                <td>
                                    <a href="{{ route('sku', [$sku->product->category->code, $sku->product->code, $sku]) }}">
                                        <img height="56px"
                                             src="{{ Storage::url($sku->product->image) }}">
                                        {{ $sku->product->name }}
                                    </a>
                                </td>
                                <td><span class="badge"> {{ $sku->pivot->count }}</span></td>
                                <td>{{ $sku->pivot->price }} {{ $order->currency->symbol }}</td>
                                <td>{{ $sku->pivot->price * $sku->pivot->count }} {{ $order->currency->symbol }}</td>
                            </tr>
                        @endforeach*/?>
                        <tr>
                            <td colspan="3">Общая стоимость:</td>
                            <td>{{ $order->getFullPrice() }} руб. <?/*{{ $order->currency->symbol }}*/?></td>
                        </tr>
                        <?/*@if($order->hasCoupon())
                            <tr>
                                <td colspan="3">Был использован купон:</td>
                                <td><a href="{{ route('coupons.show', $order->coupon) }}">{{ $order->coupon->code }}</a></td>
                            </tr>
                        @endif*/?>
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection
