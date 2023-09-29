@extends('layouts.front')
@section('title')
    Review
@endsection
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if($verified_purchase)
                        <h5>You are writing a review for {{ $product->name }} </h5>
                        <form action="{{ url('/add_review') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id}}" >
                            <textarea name="user_review" class="form-control" rows="5" placeholder="Write a review" ></textarea>
                            <button class="btn btn-primary mt-3">Submit a Review</button>
                        </form>
                        @else
                        <div class="alert alert-danger">
                            <h5>You are not eligible to review this product</h5>
                            <p>
                                For the trustworthiness of the reviews, only customers who purchased this product can write a revieew about the product
                            </p>
                            <a href="{{ url('home') }}" class="btn btn-warning mt-3" >Go To Home Page</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
