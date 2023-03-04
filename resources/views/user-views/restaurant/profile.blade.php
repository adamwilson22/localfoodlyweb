@extends('user-views.layouts.app')


{!! Toastr::message() !!}

@push('css_or_js')

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
@section('content')
 <section class="edit-section section-padding">
    <div class="container">
      
            <h2 class="heading">Profile Settings</h2>
            <form class="" action="{{ route('profile.update') }}" method="post" id=""
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class=" form-group">
                                    <div class="profile">
                                        <div class="proimg">
                                            <div class="imgprofile">
                                                <img id="profileimg" src="https://testapp.thesuitchstaging.com/public/images/vendor/profile1676468829.jpg" alt="">
                                                <div class="upload">
                                                    <input type="file" name="image" class="btn btn-grey btn-lg"
                                                    id="profileimage" accept="image/*"
                                                    onchange="showProfilePreview(event);">
                                                    <i class="icon-camera"></i>
                                                </div>
                                            </div>
                                            <label for="profileimage" class="input-label custom-file-upload">Change Profile</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class=" form-group">
                                    <label class="input-label" for="">First Name</label>
                                    <input type="text" class="form-control" name="f_name"
                                        placeholder="First Name" value="{{ $user->f_name }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class=" form-group">
                                    <label class="input-label" for="">Last Name</label>
                                    <input type="text" class="form-control" name="l_name"
                                        placeholder="Last Name" value="{{ $user->l_name }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class=" form-group">
                                    <label class="input-label" for="">Email Address</label>
                                    <input type="email" class="form-control" name="email"
                                        placeholder="example@mail.com" value="{{ $user->email }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class=" form-group">
                                    <label class="input-label" for="">Phone Number</label>
                                    <input type="text" class="form-control" name="phone"
                                        value="{{ $user->phone }}">
                                </div>
                            </div>
                        </div>

                        <div class=" form-group">
                            <label class="input-label" for="">Old Password</label>
                            <input type="password" class="form-control" name="old_password"
                                placeholder="old password">
                        </div>
                        <div class=" form-group">
                            <label class="input-label" for="">New Password *</label>
                            <input type="password" class="form-control" name="password"
                                placeholder="new password">
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>

                        <!-- <a href="#" class="btn btn-primary btn-lg">Save Now</a> -->
                    </form>
        
    </div>
</section>
        @endsection

        @push('js_functions')
        <script>
        function showProfilePreview(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("profileimg");
                preview.src = src;
                preview.style.display = "block";
            }
        }
        </script>
        @endpush