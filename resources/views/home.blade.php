@extends('layouts.starlight')
@section('dashboard')
    active
@endsection
@section('content')
    <!-- ########## START: LEFT PANEL ########## -->
    @include('layouts.nav')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">

            <span class="breadcrumb-item active">Dashboard</span>
        </nav>

        <div class="sl-pagebody">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">{{ __('Dashboard') }}</div>

                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <p>Welcome {{ Auth::user()->name }}</p>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">name</th>
                                            <th scope="col">email</th>
                                            <th scope="col">created at</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>

                                                <th scope="row">{{ $loop->index + 1 }}</th>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->created_at->format('d/m/y') }}.
                                                    {{ $user->created_at->diffForHumans() }}
                                                </td>
                                            </tr>
                                        @endforeach


                                        </tr>
                                    </tbody>
                                </table>
                                {{-- @foreach ($users as $user)
                                    <p>{{ $loop->index + 1 }}. {{ $user->name }}</p>
                                @endforeach --}}
                                {{-- {{ __('You are logged in!') }} --}}
                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection
