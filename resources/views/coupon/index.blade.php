@extends('layouts.starlight')
@section('coupon')
    active
@endsection
@section('content')
    @include('layouts.nav')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ url('home') }}">Dashboard</a>

            <span class="breadcrumb-item active">Coupon</span>
        </nav>

        <div class="sl-pagebody">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Coupon list</div>

                            <div class="card-body">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">name</th>
                                            <th scope="col">Discount</th>
                                            <th scope="col">Validity</th>
                                            <th scope="col">created at</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($coupons as $coupon)
                                            <tr>

                                                <th scope="row">{{ $loop->index + 1 }}</th>
                                                <td>{{ $coupon->coupon_name }}</td>
                                                <td>{{ $coupon->coupon_discount_amount }}</td>
                                                <td>{{ \Carbon\Carbon::parse($coupon->coupon_validity_till)->diffforHumans() }}
                                                </td>
                                                <td>{{ $coupon->created_at->format('d/m/y') }}.
                                                    {{ $coupon->created_at->diffForHumans() }}
                                                </td>
                                                <td>
                                                    {{-- <a href="{{ url('category/delete') }}/{{ $category->id }}"
                                                        class="btn btn-danger btn-sm">Delete</a> --}}
                                                </td>
                                            </tr>
                                        @endforeach


                                        </tr>
                                    </tbody>
                                </table>
                                {{-- @foreach ($categories as $category)
                                    {{ $category->category_name }}<br>
                                @endforeach --}}

                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">Add Coupon</div>

                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success">{{ session('status') }}</div>
                                @endif
                                <form method="POST" action="{{ route('couponinsert') }}">
                                    @csrf
                                    <div class="form-group">
                                        @error('coupon_name')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <label for="">Coupon Name</label>
                                        <input type="text" class="form-control" id="coupon_name"
                                            placeholder="coupon name" name="coupon_name">
                                    </div>
                                    <div class="form-group">
                                        @error('coupon_discount_amount')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <label for="">Discount Amount (%)</label>
                                        <input type="text" class="form-control" id="coupon_discount_amount"
                                            placeholder="discount amount" name="coupon_discount_amount">
                                    </div>
                                    <div class="form-group">
                                        @error('coupon_validity_till')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <label for="">Validity Till</label>
                                        <input type="date" class="form-control" id="coupon_validity_till"
                                            placeholder="date" name="coupon_validity_till">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Add Coupon</button>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>

            </div><!-- sl-pagebody -->
        </div><!-- sl-mainpanel -->
        <!-- ########## END: MAIN PANEL ########## -->
    @endsection
