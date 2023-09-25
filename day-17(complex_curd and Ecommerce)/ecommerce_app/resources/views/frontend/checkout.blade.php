@extends('layouts.front')
@section('title')
    Checkout Page
@endsection
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h6>Basic Details</h6>
                        <hr>
                        <div class="row checkout-form">
                            <div class="col-md-6 mt-3">
                                <label for="">First Name</label>
                                <input type="text" class="form-control" name="first_name" placeholder="Enter First Name">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Enter Email">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Phone Number</label>
                                <input type="text" class="form-control" name="phone_number" placeholder="Enter Phone Number">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Address 1</label>
                                <input type="text" class="form-control" name="address_1" placeholder="Enter Address">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Address 2</label>
                                <input type="text" class="form-control" name="address_2" placeholder="Enter Address 2">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">City</label>
                                <input type="text" class="form-control" name="city" placeholder="Enter City">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">State</label>
                                <input type="text" class="form-control" name="state" placeholder="Enter State">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h6>Order Details</h6>
                        <hr>
                        <table class="table table-hover table-striped table-bordered">
                            <tbody>
                                <thead>
                                    <th>Product Name</th>
                                    <th>Quantitty</th>
                                    <th>Selling Price</th>
                                </thead>
                                @foreach ($cartitems as $item)
                                    <tr>
                                        <td>{{-- below products is name of function defined in cart model --}}
                                        {{ $item->products->name }}</td>
                                        <td>{{ $item->prod_qty }}</td>
                                        <td>{{ $item->products->selling_price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <button class="btn btn-primary float-end">Ploace Order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
