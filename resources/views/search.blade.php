@extends('layouts.tohoney')

@section('content1')
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Search Page</h2>
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><span>Shop</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- product-area start -->
    <div class="product-area pt-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        {{-- <h2>Category Wise Shop Page: {{ $category_name }}</h2> --}}
                        <img src="assets/images/section-title.png" alt="">
                    </div>
                </div>
                <ul class="row">
                    @foreach ($search_results as $product)
                        @include('part.product_list', ['product' => $product])
                    @endforeach
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="all">
                    <ul class="row">



                    </ul>
                </div>

            </div>
        </div>
    </div>
    <!-- product-area end -->
    <!-- start social-newsletter-section -->
@endsection
