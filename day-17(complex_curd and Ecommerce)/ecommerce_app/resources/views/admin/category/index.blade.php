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

        <h4>Category Page</h4>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->description}}</td>
                        <td>
                            <img style="width: 50px; height: 50px; border-radius: 50%;" src="{{ asset('assets/uploads/category/'.$item->image) }}" alt="no image">
                        </td>
                        <td>
                            <div style="display: inline-block;">
                                <a href="{{ url('edit/pro/'.$item->id) }}" class="btn btn-primary">Edit</a>
                            </div>
                            <div style="display: inline-block;">
                                <form method="POST" action="{{ route('category.destroy', ['id' => $item->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
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
