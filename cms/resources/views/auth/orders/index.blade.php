@extends('layouts.app')

@section('title', 'Заказы')

@section('content')
    <div class="col-md-12">
        <h1>Заказы</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Имя</th>
            <th scope="col">Телефон</th>
            <th scope="col">Когда отправлен</th>
            <th scope="col">Сумма</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        <?php if(empty($orders)) {?>
            <tr>
               <th colspan="6">Нет данных в таблице</th>
            </tr>
        <?php } else {?>
        @foreach($orders as $order)
            <tr>
                <th scope="row">{{$order->id}}</th>
                <td>{{$order->name}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->created_at->format('H:i:s d.m.Y')}}</td>
                <td>{{$order->getFullPrice()}} руб</td>
                <td><a class="btn btn-success"
                       @admin
                         href="{{route('orders.show', $order)}}"
                       @else
                         href="{{route('person.orders.show', $order)}}"
                       @endadmin
                    >Открыть</a></td>
            </tr>
        @endforeach
        <?php } ?>

        </tbody>
    </table>
    </div>
@endsection
