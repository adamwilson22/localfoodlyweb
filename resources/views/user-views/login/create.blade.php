@extends('user-views.layouts.sign')

@section('content')
    <!-- Card -->
    <div class="">
        <div class="">
            <div class="">
                <div class="mb-5">
                    <!-- <h1 class="display-4">{{ __('messages.restaurant') }} {{ __('messages.sign_in') }}</h1> -->
                    <h1 class="display-4">Sign Up</h1>
                    <p>Please enter your email address to login</p>
                </div>
            </div>
            <!-- Form -->
            <form class="login_form" action="{{ route('signup.page') }}" method="post">
                @csrf
                <!-- Form Group -->

                <div class="js-form-message form-group">
                    <label class="input-label" for="signinSrEmail">Your First Name</label>
                    <input type="text" class="form-control form-control-lg" name="f_name" id="f_name"
                        placeholder="Enter Your First Name Here">
                    @if ($errors->has('f_name'))
                        <span class="text-danger">{{ $errors->first('f_name') }}</span>
                    @endif
                </div>
                <div class="js-form-message form-group">
                    <label class="input-label" for="signinSrEmail">Your Last Name</label>
                    <input type="text" class="form-control form-control-lg" name="l_name" id="l_name"
                        placeholder="Enter Your Last Name Here">
                    @if ($errors->has('l_name'))
                        <span class="text-danger">{{ $errors->first('l_name') }}</span>
                    @endif
                </div>
                <!-- End Form Group -->
                <!-- Form Group -->

                <div class="js-form-message form-group">
                    <label class="input-label" for="signinSrEmail">Your Email</label>

                    <input type="email" class="form-control form-control-lg" name="email" id="signinSrEmail"
                        placeholder="Enter Your Email Here" required>
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <!-- End Form Group -->

                <!-- Form Group -->
                <div class="js-form-message form-group">
                    <label class="input-label" for="signupSrPassword" tabindex="0">
                        <span class="d-flex justify-content-between align-items-center">
                            {{ __('messages.password') }}
                        </span>
                    </label>

                    <div class="input-group input-group-merge">
                        <input type="password" class="js-toggle-password form-control form-control-lg" name="password"
                            id="signupSrPassword" placeholder="5+ characters required" aria-label="8+ characters required"
                            required data-msg="{{ __('messages.invalid_password_warning') }}"
                            data-hs-toggle-password-options='{
                                                         "target": "#changePassTarget",
                                                "defaultClass": "tio-hidden-outlined",
                                                "showClass": "tio-visible-outlined",
                                                "classChangeTarget": "#changePassIcon"
                                                }'>
                        <div id="changePassTarget" class="input-group-append">
                            <a class="input-group-text" href="javascript:">
                                <i id="changePassIcon" class="tio-visible-outlined"></i>
                            </a>
                        </div>
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                </div>
                <!-- End Form Group -->

                <!-- Checkbox -->
                {{-- <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="termsCheckbox"
                                               name="remember">
                                        <label class="custom-control-label text-muted" for="termsCheckbox">
                                            {{__('messages.remember_me')}}
                                        </label>
                                    </div>
                                </div> --}}
                <!-- End Checkbox -->



                <button type="submit" class="btn btn-lg btn-primary mb-5">Sign up</button>

                {{-- <p>{{__('messages.want_to_login_your_admin_account')}}
                                        <a href="{{route('admin.auth.login')}}">
                                            {{__('messages.admin_login')}}
                                        </a>
                                    </p> --}}
                <p>
                    If You Have An Account?
                    <a href="{{ route('login.page') }}">
                        Sign In
                    </a>
                </p>
            </form>
            <!-- End Form -->


        </div>


    </div>
    <!-- End Card -->
@endsection
