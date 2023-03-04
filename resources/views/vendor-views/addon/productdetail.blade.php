@extends('layouts.vendor.app')

@section('title', __('Product Detail'))

@push('css_or_js')
@endpush

<body class="">
    @section('content')
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm">
                        <h1 class="page-header-title">
                            Products
                        </h1>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->

            <div class="row">
                <div class="col-lg-7">
                    <div class="row mb-4">
                        <div class="col-lg-6">
                            <div class="product-detail">
                                <div class="product-big">
                                    <div>
                                        <img src="{{ asset('public/assets/admin/img/pizza.png') }}" alt="">
                                    </div>
                                    <div>
                                        <img src="{{ asset('public/assets/admin/img/pexels-ana-madeleine-uribe-2762942.png') }}"
                                            alt="">
                                    </div>
                                    <div>
                                        <img src="{{ asset('public/assets/admin/img/pexels-ana-madeleine-uribe-27629421.png') }}"
                                            alt="">
                                    </div>
                                    <div>
                                        <img src="{{ asset('public/assets/admin/img/pexels-ana-madeleine-uribe-27629422png.png') }}"
                                            alt="">
                                    </div>
                                    <div>
                                        <img src="{{ asset('public/assets/admin/img/pexels-ana-madeleine-uribe-27629423.png') }}"
                                            alt="">
                                    </div>
                                </div>
                                <div>
                                    <a href="#" class="btn btn-primary btn-lg w-100">Share This Product</a>
                                </div>
                                <div class="product-nav">
                                    <div>
                                        <img src="{{ asset('public/assets/admin/img/pizza.png') }}" alt="">
                                    </div>
                                    <div>
                                        <img src="{{ asset('public/assets/admin/img/pexels-ana-madeleine-uribe-2762942.png') }}"
                                            alt="">
                                    </div>
                                    <div>
                                        <img src="{{ asset('public/assets/admin/img/pexels-ana-madeleine-uribe-27629421.png') }}"
                                            alt="">
                                    </div>
                                    <div>
                                        <img src="{{ asset('public/assets/admin/img/pexels-ana-madeleine-uribe-27629422png.png') }}"
                                            alt="">
                                    </div>
                                    <div>
                                        <img src="{{ asset('public/assets/admin/img/pexels-ana-madeleine-uribe-27629423.png') }}"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h1 class="title">
                                Add-On
                            </h1>

                            <div class="product-cards">

                                <div class="card">
                                    <div class="card-body">
                                        <div class="product-img">
                                            <img src="{{ asset('public/assets/admin/img/Untitled-1.png') }}"
                                                alt="">
                                        </div>
                                        <div class="content">
                                            <h4>Italian Sausage</h4>
                                            <div class="star">
                                                <i class="icon-star_icon"></i>
                                                <i class="icon-star_icon"></i>
                                                <i class="icon-star_icon"></i>
                                                <i class="icon-star_icon"></i>
                                                <i class="icon-star_icon"></i>
                                                (07)
                                            </div>
                                            <p>$35.24</p>
                                        </div>
                                        <div class="action">
                                            <a href="#">
                                                <i class="icon-edit_icon"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <div class="product-img">
                                            <img src="{{ asset('public/assets/admin/img/Untitled-2.png') }}"
                                                alt="">
                                        </div>
                                        <div class="content">
                                            <h4>Meatballs</h4>
                                            <div class="star">
                                                <i class="icon-star_icon"></i>
                                                <i class="icon-star_icon"></i>
                                                <i class="icon-star_icon"></i>
                                                <i class="icon-star_icon"></i>
                                                <i class="icon-star_icon"></i>
                                                (07)
                                            </div>
                                            <p>$35.24</p>
                                        </div>
                                        <div class="action">
                                            <a href="#">
                                                <i class="icon-edit_icon"></i>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                                <div class="">
                                    <a href="#" class="fs-20">Create More Add-On</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h1 class="page-header-title">
                                        Products
                                    </h1>
                                </div>
                                <div class="col-lg-6">
                                    <div class="sltoption">
                                        <img src="{{ asset('public/assets/admin/img/vegan.png') }}" alt="">
                                        <img src="{{ asset('public/assets/admin/img/madetoorder.png') }}" alt="">
                                        <img src="{{ asset('public/assets/admin/img/nutfree.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="star">
                                <i class="icon-star_icon"></i>
                                <i class="icon-star_icon"></i>
                                <i class="icon-star_icon"></i>
                                <i class="icon-star_icon"></i>
                                <i class="icon-star_icon"></i>
                                (07)
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem ipsum
                                dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                            <div class="btn-group sizing-btn btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary active">
                                    <input type="radio" name="options" id="small" autocomplete="off" checked> S
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="medium" autocomplete="off"> M
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="large" autocomplete="off"> L
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="extralarge" autocomplete="off"> XL
                                </label>
                            </div>
                            <div class=" form-group">
                                <label class="input-label" for="">Add-On</label>
                                <select name="" id="" class="custom-select custom-select-lg">
                                    <option value="">Item 1</option>
                                    <option value="">Item 1</option>
                                    <option value="">Item 1</option>
                                    <option value="">Item 1</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Check this custom
                                            checkbox</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Check this custom
                                            checkbox</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card chart-card mb-4">
                        <div class="card-body">
                            <h4 class="title">Total Orders</h4>
                            <select class="custom-select" name="">
                                <option value="overall" selected="">
                                    Today
                                </option>
                                <option value="today">
                                    Today's Statistics
                                </option>
                                <option value="today">
                                    Today's Statistics
                                </option>
                            </select>
                            <div id="circlechart"></div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body">
                            <h4 class="title">Areachart</h4>

                            <div id="areachart"></div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body seller-card">
                            <h4 class="title">Review</h4>
                            <ul class="list-group list-group-flush review-list">
                                <li class="list-group-item">
                                    <div class="detail">
                                        <div class="info">
                                            <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(6).png') }}"
                                                alt="">
                                            <span>
                                                <h4>Pizza Margherita</h4>
                                                <p>Lorem ipsum dolor sit</p>
                                            </span>
                                        </div>
                                        <div class="rating">

                                            <p class=""><i class="icon-star_icon"></i> 4.5</p>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem
                                        ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                                </li>
                                <li class="list-group-item">
                                    <div class="detail">
                                        <div class="info">
                                            <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}"
                                                alt="">
                                            <span>
                                                <h4>Pizza Margherita</h4>
                                                <p>Lorem ipsum dolor sit</p>
                                            </span>
                                        </div>
                                        <div class="rating">

                                            <p class=""><i class="icon-star_icon"></i> 4.5</p>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem
                                        ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                                </li>
                                <li class="list-group-item">
                                    <div class="detail">
                                        <div class="info">
                                            <img src="{{ asset('public/assets/admin/img/NoPath---Copy-().png') }}"
                                                alt="">
                                            <span>
                                                <h4>Pizza Margherita</h4>
                                                <p>Lorem ipsum dolor sit</p>
                                            </span>
                                        </div>
                                        <div class="rating">

                                            <p class=""><i class="icon-star_icon"></i> 4.5</p>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem
                                        ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                                </li>
                                <li class="list-group-item">
                                    <div class="detail">
                                        <div class="info">
                                            <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(6).png') }}"
                                                alt="">
                                            <span>
                                                <h4>Pizza Margherita</h4>
                                                <p>Lorem ipsum dolor sit</p>
                                            </span>
                                        </div>
                                        <div class="rating">

                                            <p class=""><i class="icon-star_icon"></i> 4.5</p>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem
                                        ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                                </li>


                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    @endsection


</body>
