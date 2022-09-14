@extends('layouts.tohoney')

@section('content1')
    @auth
        @if (Auth::user()->role == 1)
            <div class="breadcumb-area bg-img-4 ptb-100">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="breadcumb-wrap text-center">
                                <h2>Checkout</h2>
                                <ul>
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li><span>Checkout</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .breadcumb-area end -->
            <!-- checkout-area start -->
            <div class="checkout-area ptb-100">
                <form action="{{ url('order/create') }}" method="POST">
                    @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="checkout-form form-style">
                                    <h3>Billing Details</h3>
                                    <form action="http://themepresss.com/tf/html/tohoney/checkout">
                                        <div class="row">

                                            <div class="col-sm-6 col-12">
                                                <p> Name *</p>
                                                <input type="text" name="name" value="{{ Auth::user()->name }}">
                                            </div>
                                            {{-- <div class="col-12">
                                            <p>Compani Name</p>
                                            <input type="text">
                                        </div> --}}
                                            <div class="col-sm-6 col-12">
                                                <p>Email Address *</p>
                                                <input type="email" name="email" value="{{ Auth::user()->email }}">
                                            </div>
                                            <div class="col-sm-6 col-12">
                                                <p>Phone No. *</p>
                                                <input type="text" name="phone">
                                            </div>
                                            <div class="col-sm-6 col-12">
                                                <p>Country *</p>
                                                <select name="country" id="" class="country_select">
                                                    <option value="">-Select-</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            <div class="col-sm-6 col-12">
                                                <p>Town/City *</p>
                                                <select name="city" id="city_select">

                                                </select>
                                            </div>
                                            <div class="col-sm-6 col-12">
                                                <p>Your Address *</p>
                                                <input type="text" name="address">
                                            </div>
                                            <div class="col-sm-6 col-12">
                                                <p>Postcode/ZIP</p>
                                                <input type="text" name="zipcode">
                                            </div>


                                            <div class="col-12">
                                                <p>Order Notes </p>
                                                <textarea name="note" placeholder="Notes about Your Order, e.g.Special Note for Delivery"></textarea>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="order-area">
                                    <h3>Your Order</h3>
                                    <ul class="total-cost">
                                        {{-- <li>Pure Nature Honey <span class="pull-right">$139.00</span></li>
                                    <li>Your Product Name <span class="pull-right">$100.00</span></li>
                                    <li>Pure Nature Honey <span class="pull-right">$141.00</span></li> --}}
                                        <li>Total <span class="pull-right"><strong
                                                    name="total">{{ session('total_from_cart') }}</strong></span>
                                        </li>
                                        <li>Discount <span class="pull-right"><strong
                                                    name="discount">{{ session('discount_from_cart') }}</strong></span>
                                        </li>
                                        {{-- <li>Shipping <span class="pull-right">Free</span></li> --}}
                                        <li name="sub_total">SubTotal<span
                                                class="pull-right">{{ session('subtotal_from_cart') }}</span></li>
                                    </ul>
                                    <ul class="payment-method">
                                        <li>
                                            <input id="bank" type="radio">
                                            <label for="bank">Direct Bank Transfer</label>

                                        <li>
                                            <input id="paypal" type="radio">
                                            <label for="paypal">Paypal</label>
                                        </li>
                                        <li>
                                            <input id="card" type="radio">
                                            <label for="card">Credit Card</label>
                                        </li>
                                        <li>
                                            <input id="delivery" type="radio"name="cod" value="1">
                                            <label for="delivery">Cash on Delivery</label>
                                        </li>
                                    </ul>
                                    <button type="submit">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        @else
            <h1>Your not Customer</h1>
        @endif
    @else
        <div class="alert alert-warning">
            Please Login To View This Page<br>
            <a href="{{ url('login') }}">Click Here To Login</a>
        </div>
    @endauth
@endsection
@section('footer_script')
    <script>
        $(document).ready(function() {
            $('.country_select').select2();
            $('.country_select').change(function() {
                var country_id = $('.country_select').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '/getCityList',
                    data: {
                        country_id: country_id
                    },
                    success: function(data) {
                        $('#city_select').html(data);
                        $('#city_select').select2();
                    }
                });
            });
        });
    </script>
@endsection
