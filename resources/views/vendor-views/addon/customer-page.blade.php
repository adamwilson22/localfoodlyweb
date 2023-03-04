+@extends('layouts.vendor.app')

@section('title', __('Customers'))

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
        <div class="row">
            <div class="col-xl-4 col-lg-6">
                <div class="inline-select">
                    <label for="" class="">Sort by</label>
                    <select id="" class="custom-select custom-select-lg">
                        <option selected>Regulars</option>
                        <option>...</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-8 col-lg-6 mt-lg-0 mt-3 text-lg-right">
                <a href="#" class="btn btn-secondary btn-lg sltcateg mb-2">Send Coupon</a>
                <a href="#" class="btn btn-primary btn-lg ml-sm-3 mb-2" data-toggle="modal" data-target="#customerModalCenter">Move To Group</a>
            </div>
        </div>

        <div class="customer">
            <input type='hidden' id='current_page' />
            <input type='hidden' id='show_per_page' />
            <div class="row" id="pagingBox">
                @foreach($customers as $customer)
                <div class="col-lg-4">
                    <div class="custom-control custom-checkbox customer-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">
                            <div class="card">
                                <div class="card-body">
                                    <div class="detail">
                                        <div class="info">
                                            <div class="proimg">
                                                <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
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
                @endforeach
                <!-- <div class="col-lg-4">
                    <div class="custom-control custom-checkbox customer-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                        <label class="custom-control-label" for="customCheck2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="detail">
                                        <div class="info">
                                            <div class="proimg">
                                                <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
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
                                                <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
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
                        <input type="checkbox" class="custom-control-input" id="customCheck4">
                        <label class="custom-control-label" for="customCheck4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="detail">
                                        <div class="info">
                                            <div class="proimg">
                                                <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
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
                        <input type="checkbox" class="custom-control-input" id="customCheck5">
                        <label class="custom-control-label" for="customCheck5">
                            <div class="card">
                                <div class="card-body">
                                    <div class="detail">
                                        <div class="info">
                                            <div class="proimg">
                                                <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
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
                        <input type="checkbox" class="custom-control-input" id="customCheck6">
                        <label class="custom-control-label" for="customCheck6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="detail">
                                        <div class="info">
                                            <div class="proimg">
                                                <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
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
                        <input type="checkbox" class="custom-control-input" id="customCheck7">
                        <label class="custom-control-label" for="customCheck7">
                            <div class="card">
                                <div class="card-body">
                                    <div class="detail">
                                        <div class="info">
                                            <div class="proimg">
                                                <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
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
                        <input type="checkbox" class="custom-control-input" id="customCheck8">
                        <label class="custom-control-label" for="customCheck8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="detail">
                                        <div class="info">
                                            <div class="proimg">
                                                <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
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
                        <input type="checkbox" class="custom-control-input" id="customCheck9">
                        <label class="custom-control-label" for="customCheck9">
                            <div class="card">
                                <div class="card-body">
                                    <div class="detail">
                                        <div class="info">
                                            <div class="proimg">
                                                <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
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
                        <input type="checkbox" class="custom-control-input" id="customCheck10">
                        <label class="custom-control-label" for="customCheck10">
                            <div class="card">
                                <div class="card-body">
                                    <div class="detail">
                                        <div class="info">
                                            <div class="proimg">
                                                <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
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
                        <input type="checkbox" class="custom-control-input" id="customCheck11">
                        <label class="custom-control-label" for="customCheck11">
                            <div class="card">
                                <div class="card-body">
                                    <div class="detail">
                                        <div class="info">
                                            <div class="proimg">
                                                <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
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
                </div> -->

            </div>
            <div id='page_navigation'></div>
        </div>

    </div>
    <!-- Modal -->
    <div class="modal fade" id="customerModalCenter" tabindex="-1" role="dialog" aria-labelledby="customerModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Create A Customer Segment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="form-group">
                        <select id="" class="custom-select custom-select-lg">
                            <option selected>Select Category</option>
                            <option>...</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-primary btn-lg">Save Now</button>
                </div>

            </div>
        </div>
    </div>
    @endsection
</body>