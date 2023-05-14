@extends('user-views.layouts.sign')

@section('content')
    <!-- Card -->
    <div class="">
        <div class="">
            <div class="">
                <div class="mb-5">
                    <h1 class="display-4">CUSTOMER OTP VERIFIED</h1>
                    <div class="mb-8">
                        <p class="">Check your email for otp</p>
                        
                    </div>
                </div>
            </div>
            
            @include('user-views.layouts.flash-message')
            <!-- Form -->
            <form class="login_form" action="{{ route('otp.verified') }}" method="post" id = "formId">
                @csrf
                <!-- Form Group -->
                <div class="js-form-message form-group">
                    <label class="input-label" for="signinSrEmail">Enter Your Email</label>
                    <input type="text" class="form-control form-control-lg"  disabled value="{{$email}}"
                        placeholder="Enter Your Email Here" required> 

                    <input type="hidden" class="form-control form-control-lg" name="email"  value="{{$email}}"
                        placeholder="Enter Your Email Here" required> 

                </div>
                <!-- End Form Group -->

                <!-- Form Group -->
                <div class="js-form-message form-group">
                    <label class="input-label" for="signinSrEmail">Enter Your OTP Number</label>
                    <input type="number" class="form-control form-control-lg" name="otp"
                        placeholder="Enter Your OTP Number Here" required>
                </div>
                <!-- End Form Group -->

                <button type="submit" class="btn btn-lg btn-primary mb-5">Submit</button>
                <button type="button"id="resendOtpButton" class="btn btn-lg btn-primary mb-5">Resend OTP</button>

            </form>
            <!-- End Form -->


        </div>


    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- example.blade.php -->
<script>
    $(document).ready(function() {
        $('#resendOtpButton').click(function() {
            console.log("OTP Clicked");
            $.ajax({
            url: '/resend-otp',
            type: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
            },
            success: function(response) {
                if (response.success) {
                    toastr.success(response.message);
                }
            }
        });
        });
    });
</script>

    <!-- End Card -->
@endsection
