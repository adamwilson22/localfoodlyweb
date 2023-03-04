@extends('layouts.vendor.app')

@section('title', __('Single Customer Page'))

@push('css_or_js')
@endpush

<body class="">
    @section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm">
                    <h1 class="page-header-title">Customers</h1>
                </div>
            </div>
        </div>
        <!-- End Page Header -->

        <div class="customer">
            <div class="row">
                <div class="col-lg-4">
                    <div class="singleimg">
                        <img class="img-fluid" src="{{ asset('public/assets/admin/img/Rectangle-125.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="single-detail">
                                <span class="status">Active</span>
                                <h1>Alissia Charles</h1>
                                <h4>Customer</h4>
                                <div class="contact">

                                    <a href="tel:+10000000000"><i class="icon-phone"></i> +10000000000</a>

                                    <a href="mailto:user@mail.com"><i class="icon-mail"></i> user@mail.com</a>

                                    <p><i class="icon-map-pin"></i> Main Street Road No 4, Newyork, USA</p>
                                    <p><i class="icon-map-pin"></i> 25 loyalty points</p>

                                </div>
                                <a href="#" class="btn btn-primary btn-lg">Send Coupon</a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body seller-card">
                            <h4 class="title">Top Selling Items</h4>
                            <ul class="list-group list-group-flush selling-list">
                                <li class="list-group-item">
                                    <div class="info">
                                        <img src="{{ asset('public/assets/admin/img/top-selling/top1.png') }}" alt="">
                                        <span>
                                            <h4>Pizza Margherita</h4>
                                            <p>Lorem ipsum dolor sit</p>
                                        </span>
                                    </div>
                                    <div class="price">
                                        <p class="">$35.24</p>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="info">
                                        <img src="{{ asset('public/assets/admin/img/top-selling/top2.png') }}" alt="">
                                        <span>
                                            <h4>Classic Salad</h4>
                                            <p>Lorem ipsum dolor sit</p>
                                        </span>
                                    </div>
                                    <div class="price">
                                        <p class="">$35.24</p>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="info">
                                        <img src="{{ asset('public/assets/admin/img/top-selling/top3.png') }}" alt="">
                                        <span>
                                            <h4>Egg Sandwich</h4>
                                            <p>Lorem ipsum dolor sit</p>
                                        </span>
                                    </div>
                                    <div class="price">
                                        <p class="">$35.24</p>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="info">
                                        <img src="{{ asset('public/assets/admin/img/top-selling/top4.png') }}" alt="">
                                        <span>
                                            <h4>Muesil Mango</h4>
                                            <p>Lorem ipsum dolor sit</p>
                                        </span>
                                    </div>
                                    <div class="price">
                                        <p class="">$35.24</p>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="info">
                                        <img src="{{ asset('public/assets/admin/img/top-selling/top2.png') }}" alt="">
                                        <span>
                                            <h4>Classic Salad</h4>
                                            <p>Lorem ipsum dolor sit</p>
                                        </span>
                                    </div>
                                    <div class="price">
                                        <p class="">$35.24</p>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <h1 class="title">Other Customers</h1>
            <div class="row">
                <div class="col-lg-4">
                    <div class="custom-control custom-checkbox customer-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">
                            <div class="card">
                                <div class="card-body">
                                    <div class="detail">
                                        <div class="info">
                                            <div class="proimg">
                                                <img src="{{ asset('public/assets/admin/img/NoPath---Copy-().png') }}" alt="">
                                                <span class="status"></span>
                                            </div>

                                            <span>
                                                <h4>Alissia Charles</h4>
                                                <p>Customer</p>
                                            </span>
                                        </div>
                                        <div class="categ">
                                            <h6>Group</h6>
                                            <p class="">Regulars</p>
                                        </div>
                                    </div>
                                    <div class="contact">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <a href="tel:+10000000000"><i class="icon-phone"></i> +10000000000</a>
                                            </div>
                                            <div class="col-lg-6">
                                                <a href="mailto:user@mail.com"><i class="icon-mail"></i> user@mail.com</a>
                                            </div>
                                            <div class="col-12">
                                                <p><i class="icon-map-pin"></i> Main Street Road No 4, Newyork, USA</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <a href="#" class="btn btn-primary btn-lg">View Profile</a>
                                        <div class="points">
                                            <h6>Loyalty Points</h6>
                                            <p>25 points</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="custom-control custom-checkbox customer-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                        <label class="custom-control-label" for="customCheck2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="detail">
                                        <div class="info">
                                            <div class="proimg">
                                                <img src="{{ asset('public/assets/admin/img/NoPath---Copy-().png') }}" alt="">
                                                <span class="status"></span>
                                            </div>

                                            <span>
                                                <h4>Alissia Charles</h4>
                                                <p>Customer</p>
                                            </span>
                                        </div>
                                        <div class="categ">
                                            <h6>Group</h6>
                                            <p class="">Regulars</p>
                                        </div>
                                    </div>
                                    <div class="contact">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <a href="tel:+10000000000"><i class="icon-phone"></i> +10000000000</a>
                                            </div>
                                            <div class="col-lg-6">
                                                <a href="mailto:user@mail.com"><i class="icon-mail"></i> user@mail.com</a>
                                            </div>
                                            <div class="col-12">
                                                <p><i class="icon-map-pin"></i> Main Street Road No 4, Newyork, USA</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <a href="#" class="btn btn-primary btn-lg">View Profile</a>
                                        <div class="points">
                                            <h6>Loyalty Points</h6>
                                            <p>25 points</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="custom-control custom-checkbox customer-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck3">
                        <label class="custom-control-label" for="customCheck3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="detail">
                                        <div class="info">
                                            <div class="proimg">
                                                <img src="{{ asset('public/assets/admin/img/NoPath---Copy-().png') }}" alt="">
                                                <span class="status"></span>
                                            </div>

                                            <span>
                                                <h4>Alissia Charles</h4>
                                                <p>Customer</p>
                                            </span>
                                        </div>
                                        <div class="categ">
                                            <h6>Group</h6>
                                            <p class="">Regulars</p>
                                        </div>
                                    </div>
                                    <div class="contact">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <a href="tel:+10000000000"><i class="icon-phone"></i> +10000000000</a>
                                            </div>
                                            <div class="col-lg-6">
                                                <a href="mailto:user@mail.com"><i class="icon-mail"></i> user@mail.com</a>
                                            </div>
                                            <div class="col-12">
                                                <p><i class="icon-map-pin"></i> Main Street Road No 4, Newyork, USA</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <a href="#" class="btn btn-primary btn-lg">View Profile</a>
                                        <div class="points">
                                            <h6>Loyalty Points</h6>
                                            <p>25 points</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
</body>