@extends('layouts.vendor.app')

@section('title', __('Subscriptions'))

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
                    Subscriptions
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
                                    <img src="{{ asset('public/assets/admin/img/pexels-ana-madeleine-uribe-2762942.png') }}" alt="">
                                </div>
                                <div>
                                    <img src="{{ asset('public/assets/admin/img/pexels-ana-madeleine-uribe-27629421.png') }}" alt="">
                                </div>
                                <div>
                                    <img src="{{ asset('public/assets/admin/img/pexels-ana-madeleine-uribe-27629422png.png') }}" alt="">
                                </div>
                                <div>
                                    <img src="{{ asset('public/assets/admin/img/pexels-ana-madeleine-uribe-27629423.png') }}" alt="">
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
                                    <img src="{{ asset('public/assets/admin/img/pexels-ana-madeleine-uribe-2762942.png') }}" alt="">
                                </div>
                                <div>
                                    <img src="{{ asset('public/assets/admin/img/pexels-ana-madeleine-uribe-27629421.png') }}" alt="">
                                </div>
                                <div>
                                    <img src="{{ asset('public/assets/admin/img/pexels-ana-madeleine-uribe-27629422png.png') }}" alt="">
                                </div>
                                <div>
                                    <img src="{{ asset('public/assets/admin/img/pexels-ana-madeleine-uribe-27629423.png') }}" alt="">
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
                                        <img src="{{ asset('public/assets/admin/img/Untitled-1.png') }}" alt="">
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
                                        <img src="{{ asset('public/assets/admin/img/Untitled-2.png') }}" alt="">
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


                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-7">
                                <h1 class="page-header-title">
                                    Mushroom Pizza
                                </h1>
                            </div>
                            <div class="col-lg-5">
                                <div class="sltoption justify-content-end">
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
                        <h2 class="mb-4">Recurring Purchase</h2>
                        <div class=" form-group">
                            <label class="input-label" for="">Select</label>
                            <select name="" id="" class="custom-select custom-select-lg">
                                <option value="">Specific Date</option>
                                <option value="">More than 4</option>
                                <option value="">More than 4</option>
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-6">
                                <div class=" form-group">
                                    <label class="input-label" for="">Starting Date</label>
                                    <input id="date_timepicker_start" type="text" class="form-control form-control-lg" name="" placeholder="dd/mm/yyyy">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class=" form-group">
                                    <label class="input-label" for="">End Date</label>
                                    <input id="date_timepicker_end" type="text" class="form-control form-control-lg" name="" placeholder="dd/mm/yyyy">
                                </div>
                            </div>
                        </div>
                        <h2 class="mb-4">Select Order</h2>
                        <div class="form-row">
                            <div class="col-lg-6">
                                <div class=" form-group">
                                    <label class="input-label" for="">Frequency</label>
                                    <input type="text" class="form-control form-control-lg" name="" placeholder="Weekly">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class=" form-group">
                                    <label class="input-label" for="">Every</label>
                                    <select name="" id="" class="custom-select custom-select-lg">
                                        <option value="">01 week(s)</option>
                                        <option value="">More than 4</option>
                                        <option value="">More than 4</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="custom-control custom-checkbox mb-2">
                                    <input type="checkbox" class="custom-control-input" id="Veggie">
                                    <label class="custom-control-label" for="Veggie">Veggie Pizza</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-2">
                                    <input type="checkbox" class="custom-control-input" id="Pepperoni">
                                    <label class="custom-control-label" for="Pepperoni">Pepperoni Pizza</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-2">
                                    <input type="checkbox" class="custom-control-input" id="Meat">
                                    <label class="custom-control-label" for="Meat">Meat Pizza</label>
                                </div>

                            </div>
                            <div class="col-lg-4">
                                <div class="custom-control custom-checkbox mb-2">
                                    <input type="checkbox" class="custom-control-input" id="Margherita">
                                    <label class="custom-control-label" for="Margherita">Margherita Pizza</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-2">
                                    <input type="checkbox" class="custom-control-input" id="BBQ">
                                    <label class="custom-control-label" for="BBQ">BBQ Chicken Pizza</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-2">
                                    <input type="checkbox" class="custom-control-input" id="Hawaiian">
                                    <label class="custom-control-label" for="Hawaiian">Hawaiian Pizza</label>
                                </div>
                            </div>
                        </div>
                        <div class="input-group quantity-add">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                                    <i class="icon-minus_round_icon"></i>
                                </button>
                            </span>
                            $<input type="text" name="quant[1]" class="input-number" value="35.24" min="8" max="3000">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                                    <i class="icon-plus_round_icon"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="title">Invoice</h4>
                        <div class="small-table">
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
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card chart-card">
                    <div class="card-body">
                        <h4 class="title">Recurring Orders</h4>
                        <select class="custom-select" name="">
                            <option value="overall" selected="">
                                weekly
                            </option>
                            <option value="today">
                                Today'
                            </option>
                            <option value="today">
                                Today'
                            </option>
                        </select>
                        <div class="small-table">
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
                                            <td><span class="badge badge-danger">Unpaid</span></td>
                                            <td>
                                                <div class="price">
                                                    <h2>$35.24</h2>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
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
                                        <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(6).png') }}" alt="">
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
                                        <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
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
                                        <img src="{{ asset('public/assets/admin/img/NoPath---Copy-().png') }}" alt="">
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
                                        <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(6).png') }}" alt="">
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