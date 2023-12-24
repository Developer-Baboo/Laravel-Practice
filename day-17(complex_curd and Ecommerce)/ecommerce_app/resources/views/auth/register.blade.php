@extends('layouts.front')
@section('title')
    Register Page
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form id="registrationForm" method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"!
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div id="email-error-message" class="text-danger"></div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" id="registerButton" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        {{--  --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // Disable the Register button initially
            $('button[type="submit"]').prop('disabled', true);

            // Add an event listener to input fields
            $('input').on('input', function() {
                // Get the values of all input fields
                var nameValue = $('#name').val();
                var emailValue = $('#email').val();
                var passwordValue = $('#password').val();
                var confirmPasswordValue = $('#password-confirm').val();

                // Check if any of the fields is empty
                var anyFieldEmpty = nameValue === '' || emailValue === '' || passwordValue === '' ||
                    confirmPasswordValue === '';

                // Enable or disable the Register button based on the condition
                $('button[type="submit"]').prop('disabled', anyFieldEmpty);
            });
        });



        $(document).ready(function() {
            // Add an event listener to the form submission
            $('#registrationForm').submit(function(event) {
                // Prevent the default form submission
                event.preventDefault();

                // Retrieve user information from the form
                var name = $('#name').val();
                var email = $('#email').val();

                // Push the information to the dataLayer
                dataLayer.push({
                    'event': 'registrationCompleted',
                    'user': {
                        'name': name,
                        'email': email
                    }
                });
            });
        });


        $(document).ready(function () {
        $("#email").focusout(function () {
            var email = $(this).val();

            // Make an AJAX request to check if the email exists
            $.ajax({
                type: "POST",
                url: "/check-email", // Replace with your actual route or endpoint
                data: {
                    email: email
                },
                success: function (response) {
                    if (response.exists) {
                        $("#email-error-message").text("This email already exists in the database.");
                    } else {
                        $("#email-error-message").text("");
                    }
                },
                error: function (error) {
                    console.error("Error checking email existence:", error);
                }
            });
        });
    });



    </script>
@endsection
