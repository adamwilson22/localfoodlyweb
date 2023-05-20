<!doctype html>
<html lang="en">

<head>
    <title>Local Foodly</title>
    <meta name="description" content="">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="google-site-verification" content="56YRhkKCYXg16X0njPXUoKP736_bOnEn_HhZ49jdUvI" />
    <link rel="icon" href="/favicon.ico" type="image/x-icon" />
    <link href="{{ asset('public/customer/assets/css/m-style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/customer/assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Muli:ital,wght@0,300;0,400;0,500;0,600;0,700;0,900;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"> -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link rel='stylesheet' id='main-style-css'
        href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css' type="text/css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>
    <!--[if IE]>
  <script src="assets/js/html5.js"></script>
<![endif]-->
    @yield('css')
</head>

<body class="hompg ">

    <nav class="navbar navbar-expand-lg homehead">
        <div class="container test">
            <a class="navbar-brand" href="{{route('restaurant.list')}}">
                <img src="{{ asset('public/customer/assets/images/logo.png') }}" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="">
                    {{-- <li class="nav-item"><i class="icon-location3"></i> New York,NY</li> --}}


                </ul>
                <form class="form-inline">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="icon-search1"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Search Restaurants"
                            aria-label="search-restaurants" aria-describedby="basic-addon1">
                    </div>
                </form>
                <ul class="d-flex align-items-center">
                    <li class="nav-item">
                        <!-- <div class="dropdown"> -->
                        {{-- <a href="{{route('cart.food')}}"> --}}
                        <button type="button" onclick="window.location.href='{{route('cart.food')}}';"
                            class="nav-link btn-link dropdown-toggle">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span
                                class="badge badge-pill badge-danger cart-count">{{ count((array) session('cart')) }}</span>
                        </button>
                        {{-- </a> --}}
                        {{-- <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <div class="row total-header-section">
                                    <div class="col-lg-6 col-sm-6 col-6">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span
                                            class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
            </div>

            <?php $total = 0; ?>
            @foreach ((array) session('cart') as $id => $details)
            <?php $total += $details['price'] * $details['quantity']; ?>
            @endforeach

            <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                <p>Total: <span class="text-info">$ {{ $total }}</span></p>
            </div>
        </div>

        @if (session('cart'))
        @foreach ((array) session('cart') as $id => $details)
        <div class="row cart-detail">
            <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                <img src="{{ $details['photo'] }}" />
            </div>
            <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                <p>{{ $details['name'] }}</p>
                <span class="price text-info"> ${{ $details['price'] }}</span> <span class="count">
                    Quantity:{{ $details['quantity'] }}</span>
            </div>
        </div>
        @endforeach
        @endif
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                <a href="{{ route('cart.food') }}" class="btn btn-primary btn-block">View
                    all</a>
            </div>
        </div>
        </div> --}}
        </div>
        </li>

        <li class="nav-item">
            <div class="dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    <i class="icon-bell"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
        </li>
        <li class="nav-item dropdown user-drop">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset('public/images/vendor/placeholder_profile.jpg') }}" alt="">
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{ route('customer.details') }}">Edit Profile</a>
                <a class="dropdown-item" href="{{ route('sign.out') }}">Log Out</a>
                <!--<div class="dropdown-divider"></div>-->
                <!--<a class="dropdown-item" href="#">Something else here</a>-->
            </div>
        </li>

        </ul>
        </div>
        </div>
    </nav>


    @yield('content')

    <footer class="footer-main">
        <div class="footer-container">
            <div class="container">
                <img class="footlogo" src="{{ asset('public/customer/assets/images/logo.png') }}">

                <ul>
                    <li>
                        <a href="#">Help Center</a>
                    </li>
                    <li>
                        <a href="#">Refunds</a>
                    </li>
                    <li>
                        <a href="#">User Account Terms and Conditions</a>
                    </li>
                    <li>
                        <a href="#">Terms and conditions</a>
                    </li>
                    <li>
                        <a href="#">Privacy policy</a>
                    </li>
                    <li>
                        <a href="#">Security</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
    <script src="{{ asset('public/customer/assets/js/mlib.js') }}"></script>
    <script src="{{ asset('public/customer/assets/js/functions.js') }}"></script>
    <script src="{{ asset('public/customer/assets/js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>

    @yield('script')
</body>
<script>
    $(document).ready(function () {
        // Get the current URL
        var currentUrl = window.location.href;
        var logoPath;
        console.log("osama1");
        console.log(currentUrl);
        console.log("osama2");
        // Check the URL and set the logo path accordingly
        if (currentUrl.includes("bronze")) {
            logoPath = "{{ asset('public/customer/assets/images/bronze_logo.png') }}";
        } else if (currentUrl.includes("silver")) {
            logoPath = "{{ asset('public/customer/assets/images/silver_logo.png') }}";
        } else if (currentUrl.includes("gold")) {
            logoPath = "{{ asset('public/customer/assets/images/gold_logo.png') }}";
        } else {
            logoPath = "{{ asset('public/customer/assets/images/default_logo.png') }}";
        }

        // Update the logo source attribute
        $(".navbar-brand img").attr("src", logoPath);
    });
</script>
</html>