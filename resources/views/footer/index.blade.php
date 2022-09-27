@extends('layouts.starlight')
@section('info')
    active
@endsection
@section('content')
    @include('layouts.nav')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ url('home') }}">Dashboard</a>

            <span class="breadcrumb-item active">Footer Info</span>
        </nav>

        <div class="sl-pagebody">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Footer Info</div>

                            <div class="card-body">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">message</th>
                                            <th scope="col">email</th>
                                            <th scope="col">Tel</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Copyright</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($infos as $info)
                                            <tr>

                                                <th scope="row">{{ $loop->index + 1 }}</th>
                                                <td>{{ $info->message }}</td>
                                                <td>{{ $info->email }}</td>
                                                <td>{{ $info->tel }}</td>
                                                <td> {{ $info->address }}
                                                </td>
                                                <td>{{ $info->copyright }}</td>
                                                <td>
                                                    <a href="{{ url('info/edit') }}/{{ $info->id }}"
                                                        class="btn btn-danger btn-sm">Edit</a>
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
                            <div class="card-header">Add Info</div>

                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success">{{ session('status') }}</div>
                                @endif
                                <form method="POST" action="{{ url('/info/insert') }}">
                                    @csrf
                                    <div class="form-group">
                                        @error('message')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                        <textarea name="message" id="" cols="20" rows="10" placeholder="message"></textarea>
                                    </div>
                                    <div class="form-group">
                                        @error('category_name')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <label for="">Email</label>
                                        <input type="text" class="form-control" id="email" placeholder="email"
                                            name="email">
                                    </div>
                                    <div class="form-group">
                                        @error('tel')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <label for="">Tel</label>
                                        <input type="text" class="form-control" id="tel" placeholder="telephone"
                                            name="tel">
                                    </div>
                                    <div class="form-group">
                                        @error('address')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <label for="">Address</label>
                                        <input type="text" class="form-control" id="address" placeholder="address"
                                            name="address">
                                    </div>
                                    <div class="form-group">
                                        @error('copyright')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <label for="">Copyright</label>
                                        <input type="text" class="form-control" id="copyright" placeholder="copyright"
                                            name="copyright">
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
