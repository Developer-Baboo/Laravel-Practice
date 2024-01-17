@extends('layouts.admin')
@section('title')
    Add Product
@endsection
@section('content')
    <div id="loading-overlay" style="display: none;">
        <div id="loading-spinner"></div>
    </div>
    <div class="card">
        <div class="card-header">
            <h4>Add Product</h4>
        </div>
        <div class="card-body">
            <form id="formid" action="{{ url('insert-product') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <select class="form-select" name="cate_id">
                            <option value="">Select a Category</option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('cate_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" id=""
                            style="border: 1px solid #ccc;">
                        @error('name')
                            <div style="color:red" class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" name="slug" id=""
                            style="border: 1px solid #ccc;">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Small Description</label>
                        <textarea name="small_description" style="border: 1px solid #ccc;" class="form-control" rows="3"
                            style="border: 1px solid #ccc;"></textarea>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="description" style="border: 1px solid #ccc;" class="form-control" rows="3"
                            style="border: 1px solid #ccc;"></textarea>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Original Price</label>
                        <input type="number" name="original_price" style="border: 1px solid #ccc;">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Selling Price</label>
                        <input type="number" name="selling_price" style="border: 1px solid #ccc;">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Tax</label>
                        <input type="number" name="tax" style="border: 1px solid #ccc;">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Quantity</label>
                        <input type="number" name="qty" style="border: 1px solid #ccc;">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="hidden" name="status" value="0">
                        <input type="checkbox" name="status" value="1" {{ old('status') ? 'checked' : '' }}>
                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Trending</label>
                        <input type="hidden" name="trending" value="0">
                        <input type="checkbox" name="trending" value="1" {{ old('trending') ? 'checked' : '' }}>
                        @error('trending')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" name="meta_title" id="" style="border: 1px solid #ccc;">
                        @error('meta_title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta KeyWords</label>
                        {{-- <textarea name="meta_keywords" class="form-control" rows="3" style="border: 1px solid #ccc;"></textarea> --}}
                        {{-- <textarea name="meta_keywords" class="form-control border-1" rows="3"></textarea> --}}
                        <textarea name="meta_keywords" class="form-control border" rows="3"></textarea>
                        @error('meta_keywords')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description" class="form-control" rows="3" style="border: 1px solid #ccc;"></textarea>
                        @error('meta_description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @php
        // dd('Executing...');
        // Clear old input and errors after displaying them
        Session::forget(['errors', 'old']);
    @endphp
    <script>
        $(document).ready(function() {
            $('#formid').validate({
                rules: {
                    cate_id: {
                        required: true
                    },
                    name: {
                        required: true
                    },
                    slug: {
                        required: true
                    },
                    small_description: {
                        required: true
                    },
                    description: {
                        required: true
                    },
                    original_price: {
                        required: true,
                        number: true,
                        min: 1
                    },
                    selling_price: {
                        required: true,
                        number: true,
                        min: 1
                    },
                    tax: {
                        required: true,
                        number: true,
                        min: 1
                    },
                    qty: {
                        required: true,
                        number: true,
                        min: 1
                    },
                    status: {
                        required: true
                    },
                    trending: {
                        required: true
                    },
                    // meta_title: {

                    // },
                    // meta_keywords: {
                    // },
                    // meta_description: {
                    //     // Add rules for the meta_description field if needed
                    //     // For example, if it's optional (nullable)
                    // },
                    image: {
                        required: true
                    }
                },
                messages: {
                    cate_id: {
                        required: "Please select a category."
                    },
                    name: {
                        required: "Please enter a name."
                    },
                    slug: {
                        required: "Please enter a slug."
                    },
                    small_description: {
                        required: "Please enter a small description."
                    },
                    description: {
                        required: "Please enter a description."
                    },
                    original_price: {
                        required: "Please enter the original price.",
                        number: "Please enter a valid number.",
                        min: "Please enter a number greater than or equal to 1."
                    },
                    selling_price: {
                        required: "Please enter the selling price.",
                        number: "Please enter a valid number.",
                        min: "Please enter a number greater than or equal to 1."
                    },
                    tax: {
                        required: "Please enter the tax.",
                        number: "Please enter a valid number.",
                        min: "Please enter a number greater than or equal to 1."
                    },
                    qty: {
                        required: "Please enter the quantity.",
                        number: "Please enter a valid number.",
                        min: "Please enter a number greater than or equal to 1."
                    },
                    status: {
                        required: "Please select the status."
                    },
                    trending: {
                        required: "Please select the trending option."
                    },
                    /* // Messages for optional fields
                    meta_title: {
                        // Custom message if needed
                    },
                    meta_keywords: {
                        // Custom message if needed
                    },
                    meta_description: {
                        // Custom message if needed
                    }, */
                    image: {
                        required: "Please select an image."
                    }
                },
                submitHandler: function(form) {
                    $(".loader").show();
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
                            // Handle success response

                            // Hide the loader
                            $(".loader").hide();
                            $('body').removeClass('blur-background');
                            window.location.href = '/products';
                        },
                        error: function(error) {
                            // Handle error response

                            // Hide the loader
                            $(".loader").hide();
                            // Remove blur class from body
                            $('body').removeClass('blur-background');
                            if (error.responseJSON && error.responseJSON.errors) {
                                // Display validation errors below each corresponding input field
                                $.each(error.responseJSON.errors, function(field,
                                    messages) {
                                    $('[name="' + field + '"]').after(
                                        '<div class="text-danger">' + messages
                                        .join('<br>') + '</div>');
                                });
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection
