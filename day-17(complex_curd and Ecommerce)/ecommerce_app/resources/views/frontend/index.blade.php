@extends('layouts.front')

@section('title')
    Welcome to E-Shop
@endsection
@section('content')
@include('layouts.inc.slider')

<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>Freatured Products</h2>
            {{-- owl code start --}}
            <div class="owl-carousel freatured-carousel owl-theme">
                @foreach ($featured_products as $prod)
                    <div class="item">
                        <div class="card rounded border-primary">
                            <div class="d-flex justify-content-center align-items-center" style="height: 200px;">
                                <img class="w-100 h-100" src="{{ asset('assets/uploads/product/'.$prod->image) }}" alt="Product Image" style="object-fit: cover;">
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $prod->name }}</h5>
                                <span class="float-start">{{ $prod->selling_price}}</span>
                                <span class="float-end"><s>{{ $prod->original_price }}</s></span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- owl code end --}}
        </div>
    </div>
</div>
@endsection


{{-- Ownl Carousel --}}
@section('scripts')
<script>
    $('.freatured-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
</script>
@endsection
