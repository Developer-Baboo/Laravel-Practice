@extends('layouts.admin')
@section('content')
<div class="card">
    @if(session('status'))
            <div id="success-message11" class="alert alert-success">{{ session('status') }}</div>
            @endif
        <script>
            // Wait for the document to load
            document.addEventListener("DOMContentLoaded", function() {
                // Get the success message element
                var successMessage = document.getElementById('success-message11');

                // Check if the success message exists
                if (successMessage) {
                    // Hide the success message after 2 seconds
                    setTimeout(function() {
                        successMessage.style.display = 'none';
                    }, 2000); // 2000 milliseconds (2 seconds)
                }
            });
        </script>
    <div class="card-header">
        <h4>Product Page</h4>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Original Price</th>
                    <th>Selling Price</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        {{-- category name is coming via foreign key relations in Product model category function --}}
                        <td>{{$item->category->name}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->original_price}}</td>
                        <td>{{$item->selling_price}}</td>
                        <td>
                            <img style="width: 50px; height: 50px; border-radius: 50%;" src="{{ asset('assets/uploads/product/'.$item->image) }}" alt="no image">
                        </td>
                        <td>
                            <div style="display: inline-block;">
                                {{-- {{ url('edit-prodict/'.$item->id) }} --}}
                                <a href="#" class="btn btn-primary btn-sm">Edit</a>
                            </div>
                            <div style="display: inline-block;">
                                {{-- action="{{ route('product.destroy', ['id' => $item->id]) }}" --}}
                                <form method="POST" >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
