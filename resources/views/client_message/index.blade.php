@extends('layouts.starlight')
@section('message')
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
                            <div class="card-header">Client list</div>

                            <div class="card-body">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Message</th>
                                            <th scope="col">Designation</th>

                                            <th scope="col">photo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($messages as $message)
                                            <tr>

                                                <th scope="row">{{ $loop->index + 1 }}</th>
                                                <td>{{ $message->name }}</td>

                                                <td>{{ $message->message }}</td>
                                                <td>{{ $message->designation }}</td>

                                                <td><img style="height: 50px; width:50px"
                                                        src="{{ asset('uploads/client_photos') }}/{{ $message->image }}"
                                                        alt="" srcset=""></td>
                                                {{-- <td>{{ App\Models\User::find($category->added_by)->name }}</td>
                                                <td>{{ $category->created_at->format('d/m/y') }}.
                                                    {{ $category->created_at->diffForHumans() }}
                                                </td> --}}
                                                <td>
                                                    <a href="" class="btn btn-danger btn-sm">Delete</a>
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
                            <div class="card-header">Add Client Message</div>

                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success">{{ session('status') }}</div>
                                @endif
                                <form method="POST" action="{{ url('/message/insert') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">

                                        <label for="">name</label>
                                        <input type="text" class="form-control" id="product_name" placeholder="name"
                                            name="name">
                                    </div>
                                    <div class="form-group">

                                        <label for="">message</label>
                                        <textarea name="message" id="" class="form-control" rows="4"></textarea>
                                    </div>
                                    <div class="form-group">

                                        <label for="">designation</label>
                                        <input type="text" class="form-control" id="" placeholder="designation"
                                            name="designation">
                                    </div>

                                    <div class="form-group">

                                        <label for="">Client photo</label>
                                        <input type="file" class="form-control" id=""
                                            placeholder="product photo" name="image">
                                    </div>




                                    <button type="submit" class="btn btn-primary">Add message</button>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>

            </div><!-- sl-pagebody -->
        </div><!-- sl-mainpanel -->
        <!-- ########## END: MAIN PANEL ########## -->
    @endsection
