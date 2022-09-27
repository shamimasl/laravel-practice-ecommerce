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
            <a class="breadcrumb-item" href="{{ url('category') }}">info</a>
            <span class="breadcrumb-item active">edit</span>
        </nav>

        <div class="sl-pagebody">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-md-4 m-auto">
                        <div class="card">
                            <div class="card-header">Edit Info</div>

                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success">{{ session('status') }}</div>
                                @endif
                                <form method="POST" action="{{ url('/info/update') }}/{{ $info->id }}">
                                    @csrf
                                    <input type="hidden" value="{{ $info->id }}" name="id">
                                    <div class="form-group">
                                        @error('message')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                        <textarea name="message" id="" cols="20" rows="10" aria-valuetext="">{{ $info->message }} </textarea>
                                    </div>
                                    <div class="form-group">
                                        @error('category_name')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <label for="">Email</label>
                                        <input type="text" class="form-control" id="email" placeholder=""
                                            name="email" value="{{ $info->email }}">
                                    </div>
                                    <div class="form-group">
                                        @error('tel')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <label for="">Tel</label>
                                        <input type="text" class="form-control" id="tel"
                                            value="{{ $info->tel }}" name="tel">
                                    </div>
                                    <div class="form-group">
                                        @error('address')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <label for="">Address</label>
                                        <input type="text" class="form-control" id="address"
                                            value="{{ $info->address }}" name="address">
                                    </div>
                                    <div class="form-group">
                                        @error('copyright')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <label for="">Copyright</label>
                                        <input type="text" class="form-control" id="copyright"
                                            value="{{ $info->copyright }}" name="copyright">
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
