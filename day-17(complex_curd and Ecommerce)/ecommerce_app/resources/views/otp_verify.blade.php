@extends('layouts.front')
@section('title')
    OTP Verify Page
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <p id="message_error" style="color:red;"></p>
                    <p id="message_success" style="color:green;"></p>
                    {{-- action="{{ route('verify') }}" --}}
                    <div class="card-body">
                        <form method="GET" id="verificationForm">

                            {{--

                                <p id="message_error" style="color:red;"></p>
<p id="message_success" style="color:green;"></p>
<form method="post" id="verificationForm">
    @csrf
    <input type="hidden" name="email" value="{{ $email }}">
    <input type="number" name="otp" placeholder="Enter OTP" required>
    <br><br>
    <input type="submit" value="Verify">

</form>

<p class="time"></p>

<button id="resendOtpVerification">Resend Verification OTP</button>
                                --}}
                            @csrf

                            <div class="row mb-3">
                                <label for="otp"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Otp') }}</label>

                                <div class="col-md-6">
                                    <input type="hidden" name="email" value="{{ $email }}">
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
                                    {{-- <button type="submit" id="verifyButton" class="btn btn-primary">
                                        {{ __('Verify') }}
                                    </button> --}}
                                    <input type="submit" class="btn btn-primary" value="Verify">
                                </div>
                            </div>
                        </form>
                        <p class="time"></p>
                        {{--  --}}
                        <button id="resendOtpVerification">Resend Verification OTP</button>
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


            $('#verificationForm').submit(function(e) {
                e.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('verifiedOtp') }}",
                    type: "POST",
                    data: formData,
                    success: function(res) {
                        if (res.success) {
                            alert(res.msg);
                            window.open("/", "_self");
                        } else {
                            $('#message_error').text(res.msg);
                            setTimeout(() => {
                                $('#message_error').text('');
                            }, 3000);
                        }
                    }
                });

            });

            $('#resendOtpVerification').click(function() {
                $(this).text('Wait...');
                var userMail = @json($email);

                $.ajax({
                    url: "{{ route('resendOtp') }}",
                    type: "GET",
                    data: {
                        email: userMail
                    },
                    success: function(res) {
                        $('#resendOtpVerification').text('Resend Verification OTP');
                        if (res.success) {
                            timer();
                            $('#message_success').text(res.msg);
                            setTimeout(() => {
                                $('#message_success').text('');
                            }, 3000);
                        } else {
                            $('#message_error').text(res.msg);
                            setTimeout(() => {
                                $('#message_error').text('');
                            }, 3000);
                        }
                    }
                });

            });


        });

        function timer() {
            var seconds = 30;
            var minutes = 1;

            var timer = setInterval(() => {

                if (minutes < 0) {
                    $('.time').text('');
                    clearInterval(timer);
                } else {
                    let tempMinutes = minutes.toString().length > 1 ? minutes : '0' + minutes;
                    let tempSeconds = seconds.toString().length > 1 ? seconds : '0' + seconds;

                    $('.time').text(tempMinutes + ':' + tempSeconds);
                }

                if (seconds <= 0) {
                    minutes--;
                    seconds = 59;
                }

                seconds--;

            }, 1000);
        }

        timer();
    </script>
@endsection
