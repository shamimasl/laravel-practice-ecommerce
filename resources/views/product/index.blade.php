@extends('layouts.starlight')
@section('product')
    active
@endsection
@section('content')
    @include('layouts.nav')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ url('home') }}">Dashboard</a>

            <span class="breadcrumb-item active">Product</span>
        </nav>

        <div class="sl-pagebody">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Product list</div>

                            <div class="card-body">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">name</th>
                                            <th scope="col">Category name</th>
                                            <th scope="col">description</th>
                                            <th scope="col">price</th>
                                            <th scope="col">quantity</th>
                                            <th scope="col">photo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>

                                                <th scope="row">{{ $loop->index + 1 }}</th>
                                                <td>{{ $product->product_name }}</td>
                                                <td>{{ App\Models\Category::find($product->category_id)->category_name }}
                                                </td>
                                                <td>{{ $product->product_description }}</td>
                                                <td>{{ $product->product_price }}</td>
                                                <td>{{ $product->product_quantity }}</td>
                                                <td><img style="height: 50px; width:50px"
                                                        src="{{ asset('uploads/product_photos') }}/{{ $product->product_photo }}"
                                                        alt="" srcset=""></td>
                                                {{-- <td>{{ App\Models\User::find($category->added_by)->name }}</td>
                                                <td>{{ $category->created_at->format('d/m/y') }}.
                                                    {{ $category->created_at->diffForHumans() }}
                                                </td>
                                                <td>
                                                    <a href="{{ url('category/delete') }}/{{ $category->id }}"
                                                        class="btn btn-danger btn-sm">Delete</a>
                                                </td> --}}
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
                            <div class="card-header">Add Product</div>

                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success">{{ session('status') }}</div>
                                @endif
                                <form method="POST" action="{{ url('/product/insert') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">

                                        <label for="">Category Name</label><br>
                                        <select name="category_id" class="form-control" id="">
                                            <option value="">-Select-</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">

                                        <label for="">Sub Category Name</label><br>
                                        <select name="sub_category_id" class="form-control" id="">
                                            <option value="">-Select-</option>
                                            @foreach ($subcategories as $subcategory)
                                                <option value="{{ $subcategory->id }}">
                                                    {{ $subcategory->sub_category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">

                                        <label for="">Product Name</label>
                                        <input type="text" class="form-control" id="product_name"
                                            placeholder="product name" name="product_name">
                                    </div>
                                    <div class="form-group">

                                        <label for="">Product Description</label>
                                        <textarea name="product_description" id="" class="form-control" rows="4"></textarea>
                                    </div>
                                    <div class="form-group">

                                        <label for="">Product price</label>
                                        <input type="text" class="form-control" id=""
                                            placeholder="product price" name="product_price">
                                    </div>
                                    <div class="form-group">

                                        <label for="">Product quantity</label>
                                        <input type="text" class="form-control" id=""
                                            placeholder="product quantity" name="product_quantity">
                                    </div>
                                    <div class="form-group">

                                        <label for="">Product photo</label>
                                        <input type="file" class="form-control" id=""
                                            placeholder="product photo" name="product_photo">
                                    </div>
                                    <div class="form-group">

                                        <label for="">Product Thumbnail Photo</label>
                                        <input type="file" class="form-control" id="" placeholder="product name"
                                            name="product_thumbnail_photos[]" multiple>
                                    </div>



                                    <button type="submit" class="btn btn-primary">Add Product</button>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>

            </div><!-- sl-pagebody -->
        </div><!-- sl-mainpanel -->
        <!-- ########## END: MAIN PANEL ########## -->
    @endsection
