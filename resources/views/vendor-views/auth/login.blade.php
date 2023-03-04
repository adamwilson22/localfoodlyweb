<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title>Sellers Login</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{asset('public/assets/admin')}}/css/vendor.min.css">
    <link rel="stylesheet" href="{{asset('public/assets/admin')}}/vendor/icon-set/style.css">
    <!-- CSS Front Template -->
    <link rel="stylesheet" href="{{asset('public/assets/admin')}}/css/theme.minc619.css?v=1.0">
    <link rel="stylesheet" href="{{asset('public/assets/admin')}}/css/toastr.css">
    <link rel="stylesheet" href="{{asset('public/assets/admin')}}/css/custom.css">
</head>

<body class="authpg">
<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main" class="main">
    <div class="bg-img-hero login-bg" style="background-image: url({{asset('public/assets/admin')}}/img/MaskGroup18.png);">
    </div>
    @php($systemlogo=\App\Models\BusinessSetting::where(['key'=>'logo'])->first()->value)
    <!-- Content -->
    <div class="container">
        
        <div class="row">
            <div class="col-lg-6 ml-auto">
                <div class="section-padding">
                    <a class="logo" href="javascript:">
                        <img class="z-index-2" src="{{asset('storage/app/public/business/'.$systemlogo)}}" alt="Image Description">
                    </a>
                    <!-- Card -->
                    <div class="">
                        <div class="">
                            <div class="">
                                <div class="mb-5">
                                    <!-- <h1 class="display-4">{{__('messages.restaurant')}} {{__('messages.sign_in')}}</h1> -->
                                    <h1 class="display-4">Sellers Login</h1>
                                    <p>
                                        Want To Login As Customer? <a href="{{route('login.page')}}"> Login Here</a>
                                    </p>
                                    {{-- <p>Please enter your phone number to login</p> --}}
                                </div>
                            </div>
                            <!-- Form -->
                            <form class="login_form" action="{{route('vendor.auth.login')}}" method="post" id="vendor_login_form">
                                @csrf
                                <!-- Form Group -->
                               
                                <div class="js-form-message form-group">
                                    <label class="input-label" for="signinSrEmail">Your Number</label>
    
                                    <input type="text" class="form-control form-control-lg" name="phone" id="signinSrEmail"
                                           tabindex="1" placeholder="+12223334444" aria-label="email@address.com"
                                           required data-msg="Please enter a phone number." pattern="^[+]{1}(?:[0-9\\-\\(\\)\\/\\.]\\s?){6, 15}[0-9]{1}$"
                                           >
                                </div>
                                <!-- End Form Group -->
    
                                <!-- Form Group -->
                                <div class="js-form-message form-group">
                                    <label class="input-label" for="signupSrPassword" tabindex="0">
                                        <span class="d-flex justify-content-between align-items-center">
                                          {{__('messages.password')}}
                                        </span>
                                    </label>
    
                                    <div class="input-group input-group-merge">
                                        <input type="password" class="js-toggle-password form-control form-control-lg"
                                               name="password" id="signupSrPassword" placeholder="5+ characters required"
                                               aria-label="8+ characters required" required
                                               data-msg="{{__('messages.invalid_password_warning')}}"
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
    
                             
                                
                                <button type="submit" class="btn btn-lg btn-primary mb-5">Sign in</button>
                               
                                {{-- <p>{{__('messages.want_to_login_your_admin_account')}}
                                        <a href="{{route('admin.auth.login')}}">
                                            {{__('messages.admin_login')}}
                                        </a>
                                    </p> --}}
                                <p>Don't Have An Account?
                                        <a href="{{route('vendor.auth.signup')}}">
                                            Sign Up
                                        </a>
                                    </p>
                            </form>
                            <!-- End Form -->
                         
                           
                        </div>
    
                    
                    </div>
                    <!-- End Card -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->
</main>
<!-- ========== END MAIN CONTENT ========== -->


<!-- JS Implementing Plugins -->
<script src="{{asset('public/assets/admin')}}/js/vendor.min.js"></script>

<!-- JS Front -->
<script src="{{asset('public/assets/admin')}}/js/theme.min.js"></script>
<script src="{{asset('public/assets/admin')}}/js/toastr.js"></script>
{!! Toastr::message() !!}

@if ($errors->any())
    <script>
        @foreach($errors->all() as $error)
        toastr.error('{{$error}}', Error, {
            CloseButton: true,
            ProgressBar: true
        });
        @endforeach
    </script>
@endif

<!-- JS Plugins Init. -->
<script>
    $(document).on('ready', function () {
        // INITIALIZATION OF SHOW PASSWORD
        // =======================================================
        $('.js-toggle-password').each(function () {
            new HSTogglePassword(this).init()
        });

        // INITIALIZATION OF FORM VALIDATION
        // =======================================================
        $('.js-validate').each(function () {
            $.HSCore.components.HSValidation.init($(this));
        });
        // $('#employee_login_form').hide();
        // $('#vendor_login_form').hide();
    });
    $('#owner_sign_in').on('click', function(){
        $('.signIn').hide();
        $('#employee_login_form').hide();
        $(this).hide();
        $('#employee_sign_in').show();
        $('#vendor_login_form').show();
    });
    $('#employee_sign_in').on('click', function(){
        $('.signIn').hide();
        $('#employee_login_form').show();
        $(this).hide();
        $('#owner_sign_in').show();
        $('#vendor_login_form').hide();
    });
</script>

{{-- recaptcha scripts start --}}
@if(isset($recaptcha) && $recaptcha['status'] == 1)
    <script type="text/javascript">
        var onloadCallback = function () {
            grecaptcha.render('recaptcha_element', {
                'sitekey': '{{ \App\CentralLogics\Helpers::get_business_settings('recaptcha')['site_key'] }}'
            });
        };

        var onloadCallback2 = function () {
            grecaptcha.render('recaptcha_element2', {
                'sitekey': '{{ \App\CentralLogics\Helpers::get_business_settings('recaptcha')['site_key'] }}'
            });
        };

    </script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback2&render=explicit" async defer></script>
    <script>
        $("#vendor_login_form").on('submit',function(e) {
            var response = grecaptcha.getResponse(0);

            if (response.length === 0) {
                e.preventDefault();
                toastr.error("{{__('messages.Please check the recaptcha')}}");
            }
        });

        $("#employee_login_form").on('submit',function(e) {
            var response = grecaptcha.getResponse(1);

            if (response.length === 0) {
                e.preventDefault();
                toastr.error("{{__('messages.Please check the recaptcha')}}");
            }
        });
    </script>
@endif
{{-- recaptcha scripts end --}}


@if(env('APP_MODE')=='demo')
    <script>
        function copy_cred() {
            $('#signinSrEmail').val('test.restaurant@gmail.com');
            $('#signupSrPassword').val('12345678');
            toastr.success('Copied successfully!', 'Success!', {
                CloseButton: true,
                ProgressBar: true
            });
        }
    </script>
@endif
<!-- IE Support -->
<script>
    if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="{{asset('public/assets/admin')}}/vendor/babel-polyfill/polyfill.min.js"><\/script>');
</script>
</body>
</html>
