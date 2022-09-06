@extends('layouts.starlight')
@section('category')
    active
@endsection
@section('content')
    @include('layouts.nav')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ url('home') }}">Dashboard</a>

            <span class="breadcrumb-item active">Category</span>
        </nav>

        <div class="sl-pagebody">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Category list</div>

                            <div class="card-body">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">name</th>
                                            <th scope="col">added by</th>
                                            <th scope="col">created at</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>

                                                <th scope="row">{{ $loop->index + 1 }}</th>
                                                <td>{{ $category->category_name }}</td>
                                                <td>{{ App\Models\User::find($category->added_by)->name }}</td>
                                                <td>{{ $category->created_at->format('d/m/y') }}.
                                                    {{ $category->created_at->diffForHumans() }}
                                                </td>
                                                <td>
                                                    <a href="{{ url('category/delete') }}/{{ $category->id }}"
                                                        class="btn btn-danger btn-sm">Delete</a>
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
                            <div class="card-header">Add Category</div>

                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success">{{ session('status') }}</div>
                                @endif
                                <form method="POST" action="{{ url('/category/insert') }}">
                                    @csrf
                                    <div class="form-group">
                                        @error('category_name')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <label for="">Category Name</label>
                                        <input type="text" class="form-control" id="category_name"
                                            placeholder="category name" name="category_name">
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
