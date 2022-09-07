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
            <a class="breadcrumb-item" href="{{ url('category') }}">Category</a>
            <span class="breadcrumb-item active">Sub Category</span>
        </nav>

        <div class="sl-pagebody">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Sub Category list</div>

                            <div class="card-body">
                                <form action="{{ url('subcategory/mark/delete') }}" method="POST">
                                    @csrf
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Mark</th>
                                                <th scope="col">#</th>
                                                <th scope="col">sub categoryname</th>
                                                <th scope="col">category name</th>
                                                <th scope="col">created at</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($subcategories as $key => $category)
                                                <tr>
                                                    <th><input type="checkbox" value="{{ $category->id }}"
                                                            name="mark_delete_id[]"></th>
                                                    <th scope="row">{{ $subcategories->firstItem() + $key }}</th>
                                                    <td>{{ $category->sub_category_name }}</td>
                                                    <td>{{ App\Models\Category::find($category->category_id)->category_name }}
                                                    </td>
                                                    <td>{{ $category->created_at->format('d/m/y') }}.
                                                        {{ $category->created_at->diffForHumans() }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ url('subcategory/delete') }}/{{ $category->id }}"
                                                            class="btn btn-danger btn-sm">Delete</a>
                                                        <a href="{{ url('subcategory/edit') }}/{{ $category->id }}"
                                                            class="btn btn-warning btn-sm">Edit</a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr class="text-center text-danger">
                                                    <td colspan="50">No Data To Show</td>
                                                </tr>
                                            @endforelse


                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="submit" class="btn btn-danger btn-sm">Mark Delete</button>
                                    <a href="{{ url('subcategory/all/delete') }}" class="btn btn-warning btn-sm">All
                                        Delete</a>
                                </form>
                                <br>
                                {{-- @foreach ($categories as $category)
                                {{ $category->category_name }}<br>
                            @endforeach --}}
                                {{ $subcategories->appends(['deleted_sub_categories' => $deleted_sub_categories->currentPage()])->links() }}

                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">Restore Sub Category list</div>

                            <div class="card-body">

                                <table class="table">
                                    <thead>
                                        <tr>

                                            <th scope="col">#</th>
                                            <th scope="col">sub categoryname</th>
                                            <th scope="col">category name</th>
                                            <th scope="col">created at</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($deleted_sub_categories as $key => $deleted_category)
                                            <tr>

                                                <th scope="row">{{ $loop->index + 1 }}</th>
                                                <td>{{ $deleted_category->sub_category_name }}</td>
                                                <td>{{ App\Models\Category::find($deleted_category->category_id)->category_name }}
                                                </td>
                                                <td>{{ $deleted_category->created_at->format('d/m/y') }}.
                                                    {{ $deleted_category->created_at->diffForHumans() }}
                                                </td>
                                                <td>
                                                    <a href="{{ url('subcategory/restore') }}/{{ $deleted_category->id }}"
                                                        class="btn btn-success btn-sm">Restore</a>
                                                    <a href="{{ url('subcategory/permanent/delete') }}/{{ $deleted_category->id }}"
                                                        class="btn btn-danger btn-sm">Delete</a>

                                                </td>
                                            </tr>
                                        @empty
                                            <tr class="text-center text-danger">
                                                <td colspan="50">No Data To Show</td>
                                            </tr>
                                        @endforelse


                                        </tr>
                                    </tbody>
                                </table>

                                {{-- @foreach ($categories as $category)
                                {{ $category->category_name }}<br>
                            @endforeach --}}
                                {{-- {{ $deleted_sub_categories->links() }} --}}
                                {{ $deleted_sub_categories->appends(['subcategories' => $subcategories->currentPage()])->links() }}

                            </div>
                        </div>


                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">Add Sub Category</div>

                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success">{{ session('status') }}</div>
                                @endif
                                @if (session('error_status'))
                                    <div class="alert alert-danger">{{ session('error_status') }}</div>
                                @endif
                                <form method="POST" action="{{ url('/subcategory/insert') }}">
                                    @csrf
                                    <div class="form-group">
                                        @error('category_name')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <label for="">Category Name</label>
                                        <select name="category_id" class="form-controll">
                                            <option value="">
                                                -Select One-
                                            </option>
                                            @foreach ($categories as $category)
                                                <option {{ old('category_id') == $category->id ? 'Selected' : '' }}
                                                    value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach

                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <input type="text" class="form-control" id="category_name"
                                            placeholder="sub category name" name="sub_category_name">
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
