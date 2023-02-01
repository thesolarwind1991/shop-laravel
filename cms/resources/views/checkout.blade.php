@extends('layouts.master')

@section('title')Касса@endsection

@section('content')
    <div class="container">
        <!--<div class="returning_customer">
            <div class="check_title">
                <h2>Returning Customer? <a href="#">Click here to login</a></h2>
            </div>
            <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new
                customer, please proceed to the Billing & Shipping section.</p>
            <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                <div class="col-md-6 form-group p_star">
                    <input type="text" class="form-control" placeholder="Username or Email*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Username or Email*'" id="name" name="name">
                    <!-- <span class="placeholder" data-placeholder="Username or Email"></span> -->
              <!--  </div>
                <div class="col-md-6 form-group p_star">
                    <input type="password" class="form-control" placeholder="Password*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Password*'" id="password" name="password">
                    <!-- <span class="placeholder" data-placeholder="Password"></span> -->
               <!-- </div>
                <div class="col-md-12 form-group">
                    <button type="submit" value="submit" class="button button-login">login</button>
                    <div class="creat_account">
                        <input type="checkbox" id="f-option" name="selector">
                        <label for="f-option">Remember me</label>
                    </div>
                    <a class="lost_pass" href="#">Lost your password?</a>
                </div>
            </form>
        </div>-->
        <!--<div class="cupon_area">
            <div class="check_title">
                <h2>Have a coupon? <a href="#">Click here to enter your code</a></h2>
            </div>
            <input type="text" placeholder="Enter coupon code">
            <a class="button button-coupon" href="#">Apply Coupon</a>
        </div>-->
        <div class="billing_details">
            <div class="row">
                <form class="" action="{{ route('basket-confirm') }}" method="post" novalidate="novalidate">
                <div class="col-lg-8 row contact_form">
                    <h3>Данные о покупателе</h3>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="name" name="name" placeholder="ФИО покупателя">
                            <span class="placeholder" data-placeholder="ФИО покупателя"></span>
                        </div>

                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="address" name="address" placeholder="Адрес покупателя ">
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Телефон покупателя">
                            <span class="placeholder" data-placeholder="Phone number"></span>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="email" name="email" placeholder="E-mail покупателя">
                            <span class="placeholder" data-placeholder="Email Address"></span>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <select class="country_select" id="country" name="country">
                                <option value="Russia">Россия</option>
                                <option value="Belarus">Беларусь</option>
                                <option value="Kazaxstan">Казахстан</option>
                            </select>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="zip" name="zip" placeholder="Почтовый индекс">
                        </div>
                        <!--<div class="col-md-12 form-group">
                            <div class="creat_account">
                                <input type="checkbox" id="f-option2" name="selector">
                                <label for="f-option2">Create an account?</label>
                            </div>
                        </div>
                        <div class="col-md-12 form-group mb-0">
                            <div class="creat_account">
                                <h3>Shipping Details</h3>
                                <input type="checkbox" id="f-option3" name="selector">
                                <label for="f-option3">Ship to a different address?</label>
                            </div>
                            <textarea class="form-control" name="message" id="message" rows="1" placeholder="Order Notes"></textarea>
                        </div>-->
                        @csrf
                </div>
                <div class="col-lg-4 row">
                    <div class="order_box">
                        <h2>Платежка</h2>
                        <!--<ul class="list">
                            <li><a href="#"><h4>Product <span>Total</span></h4></a></li>
                            <li><a href="#">Fresh Blackberry <span class="middle">x 02</span> <span class="last">$720.00</span></a></li>
                            <li><a href="#">Fresh Tomatoes <span class="middle">x 02</span> <span class="last">$720.00</span></a></li>
                            <li><a href="#">Fresh Brocoli <span class="middle">x 02</span> <span class="last">$720.00</span></a></li>
                        </ul>-->
                        <ul class="list list_2">
                            <!--<li><a href="#">Subtotal <span>$2160.00</span></a></li>
                            <li><a href="#">Shipping <span>Flat rate: $50.00</span></a></li>-->
                            <li><a href="#">Итого к уплате: <span>{{ $order->getFullPrice() }} руб.</span></a></li>
                        </ul>
                        <div class="payment_item">
                            <div class="radion_btn">
                                <input type="radio" id="f-option5" name="selectorMIR" value="payMIR">
                                <label for="f-option5">Платежная система "МИР"</label>
                                <div class="check"></div>
                            </div>
                            <p>Выберите платежную карту "МИР" через которую хотите оформить заказ</p>
                        </div>
                        <div class="payment_item active">
                            <div class="radion_btn">
                                <input type="radio" id="f-option6" name="selectorPAL" value="paypal">
                                <label for="f-option6">Paypal </label>
                                <img src="img/product/card.jpg" alt="">
                                <div class="check"></div>
                            </div>
                            <p>Выберите платежную карту Paypal через которую хотите оформить заказ</p>
                        </div>
                        <div class="creat_account">
                            <input type="checkbox" id="f-option4" name="selector_create_account">
                            <label for="f-option4">Я принимаю данное соглашение </label>
                            <a href="#">Условия сделки*</a>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="button button-paypal">Купить товары</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection
