@extends('layouts.admin')
@section('title')
    Registered Users
@endsection
@section('content')
    <div class="card">
        @if (session('status'))
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
            <h4> Registered Users</h4>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>
                                <div style="display: inline-block;">
                                    <a href="{{ url('view_user/' . $user->id) }}" class="btn btn-primary btn-sm">View</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
