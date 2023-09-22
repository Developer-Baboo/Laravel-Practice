@extends('layouts.front')

@section('title')
    Category Page
@endsection
@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <h3>All Categories</h3>
                    @foreach ($category as $cate )
                        <div class="col-md-3 mb-3">
                            <div class="card rounded border-primary">
                                <div class="d-flex justify-content-center align-items-center" style="height: 200px;">
                                    <img class="w-100 h-100" src="{{ asset('assets/uploads/category/'.$cate->image) }}" alt="Category Image" style="object-fit: cover;">
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $cate->name }}</h5>
                                    <p>
                                        {{$cate->description}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
