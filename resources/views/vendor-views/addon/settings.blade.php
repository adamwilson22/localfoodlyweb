@extends('layouts.vendor.app')

@section('title', __('Setting'))

@push('css_or_js')
<link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<style>
input[type="file"] {
    display: none;
}

.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
}
</style>
@endpush

<body class="">
    @section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm">
                    <h1 class="page-header-title">Setting</h1>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="row">
            <div class="col-lg-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-edit-profile-tab" data-toggle="pill"
                        href="#v-pills-edit-profile" role="tab" aria-controls="v-pills-edit-profile"
                        aria-selected="true">Edit Profile</a>
                    <a class="nav-link" id="v-pills-edit-store-tab" data-toggle="pill" href="#v-pills-edit-store"
                        role="tab" aria-controls="v-pills-edit-store" aria-selected="false">Edit Store</a>
                    <a class="nav-link" id="v-pills-change-password-tab" data-toggle="pill"
                        href="#v-pills-change-password" role="tab" aria-controls="v-pills-change-password"
                        aria-selected="false">Change Password</a>
                    <a class="nav-link" id="v-pills-payment-tab" data-toggle="pill" href="#v-pills-payment" role="tab"
                        aria-controls="v-pills-payment" aria-selected="false">Payment</a>
                    <a class="nav-link" id="v-pills-join-marketplace-tab" data-toggle="pill"
                        href="#v-pills-join-marketplace" role="tab" aria-controls="v-pills-join-marketplace"
                        aria-selected="false">Join Marketplace</a>

                    <a class="nav-link" id="v-pills-join-kitchenGallery-tab" data-toggle="pill"
                        href="#v-pills-join-kitchenGallery" role="tab" aria-controls="v-pills-join-kitchenGallery"
                        aria-selected="false">Kitchen Gallery</a>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-edit-profile" role="tabpanel"
                        aria-labelledby="v-pills-edit-profile-tab">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="mb-5">Profile Setting</h1>
                                <form class="" action="{{route('vendor.profile')}}" method="post" id=""
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class=" form-group">
                                                <div class="profile">
                                                    {{-- <h3 style="display:block" >Profile</h3> --}}
                                                    <div class="profile" style="width: 200px;

                                                    display: block;
                                                    height: 200px;
                                                    overflow: hidden;
                                                    border-radius: 50%;
                                                    background-image: url(blob:http://localfoodly.jumppace.com/ef3a5139-fc03-426c-aac4-2ea4a8ab2ad1);
                                                    background-repeat: no-repeat;
                                                    background-position: center;
                                                    background-size: cover;
                                                    border: 2px solid;" id="">
                                                        @if (empty($data->image))
                                                        <img style="width: 100%; height: 100%; object-fit: cover;"
                                                            id="profileimg" src="" alt="">
                                                        @else
                                                        <img style="width: 100%; height: 100%; object-fit: cover;"
                                                            id="profileimg"
                                                            src="{{ asset('public/images/vendor') .'/'. $data->image }}"
                                                            alt="">
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label style="margin-top: 20px; margin-left: 20px;"
                                                            for="profileimage" class="input-label custom-file-upload">
                                                            Update Image</label>
                                                        <input type="file" name="image" class="btn btn-grey btn-lg"
                                                            id="profileimage" accept="image/*"
                                                            onchange="showProfilePreview(event);" />
                                                        {{-- <a href="#" class="btn btn-grey btn-lg">Change</a>
                                                        <a href="#" class="">Remove</a> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class=" form-group">
                                                <label class="input-label" for="">First Name</label>
                                                <input type="text" class="form-control form-control-lg" name="f_name"
                                                    placeholder="First Name" value="{{$data->f_name}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class=" form-group">
                                                <label class="input-label" for="">Last Name</label>
                                                <input type="text" class="form-control form-control-lg" name="l_name"
                                                    placeholder="Last Name" value="{{$data->l_name}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" form-group">
                                        <label class="input-label" for="">About</label>
                                        <textarea name="about" id="" cols="" rows="4"
                                            class="form-control form-control-lg">{{$data->about}}</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class=" form-group">
                                                <label class="input-label" for="">Email Address</label>
                                                <input type="email" class="form-control form-control-lg" name="email"
                                                    placeholder="maxwellburke@mail.com" value="{{$data->email}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class=" form-group">
                                                <label class="input-label" for="">Phone Number</label>
                                                <input type="text" class="form-control form-control-lg" name="phone"
                                                    value="{{$data->phone}}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" form-group">
                                        <label class="input-label" for="">Gender</label>
                                        <select name="gender" id="" class="custom-select custom-select-lg">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-lg">Save Now</button>

                                    <!-- <a href="#" class="btn btn-primary btn-lg">Save Now</a> -->
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-edit-store" role="tabpanel"
                        aria-labelledby="v-pills-edit-store-tab">
                        <div class="card">
                            <div class="card-body">
                                <div class="top-selling">
                                    <h1 class="mb-5">Store Setting</h1>
                                    <form class="" action="{{route('vendor.create.store')}}" method="post" id=""
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class=" form-group">
                                            <h3 style="display:block">Profile</h3>
                                            <div class="profile">
                                                <div class="profile" style="width: 200px;

                                                display: block;
                                                height: 200px;
                                                overflow: hidden;
                                                border-radius: 50%;
                                                background-image: url(blob:http://localfoodly.jumppace.com/ef3a5139-fc03-426c-aac4-2ea4a8ab2ad1);
                                                background-repeat: no-repeat;
                                                background-position: center;
                                                background-size: cover;
                                                border: 2px solid;" id="">
                                                    @if (empty($restaurant->logo))
                                                    <img id="imgprv" src="" alt="">
                                                    @else
                                                    <img id="imgprv"
                                                        src="{{ asset('public/images') .'/'. $restaurant->logo }}"
                                                        alt="">
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label style="margin-left: 30px" for="imageUpload"
                                                        class="input-label custom-file-upload"> Change Logo</label>
                                                    <input type="file" name="logo" class="btn btn-grey btn-lg"
                                                        id="imageUpload" accept="image/*"
                                                        onchange="showPreview(event);" />
                                                    {{-- <a href="#" class="btn btn-grey btn-lg">Change</a>
                                                    <a href="#" class="">Remove</a> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" form-group">
                                            <div class="cover">
                                                <label style="position: absolute; margin: 20px; background: #ffffffaa;"
                                                    for="coverUpload" class="input-label custom-file-upload">Change
                                                    Cover</label>
                                                @if (empty($restaurant->cover_photo))
                                                <img id="coverprv" src="" alt="">
                                                @else
                                                <img id="coverprv"
                                                    src="{{ asset('public/images') .'/'. $restaurant->cover_photo }}"
                                                    alt="">
                                                @endif
                                                <input type="file" name="cover_photo" class="btn btn-grey btn-lg"
                                                    id="coverUpload" accept="image/*"
                                                    onchange="showCoverPreview(event);" />

                                            </div>
                                        </div>
                                        <div class=" form-group">
                                            <label class="input-label" for="">Store Name</label>
                                            <input type="text" class="form-control form-control-lg" name="name"
                                                placeholder="Spicy" value="{{$restaurant->name ?? ''}}">
                                        </div>
                                        <div class=" form-group">
                                            <label class="input-label" for="">About</label>
                                            <textarea name="about" id="" cols="" rows="4"
                                                class="form-control form-control-lg">{{$restaurant->about ?? ''}}</textarea>
                                        </div>
                                        <div class="temp">
                                            <label class="input-label" for="">Select Template</label>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class=" form-group">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="radio" class="custom-control-input"
                                                                id="customCheck1" name="store_template" value="light"
                                                                {{ !empty($restaurant->store_template) ? ($restaurant->store_template == 'light' ? 'checked' : '' ) : ''}}>
                                                            <label class="custom-control-label" for="customCheck1"><img
                                                                    class="img-fluid"
                                                                    src="{{asset('public/assets/admin/img/temp.png')}}"
                                                                    alt="">
                                                                <p>Select Template</p>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class=" form-group">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="radio" class="custom-control-input"
                                                                id="customCheck2" name="store_template" value="dark"
                                                                {{ !empty($restaurant->store_template) ? ($restaurant->store_template == 'dark' ? 'checked' : '' ) : ''}}>
                                                            <label class="custom-control-label" for="customCheck2"><img
                                                                    class="img-fluid"
                                                                    src="{{asset('public/assets/admin/img/temp2.png')}}"
                                                                    alt="">
                                                                <p>Select Template</p>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" form-group">
                                            <label class="input-label" for="">Choose Color For Store</label>

                                            <input type="radio" id="red" name="color_for_store" value="Red"
                                                {{ !empty($restaurant->color_for_store) ? ($restaurant->color_for_store == 'Red' ? 'checked' : '' ) : ''}}>
                                            <label for="red">Red</label><br>
                                            <input type="radio" id="blue" name="color_for_store" value="Blue"
                                                {{ !empty($restaurant->color_for_store) ? ($restaurant->color_for_store == 'Blue' ? 'checked' : '' ) : ''}}>
                                            <label for="blue">Blue</label><br>
                                            <input type="radio" id="green" name="color_for_store" value="Green"
                                                {{ !empty($restaurant->color_for_store) ? ($restaurant->color_for_store == 'Green' ? 'checked' : '' ) : ''}}>
                                            <label for="green">Green</label>

                                            <!-- <div class="choose-color">
                                                <span class="red"></span>
                                                <span class="blue"></span>
                                                <span class="green"></span>
                                                <span class="yellow"></span>
                                                <a href="#">More Colors...</a>
                                            </div> -->
                                        </div>
                                        <div class=" form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="is_deactivated"
                                                    class="custom-control-input" id="customCheck3"
                                                    {{ !empty($restaurant->is_deactivated) ? ($restaurant->is_deactivated == 1 ? 'checked' : '' ) : ''}}>
                                                <label class="custom-control-label" for="customCheck3">Deactivate
                                                    Store</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-lg">Save Now</button>
                                        <!-- <a href="#" class="btn btn-primary btn-lg">Save Now</a> -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-change-password" role="tabpanel"
                        aria-labelledby="v-pills-change-password-tab">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="mb-5">Change Password</h1>
                                <form class="" action="{{route('vendor.change_password')}}" method="post" id="">
                                    @csrf
                                    <div class=" form-group">
                                        <label class="input-label" for="">Old Password *</label>
                                        <input type="password" class="form-control form-control-lg" name="old_password"
                                            placeholder="old password" required>
                                    </div>
                                    <div class=" form-group">
                                        <label class="input-label" for="">New Password *</label>
                                        <input type="password" class="form-control form-control-lg" name="password"
                                            placeholder="new password" required>
                                    </div>
                                    <!-- <div class=" form-group">
                                        <label class="input-label" for="">Confirm New Password*</label>
                                        <input type="password" class="form-control form-control-lg" name="password_confirm" placeholder="confirm new password" required> -->

                                    <!-- <textarea name="" id="" cols="" rows="4" class="form-control form-control-lg" placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor"></textarea> -->
                                    <!-- </div> -->

                                    <!-- <a href="#" class="btn btn-primary btn-lg">Save Now</a> -->
                                    <button type="submit" class="btn btn-primary btn-lg">Save Now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-payment" role="tabpanel"
                        aria-labelledby="v-pills-payment-tab">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="mb-5">Payment setting</h1>
                                <p>Connect your store to your bank</p>
                                <form class="" action="" method="post" id="">
                                    <label class="input-label" for="">Stripe Checkout</label>
                                    <div class=" form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck4">
                                            <label class="custom-control-label" for="customCheck4">Yes</label>
                                        </div>
                                    </div>
                                    <div class=" form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck5">
                                            <label class="custom-control-label" for="customCheck5">No</label>
                                        </div>
                                    </div>
                                    <div class=" form-group">
                                        <label class="input-label" for="">Store Name</label>
                                        <input type="text" class="form-control form-control-lg" name=""
                                            placeholder="Spicy">
                                    </div>
                                    <div class=" form-group">
                                        <label class="input-label" for="">Stripe API Secret Key</label>
                                        <input type="text" class="form-control form-control-lg" name=""
                                            placeholder="58730gjka-893t8978hsk">
                                    </div>
                                    <div class=" form-group">
                                        <label class="input-label" for="">Gateway Payment Payment Description</label>
                                        <input type="text" class="form-control form-control-lg" name=""
                                            placeholder="Invoice Number">
                                    </div>

                                    <div class="form-group">
                                        <label class="input-label" for="">Currencies</label>
                                        <select name="" id="" class="custom-select custom-select-lg">
                                            <option value="">$ USD</option>
                                            <option value="">...</option>
                                        </select>
                                    </div>


                                    <a href="#" class="btn btn-primary btn-lg">Save Now</a>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-join-marketplace" role="tabpanel"
                        aria-labelledby="v-pills-join-marketplace-tab">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="mb-5">Request Funding</h1>
                                <form class="" action="" method="post" id="">

                                    <div class=" form-group">
                                        <label class="input-label" for="">Name *</label>
                                        <input type="text" class="form-control form-control-lg" name=""
                                            placeholder="Name">
                                    </div>
                                    <div class=" form-group">
                                        <label class="input-label" for="">Phone Number *</label>
                                        <input type="text" class="form-control form-control-lg" name=""
                                            placeholder="Phone Number">
                                    </div>
                                    <div class=" form-group">
                                        <label class="input-label" for="">Message *</label>
                                        <textarea name="" id="" cols="" rows="4" class="form-control form-control-lg"
                                            placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor"></textarea>
                                    </div>

                                    <a href="#" class="btn btn-primary btn-lg">Save Now</a>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-join-kitchenGallery" role="tabpanel"
                        aria-labelledby="v-pills-join-kitchenGallery-tab">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="mb-5">Kitchen Gallery</h1>
                                <!--begin::Form-->
                                <form class="form" action="{{ route('vendor.kitchen.store.gallery') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <!--begin::Input group-->
                                    <div class="fv-row">
                                        <!--begin::Dropzone-->
                                        <div class="dropzone" id="kt_dropzonejs_example_1">
                                            <!--begin::Message-->
                                            <div class="dz-message needsclick">
                                                <!--begin::Icon-->
                                                <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                                <!--end::Icon-->

                                                <!--begin::Info-->
                                                <div class="ms-4">
                                                    <h3 class="fs-5 fw-bold text-gray-900 mb-1">Drop files here or
                                                        click to upload.</h3>
                                                    <span class="fs-7 fw-semibold text-gray-400">Upload up to 10
                                                        files</span>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                        </div>
                                        <!--end::Dropzone-->
                                    </div>
                                    <!--end::Input group-->
                                </form>
                                <!--end::Form-->
                                <div class="container">
                                    <h3>Kitchen Images</h3>
                                    @foreach ($kitchengallery as $g)
                                    <div id="img{{$g->id}}" class="d-inline">
                                    @if(in_array(pathinfo($g->image, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
                                        
                                        <img src="{{$g->image}}" class="kitchenimg" alt="...">
                                    @elseif(in_array(pathinfo($g->image, PATHINFO_EXTENSION), ['doc', 'docx', 'ppt', 'pptx', 'xls', 'xlsx']))
                                        {{-- <div class="document-file"> --}}
                                            <a href="{{ asset($g->image) }}" target="_blank" style="vertical-align: middle;">{{ $g->image }}</a>
                                        {{-- </div> --}}
                                    @elseif(in_array(pathinfo($g->image, PATHINFO_EXTENSION), ['pdf']))
                                        {{-- <div class="pdf-file"> --}}
                                            <embed src="{{ asset($g->image) }}" type="application/pdf" width="auto" class="kitchenimg" height="150px" style="vertical-align: middle;"/>
                                        {{-- </div> --}}
                                    @elseif(in_array(pathinfo($g->image, PATHINFO_EXTENSION), ['mp4', 'avi', 'mov', 'wmv', 'flv', 'webm']))
                                        {{-- <div class="video-file"> --}}
                                            <video src="{{ asset($g->image) }}" width="auto" height="150px" class="kitchenimg" style="vertical-align: middle;" ></video>
                                        {{-- </div> --}}
                                    @endif
                                        <button style="font-size:30px" type="button" id="{{$g->id}}" onclick="delete_img({{$g->id}})"><i class="icon-trash"></i></button>
                                        </div>
                                    @endforeach 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @push('custom_js')
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js">
    </script>

    <script>
    // function readURL(input) {
    //     if (input.files && input.files[0]) {
    //         var reader = new FileReader();
    //         reader.onload = function(e) {
    //             $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
    //             $('#imagePreview').hide();
    //             $('#imagePreview').fadeIn(650);
    //         }
    //         reader.readAsDataURL(input.files[0]);
    //     }
    // }
    // $("#imgprv").change(function() {
    //     readURL(this);
    // });
    var myDropzone = new Dropzone("#kt_dropzonejs_example_1", {
        url: "{{ route('vendor.kitchen.store.gallery') }}", // Set the url for your upload script location
        paramName: "file", // The name that will be used to transfer the file
        maxFiles: 10,
        maxFilesize: 10, // MB
        method: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        accept: function(file, done) {
            if (file.status == "added") {
                toastr.success('kitchen image uploaded');
                reloadAndShowTab();
            } else {
                toastr.error('kitchen image not uploaded');
            }
            if (file.name == "wow.jpg") {
                done("Naha, you don't.");
            } else {
                done();
            }
        },
    });

    function showPreview(event) {
        if (event.target.files.length > 0) {
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById("imgprv");
            preview.src = src;
            preview.style.display = "block";
        }
    }

    function showCoverPreview(event) {
        if (event.target.files.length > 0) {
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById("coverprv");
            preview.src = src;
            preview.style.display = "block";
        }
    }

    function showProfilePreview(event) {
        if (event.target.files.length > 0) {
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById("profileimg");
            preview.src = src;
            preview.style.display = "block";
        }
    }

    function delete_img(id, img) {
        var del = id;
        // var url = "{{ route('vendor.kitchen.delete.gallery',"+ del + " ) }}";
        var url = '{{ route("vendor.kitchen.delete.gallery", ":id") }}';
        url = url.replace(':id', id);
        var element = document.getElementById('img'+id);
        element.parentNode.removeChild(element);
        console.log(element);
        console.log(url);
        $.ajax({
                    url: url,
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        // id: ele.attr("data-id")
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        toastr.success("Image Deleted");
                        setTimeout(function(){
                            // $('#v-pills-join-kitchenGallery').location.reload(1);
                        }, 1000);
                        // parent_row.remove();
                        // $(".cart-count").html(response.countlist);
                        // $("span#status").html('<div class="alert alert-success">' + response.msg +
                        //     '</div>');

                        // $("#header-bar").html(response.data);

                        // cart_total.text(response.total);
                    }
                });
    }

    function reloadAndShowTab() {
  

    // Show the specified tab
    var tabLink = document.querySelector('#v-pills-join-kitchenGallery');
    if (tabLink) {
        tabLink.click();
    }
    }
    </script>
    @endpush

</body>