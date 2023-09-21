@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Category</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('update-category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="">Name</label>
                    <input type="text" class="form-control" value="{{$category->name}}" name="name" id="" style="border: 1px solid #ccc;">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Slug</label>
                    <input type="text" class="form-control" value="{{$category->slug}}" name="slug" id="" style="border: 1px solid #ccc;">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Description</label>
                    <textarea name="description" style="border: 1px solid #ccc;" class="form-control" rows="3" style="border: 1px solid #ccc;">{{$category->description}}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" name="status" {{$category->status == "1" ? 'checked': ''}} >
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Popular</label>
                    <input type="checkbox" name="popular" {{$category->popular == "1" ? 'checked': ''}}>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" name="meta_title" id="" style="border: 1px solid #ccc;" value="{{$category->meta_title}}" >
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta KeyWords</label>
                    <textarea name="meta_keywords" class="form-control" rows="3" style="border: 1px solid #ccc;">{{$category->meta_keywords}}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="3" style="border: 1px solid #ccc;">{{$category->meta_descrip}}</textarea>
                </div>
                @if ($category->image)
                    <img src="{{ asset('/assets/uploads/category/'.$category->image) }}" alt="Category">
                @endif
                <div class="col-md-12">
                    <input type="file" name="image" class="form-control" >
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
