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
                                    <input type="text" value="{{ Auth::user()->name }}" class="form-control firstname"
                                        name="fname" placeholder="Enter First Name">
                                    <span id="fname_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Last Name</label>
                                    <input type="text" value="{{ Auth::user()->lname }}" class="form-control lastname"
                                        name="lname" placeholder="Enter Last Name">
                                    <span id="lname_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Email</label>
                                    <input type="text" value="{{ Auth::user()->email }}" class="form-control email"
                                        name="email" placeholder="Enter Email">
                                    <span id="email" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Phone Number</label>
                                    <input type="text" value="{{ Auth::user()->phone }}" class="form-control phone"
                                        name="phone" placeholder="Enter Phone Number">
                                    <span id="phone" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Address 1</label>
                                    <input type="text" value="{{ Auth::user()->address1 }}" class="form-control address1"
                                        name="address1" placeholder="Enter Address">
                                    <span id="address1" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Address 2</label>
                                    <input type="text" value="{{ Auth::user()->address2 }}" class="form-control address2"
                                        name="address2" placeholder="Enter Address 2">
                                    <span id="address2" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">City</label>
                                    <input type="text" value="{{ Auth::user()->city }}" class="form-control city"
                                        name="city" placeholder="Enter City">
                                    <span id="city" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">State</label>
                                    <input type="text" value="{{ Auth::user()->state }}" class="form-control state"
                                        name="state" placeholder="Enter State">
                                    <span id="state" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Country</label>
                                    <input type="text" value="{{ Auth::user()->country }}" class="form-control country"
                                        name="country" placeholder="Enter Country">
                                    <span id="country" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Pin Code</label>
                                    <input type="text" value="{{ Auth::user()->pincode }}" class="form-control pincode"
                                        name="pincode" placeholder="Enter Pin Code">
                                    <span id="pincode" class="text-danger"></span>
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
                                <button type="submit" class="btn btn-success w-100 float-end">Place Order | COD </button>
                                <button type="button" class="btn btn-primary w-100 100 mt-3 float-end razorpay_btn">Pay
                                    With RazorPay </button>
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
