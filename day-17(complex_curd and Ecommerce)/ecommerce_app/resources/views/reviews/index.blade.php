@extends('layouts.front')
@section('title')
    Review
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if($verified_purchase)
                        <h5>You are writing a review for {{ $product->name }} </h5>
                        <form action="0" method="POST">
                            <input type="hidden" name="product_id" value="{{ $product->name }}" >
                            <textarea name="user_review" class="form-control" rows="5" placeholder="Write a review" ></textarea>
                            <button class="btn btn-primary">Submit a Review</button>
                        </form>
                        @else
                        <div class="alert alert-danger">
                            <h5>You are not eligible to review this product</h5>
                            <p>
                                For the trustworthiness of the reviews, only customers who purchased this product can write a revieew about the product
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
