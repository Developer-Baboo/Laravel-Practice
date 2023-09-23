@extends('layouts.front')
@section('title')
{{$category->name}}
@endsection
@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0"><a href=" {{ url('category')}}  ">Collection</a> / {{$category->name}}</h6>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>{{$category->name}}</h2>
                @foreach ($products as $prod)
                    <div class="col-md-3 mb-3">
                        <div class="card rounded border-primary">
                            <a href="{{ url('category/'.$category->slug.'/'.$prod->slug) }}">
                                <div class="d-flex justify-content-center align-items-center" style="height: 200px;">
                                    <img class="w-100 h-100" src="{{ asset('assets/uploads/product/'.$prod->image) }}" alt="Product Image" style="object-fit: cover;">
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $prod->name }}</h5>
                                    <span class="float-start">{{ $prod->selling_price}}</span>
                                    <span class="float-end"><s>{{ $prod->original_price }}</s></span>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
        </div>
    </div>
</div>
@endsection

