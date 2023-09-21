@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Product</h4>
    </div>
    <div class="card-body">

        <form action="{{url('update-product/'.$products->id)}}" method="POST" enctype="multipart/form-data">
            @method('PUT');
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="">Category</label>
                    <select class="form-select">
                        <option value="">Choose Category</option>
                        @foreach ( $categories as $category )
                            <option value="{{ $category->category->id }}">
                                {{ $category->category->name }}
                            </option>
                        @endforeach
                            {{-- <option value="{{ $category->id }}" {{ $selectedCategoryId == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option> --}}
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Product Name</label>
                    <input type="text" class="form-control" name="name" id="" style="border: 1px solid #ccc;" value="{{$products->name}}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Slug</label>
                    <input type="text" class="form-control" name="slug" id="" style="border: 1px solid #ccc;" value="{{$products->slug}}">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Small Description</label>
                    <textarea name="small_description" style="border: 1px solid #ccc;" class="form-control" rows="3" style="border: 1px solid #ccc;">{{$products->small_description}}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Description</label>
                    <textarea name="description" style="border: 1px solid #ccc;" class="form-control" rows="3" style="border: 1px solid #ccc;">{{$products->description}}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Original Price</label>
                    <input type="number" name="original_price" style="border: 1px solid #ccc;"  value="{{$products->original_value}}" >
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Selling Price</label>
                    <input type="number" name="selling_price" style="border: 1px solid #ccc;"  value="{{$products->selling_price}}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Tax</label>
                    <input type="number" name="tax" style="border: 1px solid #ccc;"  value="{{$products->tax}}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Quantity</label>
                    <input type="number" name="qty" style="border: 1px solid #ccc;"  value="{{$products->qty}}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" name="status" {{$products->status == "1" ? 'checked': ''}}>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Trending</label>
                    <input type="checkbox" name="trending" {{$products->trending == "1" ? 'checked': ''}}>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" name="meta_title" id="" style="border: 1px solid #ccc;"  value="{{$products->met_title}}">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta KeyWords</label>
                    <textarea name="meta_keywords" class="form-control" rows="3" style="border: 1px solid #ccc;">
                        {{$products->meta_keywords}}
                    </textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="3" style="border: 1px solid #ccc;">
                        {{$products->meta_description}}
                    </textarea>
                </div>
                @if ($category->image)
                    <img style="width: 50px; height: 50px; border-radius: 50%;" src="{{ asset('/assets/uploads/product/'.$products->image) }}" alt="Product image">
                @endif
                <div class="col-md-12">
                    <input type="file" name="image" class="form-control" >
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
