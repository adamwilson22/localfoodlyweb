@extends('layouts.vendor.app')

@section('title', __('Invoices'))

@push('css_or_js')
@endpush

<body class="">
    @section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm">
                    <h1 class="page-header-title">Invoices</h1>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="all-coupons-tab" data-toggle="tab" href="#all-coupons" role="tab" aria-controls="all-coupons" aria-selected="true">All Coupons</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="available-coupons-tab" data-toggle="tab" href="#available-coupons" role="tab" aria-controls="available-coupons" aria-selected="false">Available Coupons</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="expired-coupon-tab" data-toggle="tab" href="#expired-coupon" role="tab" aria-controls="expired-coupon" aria-selected="false">Expired Coupon</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="all-coupons" role="tabpanel" aria-labelledby="all-coupons-tab">
                        <div class="card">
                            <div class="card-body">
                                <div class="">
                                    <div class="table-responsive">
                                        <table id="columnSearchDatatable" class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="info">
                                                            <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(6).png') }}" alt="">
                                                            <span>
                                                                <h4>Pizza Margherita</h4>
                                                                <p>Lorem ipsum dolor sit</p>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="invoice">
                                                            <p>MX87498</p>
                                                            <h6>View Invoice</h6>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge badge-primary">Paid</span></td>
                                                    <td>
                                                        <div class="price">
                                                            <h2>$35.24</h2>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="#" class="btn btn-primary btn-lg">Ask For Review</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="info">
                                                            <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(6).png') }}" alt="">
                                                            <span>
                                                                <h4>Pizza Margherita</h4>
                                                                <p>Lorem ipsum dolor sit</p>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="invoice">
                                                            <p>MX87498</p>
                                                            <h6>View Invoice</h6>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge badge-primary">Paid</span></td>
                                                    <td>
                                                        <div class="price">
                                                            <h2>$35.24</h2>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="#" class="btn btn-primary btn-lg">Ask For Review</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="info">
                                                            <img src="{{ asset('public/assets/admin/img/NoPath---Copy-().png') }}" alt="">
                                                            <span>
                                                                <h4>Pizza Margherita</h4>
                                                                <p>Lorem ipsum dolor sit</p>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="invoice">
                                                            <p>MX87498</p>
                                                            <h6>View Invoice</h6>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge badge-danger">Unpaid</span></td>
                                                    <td>
                                                        <div class="price">
                                                            <h2>$35.24</h2>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="#" class="btn btn-primary btn-lg">Ask For Review</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="info">
                                                            <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
                                                            <span>
                                                                <h4>Pizza Margherita</h4>
                                                                <p>Lorem ipsum dolor sit</p>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="invoice">
                                                            <p>MX87498</p>
                                                            <h6>View Invoice</h6>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge badge-danger">Unpaid</span></td>
                                                    <td>
                                                        <div class="price">
                                                            <h2>$35.24</h2>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="#" class="btn btn-primary btn-lg">Ask For Review</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="info">
                                                            <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
                                                            <span>
                                                                <h4>Pizza Margherita</h4>
                                                                <p>Lorem ipsum dolor sit</p>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="invoice">
                                                            <p>MX87498</p>
                                                            <h6>View Invoice</h6>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge badge-danger">Unpaid</span></td>
                                                    <td>
                                                        <div class="price">
                                                            <h2>$35.24</h2>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="#" class="btn btn-primary btn-lg">Ask For Review</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="info">
                                                            <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
                                                            <span>
                                                                <h4>Pizza Margherita</h4>
                                                                <p>Lorem ipsum dolor sit</p>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="invoice">
                                                            <p>MX87498</p>
                                                            <h6>View Invoice</h6>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge badge-danger">Unpaid</span></td>
                                                    <td>
                                                        <div class="price">
                                                            <h2>$35.24</h2>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="#" class="btn btn-primary btn-lg">Ask For Review</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="info">
                                                            <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
                                                            <span>
                                                                <h4>Pizza Margherita</h4>
                                                                <p>Lorem ipsum dolor sit</p>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="invoice">
                                                            <p>MX87498</p>
                                                            <h6>View Invoice</h6>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge badge-danger">Unpaid</span></td>
                                                    <td>
                                                        <div class="price">
                                                            <h2>$35.24</h2>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="#" class="btn btn-primary btn-lg">Ask For Review</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="info">
                                                            <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
                                                            <span>
                                                                <h4>Pizza Margherita</h4>
                                                                <p>Lorem ipsum dolor sit</p>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="invoice">
                                                            <p>MX87498</p>
                                                            <h6>View Invoice</h6>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge badge-danger">Unpaid</span></td>
                                                    <td>
                                                        <div class="price">
                                                            <h2>$35.24</h2>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="#" class="btn btn-primary btn-lg">Ask For Review</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="info">
                                                            <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
                                                            <span>
                                                                <h4>Pizza Margherita</h4>
                                                                <p>Lorem ipsum dolor sit</p>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="invoice">
                                                            <p>MX87498</p>
                                                            <h6>View Invoice</h6>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge badge-danger">Unpaid</span></td>
                                                    <td>
                                                        <div class="price">
                                                            <h2>$35.24</h2>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="#" class="btn btn-primary btn-lg">Ask For Review</a>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="available-coupons" role="tabpanel" aria-labelledby="available-coupons-tab">
                        <div class="card">
                            <div class="card-body">
                                <div class="">
                                    <div class="table-responsive">
                                        <table id="columnSearchDatatable" class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="info">
                                                            <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(6).png') }}" alt="">
                                                            <span>
                                                                <h4>Pizza Margherita</h4>
                                                                <p>Lorem ipsum dolor sit</p>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="invoice">
                                                            <p>MX87498</p>
                                                            <h6>View Invoice</h6>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge badge-primary">Paid</span></td>
                                                    <td>
                                                        <div class="price">
                                                            <h2>$35.24</h2>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="#" class="btn btn-primary btn-lg">Ask For Review</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="info">
                                                            <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(6).png') }}" alt="">
                                                            <span>
                                                                <h4>Pizza Margherita</h4>
                                                                <p>Lorem ipsum dolor sit</p>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="invoice">
                                                            <p>MX87498</p>
                                                            <h6>View Invoice</h6>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge badge-primary">Paid</span></td>
                                                    <td>
                                                        <div class="price">
                                                            <h2>$35.24</h2>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="#" class="btn btn-primary btn-lg">Ask For Review</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="info">
                                                            <img src="{{ asset('public/assets/admin/img/NoPath---Copy-().png') }}" alt="">
                                                            <span>
                                                                <h4>Pizza Margherita</h4>
                                                                <p>Lorem ipsum dolor sit</p>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="invoice">
                                                            <p>MX87498</p>
                                                            <h6>View Invoice</h6>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge badge-danger">Unpaid</span></td>
                                                    <td>
                                                        <div class="price">
                                                            <h2>$35.24</h2>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="#" class="btn btn-primary btn-lg">Ask For Review</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="info">
                                                            <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
                                                            <span>
                                                                <h4>Pizza Margherita</h4>
                                                                <p>Lorem ipsum dolor sit</p>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="invoice">
                                                            <p>MX87498</p>
                                                            <h6>View Invoice</h6>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge badge-danger">Unpaid</span></td>
                                                    <td>
                                                        <div class="price">
                                                            <h2>$35.24</h2>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="#" class="btn btn-primary btn-lg">Ask For Review</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="info">
                                                            <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
                                                            <span>
                                                                <h4>Pizza Margherita</h4>
                                                                <p>Lorem ipsum dolor sit</p>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="invoice">
                                                            <p>MX87498</p>
                                                            <h6>View Invoice</h6>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge badge-danger">Unpaid</span></td>
                                                    <td>
                                                        <div class="price">
                                                            <h2>$35.24</h2>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="#" class="btn btn-primary btn-lg">Ask For Review</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="info">
                                                            <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
                                                            <span>
                                                                <h4>Pizza Margherita</h4>
                                                                <p>Lorem ipsum dolor sit</p>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="invoice">
                                                            <p>MX87498</p>
                                                            <h6>View Invoice</h6>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge badge-danger">Unpaid</span></td>
                                                    <td>
                                                        <div class="price">
                                                            <h2>$35.24</h2>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="#" class="btn btn-primary btn-lg">Ask For Review</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="info">
                                                            <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
                                                            <span>
                                                                <h4>Pizza Margherita</h4>
                                                                <p>Lorem ipsum dolor sit</p>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="invoice">
                                                            <p>MX87498</p>
                                                            <h6>View Invoice</h6>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge badge-danger">Unpaid</span></td>
                                                    <td>
                                                        <div class="price">
                                                            <h2>$35.24</h2>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="#" class="btn btn-primary btn-lg">Ask For Review</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="info">
                                                            <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
                                                            <span>
                                                                <h4>Pizza Margherita</h4>
                                                                <p>Lorem ipsum dolor sit</p>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="invoice">
                                                            <p>MX87498</p>
                                                            <h6>View Invoice</h6>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge badge-danger">Unpaid</span></td>
                                                    <td>
                                                        <div class="price">
                                                            <h2>$35.24</h2>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="#" class="btn btn-primary btn-lg">Ask For Review</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="info">
                                                            <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
                                                            <span>
                                                                <h4>Pizza Margherita</h4>
                                                                <p>Lorem ipsum dolor sit</p>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="invoice">
                                                            <p>MX87498</p>
                                                            <h6>View Invoice</h6>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge badge-danger">Unpaid</span></td>
                                                    <td>
                                                        <div class="price">
                                                            <h2>$35.24</h2>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="#" class="btn btn-primary btn-lg">Ask For Review</a>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="expired-coupon" role="tabpanel" aria-labelledby="expired-coupon-tab">
                        <div class="card">
                            <div class="card-body">
                                <div class="">
                                    <div class="table-responsive">
                                        <table id="columnSearchDatatable" class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="info">
                                                            <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(6).png') }}" alt="">
                                                            <span>
                                                                <h4>Pizza Margherita</h4>
                                                                <p>Lorem ipsum dolor sit</p>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="invoice">
                                                            <p>MX87498</p>
                                                            <h6>View Invoice</h6>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge badge-primary">Paid</span></td>
                                                    <td>
                                                        <div class="price">
                                                            <h2>$35.24</h2>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="#" class="btn btn-primary btn-lg">Ask For Review</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="info">
                                                            <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(6).png') }}" alt="">
                                                            <span>
                                                                <h4>Pizza Margherita</h4>
                                                                <p>Lorem ipsum dolor sit</p>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="invoice">
                                                            <p>MX87498</p>
                                                            <h6>View Invoice</h6>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge badge-primary">Paid</span></td>
                                                    <td>
                                                        <div class="price">
                                                            <h2>$35.24</h2>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="#" class="btn btn-primary btn-lg">Ask For Review</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="info">
                                                            <img src="{{ asset('public/assets/admin/img/NoPath---Copy-().png') }}" alt="">
                                                            <span>
                                                                <h4>Pizza Margherita</h4>
                                                                <p>Lorem ipsum dolor sit</p>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="invoice">
                                                            <p>MX87498</p>
                                                            <h6>View Invoice</h6>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge badge-danger">Unpaid</span></td>
                                                    <td>
                                                        <div class="price">
                                                            <h2>$35.24</h2>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="#" class="btn btn-primary btn-lg">Ask For Review</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="info">
                                                            <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
                                                            <span>
                                                                <h4>Pizza Margherita</h4>
                                                                <p>Lorem ipsum dolor sit</p>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="invoice">
                                                            <p>MX87498</p>
                                                            <h6>View Invoice</h6>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge badge-danger">Unpaid</span></td>
                                                    <td>
                                                        <div class="price">
                                                            <h2>$35.24</h2>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="#" class="btn btn-primary btn-lg">Ask For Review</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="info">
                                                            <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
                                                            <span>
                                                                <h4>Pizza Margherita</h4>
                                                                <p>Lorem ipsum dolor sit</p>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="invoice">
                                                            <p>MX87498</p>
                                                            <h6>View Invoice</h6>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge badge-danger">Unpaid</span></td>
                                                    <td>
                                                        <div class="price">
                                                            <h2>$35.24</h2>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="#" class="btn btn-primary btn-lg">Ask For Review</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="info">
                                                            <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
                                                            <span>
                                                                <h4>Pizza Margherita</h4>
                                                                <p>Lorem ipsum dolor sit</p>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="invoice">
                                                            <p>MX87498</p>
                                                            <h6>View Invoice</h6>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge badge-danger">Unpaid</span></td>
                                                    <td>
                                                        <div class="price">
                                                            <h2>$35.24</h2>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="#" class="btn btn-primary btn-lg">Ask For Review</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="info">
                                                            <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
                                                            <span>
                                                                <h4>Pizza Margherita</h4>
                                                                <p>Lorem ipsum dolor sit</p>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="invoice">
                                                            <p>MX87498</p>
                                                            <h6>View Invoice</h6>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge badge-danger">Unpaid</span></td>
                                                    <td>
                                                        <div class="price">
                                                            <h2>$35.24</h2>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="#" class="btn btn-primary btn-lg">Ask For Review</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="info">
                                                            <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
                                                            <span>
                                                                <h4>Pizza Margherita</h4>
                                                                <p>Lorem ipsum dolor sit</p>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="invoice">
                                                            <p>MX87498</p>
                                                            <h6>View Invoice</h6>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge badge-danger">Unpaid</span></td>
                                                    <td>
                                                        <div class="price">
                                                            <h2>$35.24</h2>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="#" class="btn btn-primary btn-lg">Ask For Review</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="info">
                                                            <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
                                                            <span>
                                                                <h4>Pizza Margherita</h4>
                                                                <p>Lorem ipsum dolor sit</p>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="invoice">
                                                            <p>MX87498</p>
                                                            <h6>View Invoice</h6>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge badge-danger">Unpaid</span></td>
                                                    <td>
                                                        <div class="price">
                                                            <h2>$35.24</h2>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="#" class="btn btn-primary btn-lg">Ask For Review</a>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>



    </div>
    <!-- Modal -->
    <div class="modal fade" id="customerModalCenter" tabindex="-1" role="dialog" aria-labelledby="customerModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">

                    <div class="row">
                        <div class="col-lg-8">
                            <h1 class="mb-0">Alissia Charles</h1>
                            <p class="mb-5">Custoumer</p>
                        </div>
                        <div class="col-lg-4 text-right">
                            <div class="mb-2">
                                <a href="#" class="text-dark mr-3">
                                    <i class="icon-download_data_icon"></i>
                                </a>
                                <a href="#" class="text-dark">
                                    <i class="icon-computers_hardware_print_printer_icon"></i>
                                </a>
                            </div>
                            <p class="text-grey">Order #533</p>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-4">
                            <p class=" mb-0">Customer Type</p>
                            <p class="text-dark fw-500 mb-0">Repeat</p>
                        </div>
                        <div class="col-lg-4">
                            <p class=" mb-0">Order Date</p>
                            <p class="text-dark fw-500 mb-0">09/16/2022</p>
                        </div>
                        <div class="col-lg-4">
                            <p class=" mb-0">Status</p>
                            <p class="text-dark fw-500 mb-0">In Progress</p>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="columnSearchDatatable" class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                            <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>Time</th>
                                    <th>Qty</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>
                                        <div class="info">
                                            <img src="{{ asset('public/assets/admin/img/pexels-ana-madeleine-uribe-27629423.png') }}" alt="">
                                            <span>
                                                <h4>Pizza Margherita</h4>
                                                <p>Lorem ipsum dolor sit</p>
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                            <p class="mb-0 text-dark">12 min Ago</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                            <p class="mb-0 text-dark">(02)</p>
                                        </div>
                                    </td>

                                </tr>

                                <tr>
                                    <td>
                                        <div class="info">
                                            <img src="{{ asset('public/assets/admin/img/pexels-ana-madeleine-uribe-27629423.png') }}" alt="">
                                            <span>
                                                <h4>Pizza Margherita</h4>
                                                <p>Lorem ipsum dolor sit</p>
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                            <p class="mb-0 text-dark">12 min Ago</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                            <p class="mb-0 text-dark">(02)</p>
                                        </div>
                                    </td>

                                </tr>

                                <tr>
                                    <td>
                                        <div class="info">
                                            <img src="{{ asset('public/assets/admin/img/pexels-ana-madeleine-uribe-27629423.png') }}" alt="">
                                            <span>
                                                <h4>Pizza Margherita</h4>
                                                <p>Lorem ipsum dolor sit</p>
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                            <p class="mb-0 text-dark">12 min Ago</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                            <p class="mb-0 text-dark">(02)</p>
                                        </div>
                                    </td>

                                </tr>

                            </tbody>
                        </table>
                    </div>

                    <button type="button" class="btn btn-primary btn-lg">Back</button>
                </div>

            </div>
        </div>
    </div>
    @endsection
</body>