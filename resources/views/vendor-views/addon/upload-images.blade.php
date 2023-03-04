@extends('layouts.vendor.app')

@section('title', __('Add Product'))

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
                        Add Product
                    </h1>
                </div>
            </div>
        </div>
        <!-- End Page Header -->

        <div class="product-form">

            <div class="row">
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-head">
                                <a href="#"><i class="icon-arrow-left"></i></a>
                                <div>
                                    <a href="#"><i class="icon-trash"></i>Delete</a>
                                    <a href="#"><i class="icon-document"></i>Duplicate</a>
                                </div>
                            </div>
                            <form class="" action="" method="post" id="">
                                <!-- Form Group -->
                                <div class=" form-group">
                                    <label class="input-label" for="">Product Name *</label>
                                    <input type="text" class="form-control form-control-lg" name="" placeholder="Name">
                                </div>
                                <div class=" form-group">
                                    <label class="input-label" for="">Description *</label>
                                    <textarea name="" id="" cols="" rows="4" class="form-control form-control-lg"></textarea>
                                </div>


                                <div class=" form-group">
                                    <label class="input-label" for="">Add Ingredients</label>
                                    <div class="search-form">
                                        <!-- Search -->
                                        <div class="input-group input-group-merge input-group-flush">
                                            <div class="input-group-prepend">
                                                <button type="submit" class="">
                                                    <div class="input-group-text">
                                                        <i class="icon-Path-11"></i>
                                                    </div>
                                                </button>
                                            </div>
                                            <input id="" type="search" name="search" class="form-control form-control-lg" placeholder="Search here" aria-label="Search by related things">

                                        </div>
                                        <!-- End Search -->
                                    </div>
                                    <div class="tags">
                                        <div class="alert alert-primary fade show" role="alert">
                                            One Tag
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="alert alert-primary fade show" role="alert">
                                            One Tag
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="alert alert-primary fade show" role="alert">
                                            One Tag
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class=" form-group">
                                    <label class="input-label" for="">Add Allergens</label>
                                    <div class="search-form">
                                        <!-- Search -->
                                        <div class="input-group input-group-merge input-group-flush">
                                            <div class="input-group-prepend">
                                                <button type="submit" class="">
                                                    <div class="input-group-text">
                                                        <i class="icon-Path-11"></i>
                                                    </div>
                                                </button>
                                            </div>
                                            <input id="" type="search" name="search" class="form-control form-control-lg" placeholder="Search here" aria-label="Search by related things">

                                        </div>
                                        <!-- End Search -->
                                    </div>
                                    <div class="tags">
                                        <div class="alert alert-primary fade show" role="alert">
                                            One Tag
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="alert alert-primary fade show" role="alert">
                                            One Tag
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="alert alert-primary fade show" role="alert">
                                            One Tag
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class=" form-group">
                                    <label class="input-label" for="">Unit</label>
                                    <input type="text" class="form-control form-control-lg" name="" placeholder="Please enter the quantity or size">
                                </div>
                                <div class=" form-group">
                                    <label class="input-label" for="">Add-On</label>
                                    <input type="text" class="form-control form-control-lg" name="" placeholder="Item 1">
                                </div>

                                <div class=" form-group">
                                    <a href="#">Create More Add-On</a>
                                </div>
                                <div class=" form-group">
                                    <label class="input-label" for="">Serves</label>
                                    <select name="" id="" class="custom-select custom-select-lg">
                                        <option value="">More than 4...</option>
                                        <option value="">More than 4</option>
                                        <option value="">More than 4</option>
                                    </select>
                                </div>
                                <div class=" form-group">
                                    <label class="input-label" for="">Add Labels</label>
                                    <select name="" id="" class="custom-select custom-select-lg">
                                        <option value="">Please select one or multiple labels from dropdown</option>
                                        <option value="">Item 1</option>
                                        <option value="">Item 1</option>
                                        <option value="">Item 1</option>
                                    </select>
                                </div>



                                <div class=" form-group">
                                    <label class="input-label" for="">Add Related Tags</label>
                                    <div class="search-form">
                                        <!-- Search -->
                                        <div class="input-group input-group-merge input-group-flush">
                                            <div class="input-group-prepend">
                                                <button type="submit" class="">
                                                    <div class="input-group-text">
                                                        <i class="icon-Path-11"></i>
                                                    </div>
                                                </button>
                                            </div>
                                            <input id="" type="search" name="search" class="form-control" placeholder="Search here" aria-label="Search by related things">

                                        </div>
                                        <!-- End Search -->
                                    </div>
                                    <div class="tags">
                                        <div class="alert alert-primary fade show" role="alert">
                                            One Tag
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="alert alert-primary fade show" role="alert">
                                            One Tag
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="alert alert-primary fade show" role="alert">
                                            One Tag
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>


                                <div class=" form-group">
                                    <label class="input-label" for="">Default Prize</label>
                                    <div class="search-form">
                                        <!-- Search -->
                                        <div class="input-group input-group-merge input-group-flush">
                                            <div class="input-group-prepend">
                                                <button type="submit" class="">
                                                    <div class="input-group-text">
                                                        <i class="icon-banking_currency_dollar_icon"></i>
                                                    </div>
                                                </button>
                                            </div>
                                            <input id="" type="number" name="search" class="form-control" placeholder="67.00">

                                        </div>
                                        <!-- End Search -->
                                    </div>
                                </div>
                                <div class=" form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customControlInline">
                                        <label class="custom-control-label" for="customControlInline">Product Is Out Of Stock</label>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-primary btn-lg">Save Now</a>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="uploadimgs insert-img">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-row">

                                    <div class="img">
                                        <img src="{{ asset('public/assets/admin/img/Group-173.jpg') }}" alt="">
                                        <div class="action-btn">
                                            <button><i class="icon-Pin"></i></button>
                                            <button><i class="icon-trash"></i></button>
                                        </div>
                                    </div>

                                    <div class="img">
                                        <img src="{{ asset('public/assets/admin/img/Group-174.jpg') }}" alt="">
                                        <div class="action-btn">
                                            <button class="pinned"><i class="icon-Pin"></i></button>
                                        </div>
                                    </div>
                                    
                                    <div class="img">
                                        <img src="{{ asset('public/assets/admin/img/Group-176.jpg') }}" alt="">
                                        
                                    </div>
                                    <div class="img">
                                        <img src="{{ asset('public/assets/admin/img/Group-177.jpg') }}" alt="">
                                        <div class="action-btn">
                                            <button class="pinned"><i class="icon-Pin"></i></button>
                                        </div>
                                    </div>


                                </div>
                                <div class="inputgroup">
                                    <div class="input-group-prepend">
                                        <i class="icon-plus_round_icon"></i>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01">
                                        <label class="custom-file-label" for="inputGroupFile01">Upload Images/Video <p>Select file</p></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @endsection
</body>