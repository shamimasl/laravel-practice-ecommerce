@extends('layouts.starlight')
@section('subcategory')
    active
@endsection
@section('content')
    @include('layouts.nav')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ url('home') }}">Dashboard</a>
            <a class="breadcrumb-item" href="{{ url('category') }}">Sub Category</a>
            <span class="breadcrumb-item active">{{ $subcategory_info->sub_category_name }}</span>
        </nav>

        <div class="sl-pagebody">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-md-4 m-auto">
                        <div class="card">
                            <div class="card-header">Edit Sub Category</div>

                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success">{{ session('status') }}</div>
                                @endif
                                @if (session('error_status'))
                                    <div class="alert alert-danger">{{ session('error_status') }}</div>
                                @endif
                                <form method="POST" action="{{ url('/subcategory/update') }}/{{ $subcategory_info->id }}">
                                    @csrf
                                    <div class="form-group">
                                        @error('category_name')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <label for="">Category Name</label>
                                        <input type="hidden" value="{{ $subcategory_info->id }}" name="sub_category_id">
                                        <select name="category_id" class="form-controll">
                                            <option value="">
                                                -Select One-
                                            </option>
                                            @foreach ($categories as $category)
                                                <option
                                                    {{ $subcategory_info->category_id == $category->id ? 'Selected' : '' }}
                                                    value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach

                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <input type="text" class="form-control" id="category_name"
                                            placeholder="sub category name" name="sub_category_name"
                                            value="{{ $subcategory_info->sub_category_name }}">
                                        @error('sub_category_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>

            </div><!-- sl-pagebody -->
        </div><!-- sl-mainpanel -->
        <!-- ########## END: MAIN PANEL ########## -->
    @endsection
