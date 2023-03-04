@extends('layouts.vendor.app')

@section('title', __('Profile'))

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
            <div class="col-xl-4 col-lg-6">
                <div class="inline-select">
                    <label for="" class="">Sort by</label>
                    <select id="" class="custom-select custom-select-lg">
                        <option selected>Best Seller</option>
                        <option>...</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-8 col-lg-6 mt-lg-0 mt-3 text-lg-right">
                <a href="#" class="btn btn-primary btn-lg ml-sm-3 mt-lg-0 mt-2" data-toggle="modal" data-target="#addproductModalCenter">Add More Products</a>
            </div>
        </div>

        <div class="product-cards mt-5">
            <input type='hidden' id='current_page' />
            <input type='hidden' id='show_per_page' />
            <div class="row" id="pagingBox">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="product-img">
                                <img src="{{ asset('public/assets/admin/img/pizza.png') }}" alt="">
                            </div>
                            <div class="content">
                                <div class="name-price">
                                    <h4>Mushroom Pizza</h4>
                                    <p>$35.24</p>
                                </div>
                                <div class="star">
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    (07)
                                </div>
                                <div class="sltoption">
                                    <img src="{{ asset('public/assets/admin/img/vegan.png') }}" alt="">
                                    <img src="{{ asset('public/assets/admin/img/madetoorder.png') }}" alt="">
                                    <img src="{{ asset('public/assets/admin/img/nutfree.png') }}" alt="">
                                </div>

                            </div>
                            <div class="action">
                                <a href="#">
                                    <i class="icon-edit_icon"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="product-img">
                                <img src="{{ asset('public/assets/admin/img/pizza.png') }}" alt="">
                            </div>
                            <div class="content">
                                <div class="name-price">
                                    <h4>Mushroom Pizza</h4>
                                    <p>$35.24</p>
                                </div>
                                <div class="star">
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    (07)
                                </div>
                                <div class="sltoption">
                                    <img src="{{ asset('public/assets/admin/img/vegan.png') }}" alt="">
                                    <img src="{{ asset('public/assets/admin/img/madetoorder.png') }}" alt="">
                                    <img src="{{ asset('public/assets/admin/img/nutfree.png') }}" alt="">
                                </div>

                            </div>
                            <div class="action">
                                <a href="#">
                                    <i class="icon-edit_icon"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="product-img">
                                <img src="{{ asset('public/assets/admin/img/pizza.png') }}" alt="">
                            </div>
                            <div class="content">
                                <div class="name-price">
                                    <h4>Mushroom Pizza</h4>
                                    <p>$35.24</p>
                                </div>
                                <div class="star">
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    (07)
                                </div>
                                <div class="sltoption">
                                    <img src="{{ asset('public/assets/admin/img/vegan.png') }}" alt="">
                                    <img src="{{ asset('public/assets/admin/img/madetoorder.png') }}" alt="">
                                    <img src="{{ asset('public/assets/admin/img/nutfree.png') }}" alt="">
                                </div>

                            </div>
                            <div class="action">
                                <a href="#">
                                    <i class="icon-edit_icon"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="product-img">
                                <img src="{{ asset('public/assets/admin/img/pizza.png') }}" alt="">
                            </div>
                            <div class="content">
                                <div class="name-price">
                                    <h4>Mushroom Pizza</h4>
                                    <p>$35.24</p>
                                </div>
                                <div class="star">
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    (07)
                                </div>
                                <div class="sltoption">
                                    <img src="{{ asset('public/assets/admin/img/vegan.png') }}" alt="">
                                    <img src="{{ asset('public/assets/admin/img/madetoorder.png') }}" alt="">
                                    <img src="{{ asset('public/assets/admin/img/nutfree.png') }}" alt="">
                                </div>

                            </div>
                            <div class="action">
                                <a href="#">
                                    <i class="icon-edit_icon"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="product-img">
                                <img src="{{ asset('public/assets/admin/img/pizza.png') }}" alt="">
                            </div>
                            <div class="content">
                                <div class="name-price">
                                    <h4>Mushroom Pizza</h4>
                                    <p>$35.24</p>
                                </div>
                                <div class="star">
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    (07)
                                </div>
                                <div class="sltoption">
                                    <img src="{{ asset('public/assets/admin/img/vegan.png') }}" alt="">
                                    <img src="{{ asset('public/assets/admin/img/madetoorder.png') }}" alt="">
                                    <img src="{{ asset('public/assets/admin/img/nutfree.png') }}" alt="">
                                </div>

                            </div>
                            <div class="action">
                                <a href="#">
                                    <i class="icon-edit_icon"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="product-img">
                                <img src="{{ asset('public/assets/admin/img/pizza.png') }}" alt="">
                            </div>
                            <div class="content">
                                <div class="name-price">
                                    <h4>Mushroom Pizza</h4>
                                    <p>$35.24</p>
                                </div>
                                <div class="star">
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    (07)
                                </div>
                                <div class="sltoption">
                                    <img src="{{ asset('public/assets/admin/img/vegan.png') }}" alt="">
                                    <img src="{{ asset('public/assets/admin/img/madetoorder.png') }}" alt="">
                                    <img src="{{ asset('public/assets/admin/img/nutfree.png') }}" alt="">
                                </div>

                            </div>
                            <div class="action">
                                <a href="#">
                                    <i class="icon-edit_icon"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="product-img">
                                <img src="{{ asset('public/assets/admin/img/pizza.png') }}" alt="">
                            </div>
                            <div class="content">
                                <div class="name-price">
                                    <h4>Mushroom Pizza</h4>
                                    <p>$35.24</p>
                                </div>
                                <div class="star">
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    (07)
                                </div>
                                <div class="sltoption">
                                    <img src="{{ asset('public/assets/admin/img/vegan.png') }}" alt="">
                                    <img src="{{ asset('public/assets/admin/img/madetoorder.png') }}" alt="">
                                    <img src="{{ asset('public/assets/admin/img/nutfree.png') }}" alt="">
                                </div>

                            </div>
                            <div class="action">
                                <a href="#">
                                    <i class="icon-edit_icon"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="product-img">
                                <img src="{{ asset('public/assets/admin/img/pizza.png') }}" alt="">
                            </div>
                            <div class="content">
                                <div class="name-price">
                                    <h4>Mushroom Pizza</h4>
                                    <p>$35.24</p>
                                </div>
                                <div class="star">
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    (07)
                                </div>
                                <div class="sltoption">
                                    <img src="{{ asset('public/assets/admin/img/vegan.png') }}" alt="">
                                    <img src="{{ asset('public/assets/admin/img/madetoorder.png') }}" alt="">
                                    <img src="{{ asset('public/assets/admin/img/nutfree.png') }}" alt="">
                                </div>

                            </div>
                            <div class="action">
                                <a href="#">
                                    <i class="icon-edit_icon"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="product-img">
                                <img src="{{ asset('public/assets/admin/img/pizza.png') }}" alt="">
                            </div>
                            <div class="content">
                                <div class="name-price">
                                    <h4>Mushroom Pizza</h4>
                                    <p>$35.24</p>
                                </div>
                                <div class="star">
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    (07)
                                </div>
                                <div class="sltoption">
                                    <img src="{{ asset('public/assets/admin/img/vegan.png') }}" alt="">
                                    <img src="{{ asset('public/assets/admin/img/madetoorder.png') }}" alt="">
                                    <img src="{{ asset('public/assets/admin/img/nutfree.png') }}" alt="">
                                </div>

                            </div>
                            <div class="action">
                                <a href="#">
                                    <i class="icon-edit_icon"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="product-img">
                                <img src="{{ asset('public/assets/admin/img/pizza.png') }}" alt="">
                            </div>
                            <div class="content">
                                <div class="name-price">
                                    <h4>Mushroom Pizza</h4>
                                    <p>$35.24</p>
                                </div>
                                <div class="star">
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    (07)
                                </div>
                                <div class="sltoption">
                                    <img src="{{ asset('public/assets/admin/img/vegan.png') }}" alt="">
                                    <img src="{{ asset('public/assets/admin/img/madetoorder.png') }}" alt="">
                                    <img src="{{ asset('public/assets/admin/img/nutfree.png') }}" alt="">
                                </div>

                            </div>
                            <div class="action">
                                <a href="#">
                                    <i class="icon-edit_icon"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="product-img">
                                <img src="{{ asset('public/assets/admin/img/pizza.png') }}" alt="">
                            </div>
                            <div class="content">
                                <div class="name-price">
                                    <h4>Mushroom Pizza</h4>
                                    <p>$35.24</p>
                                </div>
                                <div class="star">
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    (07)
                                </div>
                                <div class="sltoption">
                                    <img src="{{ asset('public/assets/admin/img/vegan.png') }}" alt="">
                                    <img src="{{ asset('public/assets/admin/img/madetoorder.png') }}" alt="">
                                    <img src="{{ asset('public/assets/admin/img/nutfree.png') }}" alt="">
                                </div>

                            </div>
                            <div class="action">
                                <a href="#">
                                    <i class="icon-edit_icon"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="product-img">
                                <img src="{{ asset('public/assets/admin/img/pizza.png') }}" alt="">
                            </div>
                            <div class="content">
                                <div class="name-price">
                                    <h4>Mushroom Pizza</h4>
                                    <p>$35.24</p>
                                </div>
                                <div class="star">
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    (07)
                                </div>
                                <div class="sltoption">
                                    <img src="{{ asset('public/assets/admin/img/vegan.png') }}" alt="">
                                    <img src="{{ asset('public/assets/admin/img/madetoorder.png') }}" alt="">
                                    <img src="{{ asset('public/assets/admin/img/nutfree.png') }}" alt="">
                                </div>

                            </div>
                            <div class="action">
                                <a href="#">
                                    <i class="icon-edit_icon"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="product-img">
                                <img src="{{ asset('public/assets/admin/img/pizza.png') }}" alt="">
                            </div>
                            <div class="content">
                                <div class="name-price">
                                    <h4>Mushroom Pizza</h4>
                                    <p>$35.24</p>
                                </div>
                                <div class="star">
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    (07)
                                </div>
                                <div class="sltoption">
                                    <img src="{{ asset('public/assets/admin/img/vegan.png') }}" alt="">
                                    <img src="{{ asset('public/assets/admin/img/madetoorder.png') }}" alt="">
                                    <img src="{{ asset('public/assets/admin/img/nutfree.png') }}" alt="">
                                </div>

                            </div>
                            <div class="action">
                                <a href="#">
                                    <i class="icon-edit_icon"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="product-img">
                                <img src="{{ asset('public/assets/admin/img/pizza.png') }}" alt="">
                            </div>
                            <div class="content">
                                <div class="name-price">
                                    <h4>Mushroom Pizza</h4>
                                    <p>$35.24</p>
                                </div>
                                <div class="star">
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    (07)
                                </div>
                                <div class="sltoption">
                                    <img src="{{ asset('public/assets/admin/img/vegan.png') }}" alt="">
                                    <img src="{{ asset('public/assets/admin/img/madetoorder.png') }}" alt="">
                                    <img src="{{ asset('public/assets/admin/img/nutfree.png') }}" alt="">
                                </div>

                            </div>
                            <div class="action">
                                <a href="#">
                                    <i class="icon-edit_icon"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="product-img">
                                <img src="{{ asset('public/assets/admin/img/pizza.png') }}" alt="">
                            </div>
                            <div class="content">
                                <div class="name-price">
                                    <h4>Mushroom Pizza</h4>
                                    <p>$35.24</p>
                                </div>
                                <div class="star">
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    <i class="icon-star_icon"></i>
                                    (07)
                                </div>
                                <div class="sltoption">
                                    <img src="{{ asset('public/assets/admin/img/vegan.png') }}" alt="">
                                    <img src="{{ asset('public/assets/admin/img/madetoorder.png') }}" alt="">
                                    <img src="{{ asset('public/assets/admin/img/nutfree.png') }}" alt="">
                                </div>

                            </div>
                            <div class="action">
                                <a href="#">
                                    <i class="icon-edit_icon"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id='page_navigation'></div>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="addproductModalCenter" tabindex="-1" role="dialog" aria-labelledby="addproductModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Select Product Type</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="form-group">
                        <select id="" class="custom-select custom-select-lg">
                            <option selected>Pre-order</option>
                            <option>...</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-primary btn-lg">Save changes</button>
                </div>

            </div>
        </div>
    </div>
    @endsection


</body>