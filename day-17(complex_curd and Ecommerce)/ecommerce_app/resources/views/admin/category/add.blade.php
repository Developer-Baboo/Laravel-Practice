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

            <form id="formid" action="{{ url('insert-category') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" id="name"
                            style="border: 1px solid #ccc;">
                        @error('name')
                            <div style="color:red" class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" name="slug" id="slug"
                            style="border: 1px solid #ccc;">
                        @error('slug')
                            <div style="color:red" class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="description" style="border: 1px solid #ccc;" class="form-control" rows="3"
                            style="border: 1px solid #ccc;" id="description"></textarea>
                        @error('description')
                            <div style="color:red" class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" name="status">
                        @error('status')
                            <div style="color:red" class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Popular</label>
                        <input type="checkbox" name="popular">
                        @error('popular')
                            <div style="color:red" class="text-danger">{{ $message }}</div>
                        @enderror
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
                        <input type="file" name="image" class="form-control" id="image">
                    </div>
                    @error('image')
                        <div style="color:red" class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="col-md-12">
                        <button type="button" class="btn btn-primary btn-sm" id="submitBtn">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            alert("Working Jquery ");

            $('#formid').validate({
                rules: {
                    name: {
                        required: true
                    },
                    slug: {
                        required: true
                    },
                    description: {
                        required: true
                    },
                    image: {
                        required: true
                    }
                },
                messages: {
                    name: {
                        required: "Please enter a name."
                    },
                    slug: {
                        required: "Please enter a slug."
                    },
                    description: {
                        required: "Please enter a description."
                    },
                    image: {
                        required: "Please select an image."
                    }
                },
                submitHandler: function(form, event) {
                    alert("working inside submit handler");
                    // Prevent the default form submission
                    event.preventDefault();

                    // Perform AJAX form submission
                    $.ajax({
                        url: $(form).attr('action'),
                        type: $(form).attr('method'),
                        data: new FormData(form),
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            alert("Success");
                            window.location.href = '/categories';
                        },
                        error: function(error) {
                            if (error.responseJSON && error.responseJSON.errors) {
                                // Clear previous error messages
                                $('.text-danger').remove();

                                // Display validation errors below each corresponding input field
                                $.each(error.responseJSON.errors, function(field,
                                    messages) {
                                    $('[name="' + field + '"]').after(
                                        '<div class="text-danger">' + messages
                                        .join('<br>') + '</div>');
                                });
                            } else {
                                // Handle other types of errors (e.g., server errors)
                                alert("An error occurred. Please try again.");
                            }
                        }
                    });
                }
            });

            $('#submitBtn').on('click', function(event) {
                $('#formid').submit(); // Trigger the validation and submitHandler
            });
        });
    </script>
@endsection
