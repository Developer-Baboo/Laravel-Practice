@extends('layouts.admin')
@section('content')
<div class="card" style="width:50%; margin: 0 auto;" >
    <div class="card-body">
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
        <h1>Baboo Coder</h1>
    </div>
</div>
@endsection
