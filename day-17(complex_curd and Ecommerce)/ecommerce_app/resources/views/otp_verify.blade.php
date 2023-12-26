@extends('layouts.front')
@section('title')
    OTP Verify Page
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
{{-- action="{{ route('verify') }}" --}}
                    <div class="card-body">
                        <form id="verifyForm" method="POST">
                            @csrf

                            <div class="row mb-3">
                                <label for="otp"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Otp') }}</label>

                                <div class="col-md-6">
                                    <input id="otp" type="number"!
                                        class="form-control @error('name') is-invalid @enderror" name="otp"
                                        value="{{ old('otp') }}" required autocomplete="otp" autofocus>

                                    @error('otp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" id="verifyButton" class="btn btn-primary">
                                        {{ __('Verify') }}
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
                var otpValue = $('#otp').val()
                // Check if any of the fields is empty
                var anyFieldEmpty = otpValue === '';

                // Enable or disable the Register button based on the condition
                $('button[type="submit"]').prop('disabled', anyFieldEmpty);
            });
        });
    </script>
@endsection
