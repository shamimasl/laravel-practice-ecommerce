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
            @if (Auth::user()->role == 1)
                @include('part.customerdashboard')
            @elseif (Auth::user()->role == 2)
                @include('part.admindashboard')
            @elseif (Auth::user()->role == 3)
                @include('part.shopkeeperdashboard')
            @endif


        </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection
