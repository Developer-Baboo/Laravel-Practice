@extends('layouts.front')
@section('title')
    My Cart
@endsection
@section('content')
<div class="py-11 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href=" {{ url('/')}} ">
                Home
            </a> /
            <a href="{{ url('cart') }}">
                Cart
            </a>
        </h6>
    </div>
</div>

<div class="container my-3">
    <div class="card shadow">
        <div class="card-body">
            @foreach ($cartitems as $item )
                <div class="row product_data">
                    <div class="col-md-2">
                         {{-- //below products is the name of functions defined in cart model --}}
                        <img src=" {{ asset('assets/uploads/product/'.$item->products->image) }} " height="50px" width="50px"  alt="Image Here">
                    </div>
                    <div class="col-md-5">
                        {{-- //below products is the name of functions defined in cart model --}}
                        <h6> {{ $item->products->name }} </h6>
                    </div>
                    <div class="col-md-3">
                        <input type="hidden" name="" class="prod_id">
                        <label for="Quantity">Quantity</label>
                        <div class="input-group text-center mb-3" style="width:130px;">
                            <button class="input-group-text decrement-btn">-</button>
                            <input type="text" name="quantity" class="form-control qty-input text-center" value="{{ $item->prod_qty }}" id="">
                            <button class="input-group-text increment-btn">+</button>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <h6>Remove</h6>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection