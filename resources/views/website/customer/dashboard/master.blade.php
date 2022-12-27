@extends('website.master')
@section('title')
    @yield('dashboard-title') ~ Dashboard
@endsection
@section('body')
@section('title')
My Dashboard
@endsection


@section('body')
<div class="container py-2">
<div class="row">
    <div class="col-md-3 text-center">
        <div class="card card-heading pe-0">
            <div class="card-body">
                <nav class="navbar font-weight-bold">
                    <ul class="navbar-nav mx-auto">
                        <li><a href="javascript:void(0);" class="nav-link" onclick="user_dashboard()">Dashboard</a></li>
                        <li><a href="{{route('my-profile')}}" class="nav-link">Profile</a></li>
                        <li><a href="javascript:void(0);" class="nav-link">Orders</a></li>
                        <li><a href="javascript:void(0);" class="nav-link">Home</a></li>
                        <li><a href="javascript:void(0);" class="nav-link">Home</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        @yield('dashboard-content')
    </div>
</div>
</div>

@endsection


@endsection
