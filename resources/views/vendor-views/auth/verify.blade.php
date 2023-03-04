<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    {{-- <title>{{__('messages.restaurant')}} | {{__('messages.login')}}</title> --}}
    <title>Verify</title>

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
    <link rel="stylesheet" href="{{asset('public/assets/admin')}}/css/intlTelInput.css">
    <link rel="stylesheet" href="{{asset('public/assets/admin')}}/css/custom.css">
    <style>
        .input-label{
            text-align: left;
        }
    </style>
</head>

<body class="authpg verifypg">
<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main" class="main">
    

    <!-- Content -->
    <div class="container">
        
      
                <div class="section-padding">
                    
                    <!-- Card -->
                        <div class="">
                            <div class="">
                                <div class="mb-5">
                                    <img class="" src="{{asset('public/assets/admin/img/secure.svg')}}" alt="Image Description">
                                    <!-- <h1 class="display-4">{{__('messages.restaurant')}} {{__('messages.sign_in')}}</h1> -->
                                    <h1 class="display-4">Verify Phone</h1>
                                    <p>Please enter the code Sent to {{session('phone_num')}}</p>
                                </div>
                            </div>
                            <form action="{{route('vendor.auth.verify_phone')}}" class="mt-5" method="post">
                                @csrf
                                <input class="otp form-control" name="d1" type="text" oninput='digitValidate(this)' onkeyup='tabChange(1)' maxlength=1 required>
                                <input class="otp form-control" name="d2" type="text" oninput='digitValidate(this)' onkeyup='tabChange(2)' maxlength=1 required>
                                <input class="otp form-control" name="d3" type="text" oninput='digitValidate(this)' onkeyup='tabChange(3)' maxlength=1 required>
                                <input class="otp form-control" name="d4" type="text" oninput='digitValidate(this)'onkeyup='tabChange(4)' maxlength=1 required>
                                <!-- <input class="otp form-control" type="text" oninput='digitValidate(this)'onkeyup='tabChange(5)' maxlength=1 > -->
                              <br>
                                <button type="submit" class="btn btn-lg btn-primary my-4">Verify Now</button>
                               
                               
                                
                            </form>
                            <p>Trouble Signing In? <a href="" data-toggle="modal" data-target="#contactsupport">Contact Support</a></p>
                        
                         
                           
                        </div>                    
                    <!-- End Card -->
                </div>
         
    </div>
    <!-- End Content -->
</main>
<!-- Modal -->
<div class="modal fade" id="contactsupport" tabindex="-1" role="dialog"
            aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Contact Support</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="" action="{{route('vendor.auth.contact_support')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class=" form-group">
                                        <label class="input-label" for="">Name *</label>
                                        <input type="text" class="form-control form-control-lg" name="name" placeholder="Name">
                                    </div>
                                    <div class=" form-group">
                                        <label class="input-label" for="">Email *</label>
                                        <input type="text" class="form-control form-control-lg" name="email" placeholder="Email">
                                    </div>
                                    <div class=" form-group">
                                        <label class="input-label" for="">Message *</label>
                                        <textarea name="message" id="" cols="" rows="4" class="form-control form-control-lg" placeholder="Enter your message here"></textarea>
                                    </div>
                                  
                                    <!-- <a href="#" class="btn btn-primary btn-lg">Submit</a> -->
                                    <button type="submit" class="btn btn-lg btn-primary my-4">Submit Form</button>

                                </form>
                    </div>
                    
                </div>
            </div>
        </div>
<!-- ========== END MAIN CONTENT ========== -->


<!-- JS Implementing Plugins -->
<script src="{{asset('public/assets/admin')}}/js/vendor.min.js"></script>

<!-- JS Front -->
<script src="{{asset('public/assets/admin')}}/js/intlTelInput.js"></script>
<script src="{{asset('public/assets/admin')}}/js/theme.min.js"></script>
<script src="{{asset('public/assets/admin')}}/js/toastr.js"></script>
<script src="{{asset('public/assets/admin')}}/js/authcustom.js"></script>

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


</body>
</html>
