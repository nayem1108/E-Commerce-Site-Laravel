@extends('website.customer.dashboard.master')

@section('dashboard-title')
    Home
@endsection


@section('dashboard-content')
    <pre class="text-center text-success py-2 font-weight-bold" >{{Session::get('message')}}</pre>
    <div class="row">
        <div class="mt-0 d-flex justify-content-between">
            <div class="card card-heading">
                <div class="card-body text-center py-5" >
                    <div class="h5">TOTAL ORDER</div>
                    <div>100</div>
                </div>
            </div>
        
            <div class="card card-heading single-footer our-app">
                <div class="card-body text-center py-5">
                    <div class="h5">PENDING ORDER</div>
                    <div>100</div>
                </div>
            </div>
            <div class="card card-heading single-footer our-app">
                <div class="card-body text-center py-5">
                    <div class="h5">CONFIRMED ORDER</div>
                    <div class="">100</div>
                </div>
            </div>
        </div>
    </div>
@endsection