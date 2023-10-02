@extends('layouts.admin')
@section('title')
    Main Page
@endsection
@section('content')
    <div class="card" style="width:50%; margin: 0 auto;">
        <div class="card-body">
            {{-- <h1>Baboo Coder</h1> --}}
            <div class="row">
                <div class="col-md-4 pl-5">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h5>Total Users: {{ $total_users }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-success text-white">
                        <div class="card-body " style="height: 100px" >
                            <h5>Total Orders: {{ $total_orders }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-info text-white">
                        <div class="card-body">
                            <h5>Completed Orders: {{ $orders_completed }}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card bg-warning text-white">
                        <div class="card-body">
                            <h5>Total Products: {{ $total_products }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-danger text-white">
                        <div class="card-body">
                            <h5>Total Categories: {{ $total_categories }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-danger text-white">
                        <div class="card-body">
                            <h5>Pending Orders: {{ $pending_orders }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
