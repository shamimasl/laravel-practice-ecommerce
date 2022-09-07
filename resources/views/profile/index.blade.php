@extends('layouts.starlight')

@section('content')
    @include('layouts.nav')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ url('home') }}">Dashboard</a>

            <span class="breadcrumb-item active">Profile</span>
        </nav>

        <div class="sl-pagebody">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">Change Name</div>

                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success">{{ session('status') }}</div>
                                @endif
                                <form method="POST" action="{{ url('/profile/name/change') }}">
                                    @csrf
                                    <div class="form-group">
                                        @error('category_name')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <label for="">Name</label>
                                        <input type="text" class="form-control" id="category_name" placeholder="name"
                                            name="name" value="{{ Auth::user()->name }}">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>

                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">Change Password</div>

                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif
                                <form method="POST" action="{{ url('/profile/password/change') }}">
                                    @csrf
                                    <div class="form-group">
                                        @error('category_name')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <label for="">Old Password</label>
                                        <input type="password" class="form-control" name="old_password">
                                    </div>
                                    <div class="form-group">
                                        @error('old_password')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <label for="">New Password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                    <div class="form-group">
                                        @error('password')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <label for="">Confirm Password</label>
                                        <input type="password" class="form-control" name="password_confirmation">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>

                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">Change Profile Photo</div>

                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif
                                <form method="POST" action="{{ url('/profile/photo/change') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group text-center">
                                        <img class="w-25"
                                            src="{{ asset('uploads/profile_photos') }}/{{ Auth::user()->profile_photo }}"
                                            alt="" srcset="">
                                    </div>
                                    <div class="form-group">
                                        @error('new_profile_photo')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <label for="">New profile Photo</label>
                                        <input type="file" class="form-control" name="new_profile_photo">
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
