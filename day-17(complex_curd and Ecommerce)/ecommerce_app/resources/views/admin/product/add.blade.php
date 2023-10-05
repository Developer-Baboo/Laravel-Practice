@extends('layouts.admin')
@section('title')
    Add Product
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Add Product</h4>
    </div>
    <div class="card-body">
        <form action="{{url('insert-product')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <select class="form-select" name="cate_id">
                        <option value="">Select a Category</option>
                        @foreach ($categories as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                      </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" id="" style="border: 1px solid #ccc;">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Slug</label>
                    <input type="text" class="form-control" name="slug" id="" style="border: 1px solid #ccc;">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Small Description</label>
                    <textarea name="small_description" style="border: 1px solid #ccc;" class="form-control" rows="3" style="border: 1px solid #ccc;"></textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Description</label>
                    <textarea name="description" style="border: 1px solid #ccc;" class="form-control" rows="3" style="border: 1px solid #ccc;"></textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Original Price</label>
                    <input type="number" name="original_price" style="border: 1px solid #ccc;">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Selling Price</label>
                    <input type="number" name="selling_price" style="border: 1px solid #ccc;">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Tax</label>
                    <input type="number" name="tax" style="border: 1px solid #ccc;">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Quantity</label>
                    <input type="number" name="qty" style="border: 1px solid #ccc;">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" name="status">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Trending</label>
                    <input type="checkbox" name="trending">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" name="meta_title" id="" style="border: 1px solid #ccc;">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta KeyWords</label>
                    <textarea name="meta_keywords" class="form-control" rows="3" style="border: 1px solid #ccc;"></textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="3" style="border: 1px solid #ccc;"></textarea>
                </div>
                <div class="col-md-12">
                    <input type="file" name="image" class="form-control" >
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
