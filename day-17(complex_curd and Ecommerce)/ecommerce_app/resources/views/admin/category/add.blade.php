@extends('layouts.admin')
@section('title')
    Add Category
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Add Category</h4>
    </div>
    <div class="card-body">
        <form action="{{url('insert-category')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" id="" style="border: 1px solid #ccc;">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Slug</label>
                    <input type="text" class="form-control" name="slug" id="" style="border: 1px solid #ccc;">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Description</label>
                    <textarea name="description" style="border: 1px solid #ccc;" class="form-control" rows="3" style="border: 1px solid #ccc;"></textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" name="status">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Popular</label>
                    <input type="checkbox" name="popular">
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
