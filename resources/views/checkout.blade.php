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
                                    <li><a href="index.html">Home</a></li>
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
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="checkout-form form-style">
                                <h3>Billing Details</h3>
                                <form action="http://themepresss.com/tf/html/tohoney/checkout">
                                    <div class="row">

                                        <div class="col-sm-6 col-12">
                                            <p> Name *</p>
                                            <input type="text" value="{{ Auth::user()->name }}">
                                        </div>
                                        {{-- <div class="col-12">
                                            <p>Compani Name</p>
                                            <input type="text">
                                        </div> --}}
                                        <div class="col-sm-6 col-12">
                                            <p>Email Address *</p>
                                            <input type="email" value="{{ Auth::user()->email }}">
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <p>Phone No. *</p>
                                            <input type="text">
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <p>Country *</p>
                                            <select name="" id="">
                                                <option value="">-Select-</option>
                                                <option value="">Bangladesh</option>
                                                <option value="">India</option>
                                                <option value="">America</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <p>Town/City *</p>
                                            <select name="" id="">
                                                <option value="">-Select-</option>
                                                <option value="">Dhaka</option>
                                                <option value="">Rajshahi</option>
                                                <option value="">CTG</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <p>Your Address *</p>
                                            <input type="text">
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <p>Postcode/ZIP</p>
                                            <input type="email">
                                        </div>


                                        <div class="col-12">
                                            <p>Order Notes </p>
                                            <textarea name="massage" placeholder="Notes about Your Order, e.g.Special Note for Delivery"></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="order-area">
                                <h3>Your Order</h3>
                                <ul class="total-cost">
                                    <li>Pure Nature Honey <span class="pull-right">$139.00</span></li>
                                    <li>Your Product Name <span class="pull-right">$100.00</span></li>
                                    <li>Pure Nature Honey <span class="pull-right">$141.00</span></li>
                                    <li>Subtotal <span class="pull-right"><strong>$380.00</strong></span></li>
                                    <li>Shipping <span class="pull-right">Free</span></li>
                                    <li>Total<span class="pull-right">$380.00</span></li>
                                </ul>
                                <ul class="payment-method">
                                    <li>
                                        <input id="bank" type="checkbox">
                                        <label for="bank">Direct Bank Transfer</label>
                                    </li>
                                    <li>
                                        <input id="paypal" type="checkbox">
                                        <label for="paypal">Paypal</label>
                                    </li>
                                    <li>
                                        <input id="card" type="checkbox">
                                        <label for="card">Credit Card</label>
                                    </li>
                                    <li>
                                        <input id="delivery" type="checkbox">
                                        <label for="delivery">Cash on Delivery</label>
                                    </li>
                                </ul>
                                <button>Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
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
