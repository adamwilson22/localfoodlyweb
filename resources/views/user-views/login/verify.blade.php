@extends('user-views.layouts.sign')

@section('content')
    <!-- Card -->
    <div class="">
        <div class="">
            <div class="">
                <div class="mb-5">
                    <h1 class="display-4">CUSTOMER OTP VERIFIED</h1>

                </div>
            </div>
            @include('user-views.layouts.flash-message')
            <!-- Form -->
            <form class="login_form" action="{{ route('otp.verified') }}" method="post">
                @csrf
                <!-- Form Group -->
                <div class="js-form-message form-group">
                    <label class="input-label" for="signinSrEmail">Enter Your Email</label>
                    <input type="email" class="form-control form-control-lg" name="email"
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

            </form>
            <!-- End Form -->


        </div>


    </div>
    <!-- End Card -->
@endsection
