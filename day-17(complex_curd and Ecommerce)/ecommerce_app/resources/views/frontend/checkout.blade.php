@extends('layouts.front')
@section('title')
    Checkout Page
@endsection
@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0 p-20">
                <a href=" {{ url('/') }} ">
                    Home
                </a> /
                <a href="{{ url('checkout') }}">
                    Checkout
                </a>
            </h6>
        </div>
    </div>

    <div class="container mt-3">
        <form action="{{ url('place_order') }}" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6>Basic Details</h6>
                            <hr>
                            <div class="row checkout-form">
                                <div class="col-md-6 mt-3">
                                    <label for="">First Name</label>
                                    <input type="text" value="{{ Auth::user()->name }}" class="form-control"
                                        name="fname" placeholder="Enter First Name">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Last Name</label>
                                    <input type="text" value="{{ Auth::user()->lname }}" class="form-control"
                                        name="lname" placeholder="Enter Last Name">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Email</label>
                                    <input type="text" value="{{ Auth::user()->email }}" class="form-control"
                                        name="email" placeholder="Enter Email">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Phone Number</label>
                                    <input type="text" value="{{ Auth::user()->phone }}" class="form-control"
                                        name="phone" placeholder="Enter Phone Number">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Address 1</label>
                                    <input type="text" value="{{ Auth::user()->address1 }}" class="form-control"
                                        name="address1" placeholder="Enter Address">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Address 2</label>
                                    <input type="text" value="{{ Auth::user()->address2 }}" class="form-control"
                                        name="address2" placeholder="Enter Address 2">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">City</label>
                                    <input type="text" value="{{ Auth::user()->city }}" class="form-control"
                                        name="city" placeholder="Enter City">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">State</label>
                                    <input type="text" value="{{ Auth::user()->state }}" class="form-control"
                                        name="state" placeholder="Enter State">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Country</label>
                                    <input type="text" value="{{ Auth::user()->country }}" class="form-control"
                                        name="country" placeholder="Enter Country">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Pin Code</label>
                                    <input type="text" value="{{ Auth::user()->pincode }}" class="form-control"
                                        name="pincode" placeholder="Enter Pin Code">
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
                            @if (count($cartitems) > 0)
                                <table class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Selling Price</th>
                                            <th>Total Price</th> <!-- New column for total price -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $grandTotal = 0; @endphp <!-- Initialize grand total -->
                                        @foreach ($cartitems as $item)
                                            @php
                                                $itemTotal = $item->prod_qty * $item->products->selling_price;
                                                $grandTotal += $itemTotal; // Add item total to grand total
                                            @endphp
                                            <tr>
                                                <td>{{ $item->products->name }}</td>
                                                <td>{{ $item->prod_qty }}</td>
                                                <td>{{ $item->products->selling_price }}</td>
                                                <td>{{ $itemTotal }}</td> <!-- Display item total -->
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div>
                                    <h4>Grand Total: Rs.{{ $grandTotal }}</h4>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-primary float-end">Place Order</button>
                            @else
                                <h4 class="text-center">No Products in cart <i class="fa fa-shopping-cart"></i></h4>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
