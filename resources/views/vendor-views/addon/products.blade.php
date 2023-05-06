@extends('layouts.vendor.app')

@section('title', __('Products'))

@push('css_or_js')
    <style>
        .drophere {
            float: left;
            /* margin-left: 100px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            width: 200px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            height: 50px; */
            /* border: 1px solid red; */
            padding: 5px;
        }

        .draghere {
            /* width: 200px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            height: 50px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            background: green; */
            text-align: center;
            line-height: 50px;
        }

        .ui-draggable-dragging {
            background: blue;
        }

        /* .hoverClass {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            border: 2px solid red;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            background: black;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        } */
    </style>
@endpush


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
                <div class="inline-select mt-2">
                    <label for="" class="">Sort by</label>
                    <select id="" class="custom-select custom-select-lg">
                        <option selected>Best Seller</option>
                        <option>...</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-8 col-lg-6 mt-lg-0 mt-3 text-lg-right">
                <a href="#" class="btn btn-secondary select-products btn-lg bulk-action mt-2">Bulk Select</a>
                <a id="btnMoveToGroup" href="#" class="btn btn-primary btn-lg ml-sm-2 mt-2" data-toggle="modal"
                    data-target="#productModalCenter">Bulk Action</a>
                <a href="{{ route('vendor.addon.categories') }}"
                    class="btn btn-secondary btn-lg sltcateg  ml-sm-3 mt-2">View All
                    Categories</a>
                <a href="" class="btn btn-primary btn-lg ml-sm-3 mt-2" data-toggle="modal"
                    data-target="#addproductModalCenter">Add More Products</a>
            </div>
        </div>
        <!-- Modal -->
        <div style="" class="modal fade" id="productModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="productModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Bulk Actions</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="form-group">
                            <label class="">Product Status</label>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="productSwitch" checked>
                                <label id="lblproductstatus" class="custom-control-label" for="productSwitch">Active</label>
                            </div>
                            <div class="inline-select mt-3">
                                <label for="" class="">Select Category</label>
                                <select id="modalSelectProductGroup" class="custom-select custom-select-lg">
                                    <option cat-id="0" selected> Select Category </option>
                                    @foreach ($categories as $category)
                                        <option cat-id={{ $category->id }} value={{ $category->id }}>{{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button id="btnSaveNow" type="button" class="btn btn-primary btn-lg">Save Now</button>
                        <button id="btnDelete" type="button" class="btn btn-primary btn-danger btn-lg">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->

        <div id="sortable-list" class="row">
            @foreach ($products as $product)
                <div class="custom-control custom-checkbox product-checkbox pcheck">
                    {{-- <input type="checkbox" class="custom-control-input" id="customCheck1"> --}}
                    <input type="checkbox" class="custom-control-input" data-id="{{ $product->id }}"
                        id="{{ 'customCheck[' . $product->id . ']' }}">
                    <label class="custom-control-label" for="{{ 'customCheck[' . $product->id . ']' }}">
                        <div class="card"data-id="{{ $product->id }}">

                            <div class="card-body">
                                <div class="product-img">
                                    {{-- <img src="{{ asset('public/assets/admin/img/pizza.png') }}" alt=""> --}}
                                    @if (!empty($product->feature_video))
                                        <video src="{{ $product->feature_video }}" controls></video>
                                    @elseif (!empty($product->feature_image))
                                        <img src="{{ $product->feature_image }}" alt="">
                                    @else
                                        <img src="{{ $product->image }}" alt="">
                                    @endif
                                </div>
                                <div class="content">
                                    <div class="name-price">
                                        <a href="{{ route('vendor.addon.product-detail', ['id' => $product->id]) }}">
                                            <h4>{{ $product->name }}</h4>
                                        </a>
                                        <p>${{ $product->price }}</p>
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
                                        <!--<img src="{{ asset('public/assets/admin/img/vegan.png') }}" alt="">-->
                                        <!--<img src="{{ asset('public/assets/admin/img/madetoorder.png') }}" alt="">-->
                                        <!--<img src="{{ asset('public/assets/admin/img/nutfree.png') }}" alt="">-->
                                        @php
                                            $badgeImages = json_decode($product?->badges);
                                        @endphp
                                        @if (!empty($badgeImages))
                                            @foreach ($badgeImages as $items)
                                                {{ $items }}
                                            @endforeach
                                        @endif
                                    </div>

                                </div>
                                <div class="action">
                                    <a href="{{ route('vendor.addon.product.edit', ['id' => $product->id]) }}">
                                        <i class="icon-edit_icon"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
            @endforeach
        </div>

        <div class="product-cards mt-5 d-none" id="grid">
            <input type='hidden' id='current_page' />
            <input type='hidden' id='show_per_page' />
            <div class="row" id="pagingBox">

                @foreach ($products as $product)
                    <div class="col-lg-4 ">
                        <div class="custom-control custom-checkbox product-checkbox pcheck">
                            {{-- <input type="checkbox" class="custom-control-input" id="customCheck1"> --}}
                            <input type="checkbox" class="custom-control-input" data-id="{{ $product->id }}"
                                id="{{ 'customCheck[' . $product->id . ']' }}">
                            <label class="custom-control-label" for="{{ 'customCheck[' . $product->id . ']' }}">
                                <div class="card item">
                                    <div class="card-body" data-id="{{ $product->id }}">
                                        <div class="product-img">
                                            {{-- <img src="{{ asset('public/assets/admin/img/pizza.png') }}" alt=""> --}}
                                            @if (!empty($product->feature_video))
                                                <video src="{{ $product->feature_video }}" controls></video>
                                            @elseif (!empty($product->feature_image))
                                                dd($product->feature_image)
                                                <img src="{{ $product->feature_image }}" alt="">
                                            @else
                                                <img src="{{ $product->image }}" alt="">
                                            @endif
                                        </div>
                                        <div class="content">
                                            <div class="name-price">
                                                <a
                                                    href="{{ route('vendor.addon.product-detail', ['id' => $product->id]) }}">
                                                    <h4>{{ $product->name }}</h4>
                                                </a>
                                                <p>${{ $product->price }}</p>
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
                                                <!--<img src="{{ asset('public/assets/admin/img/vegan.png') }}" alt="">-->
                                                <!--<img src="{{ asset('public/assets/admin/img/madetoorder.png') }}" alt="">-->
                                                <!--<img src="{{ asset('public/assets/admin/img/nutfree.png') }}" alt="">-->
                                                @php
                                                    $badgeImages = json_decode($product?->badges);
                                                @endphp
                                                @if (!empty($badgeImages))
                                                    @foreach ($badgeImages as $items)
                                                        {{ $items }}
                                                    @endforeach
                                                @endif
                                            </div>

                                        </div>
                                        <div class="action">
                                            <a href="{{ route('vendor.addon.product.edit', ['id' => $product->id]) }}">
                                                <i class="icon-edit_icon"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </label>
                        </div>

                    </div>
                @endforeach

                {{-- <div class="col-lg-4">
                        <div class="custom-control custom-checkbox product-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                            <label class="custom-control-label" for="customCheck2">
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
                            </label>
                          </div>
                       
                    </div>
                    <div class="col-lg-4">
                        <div class="custom-control custom-checkbox product-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck3">
                            <label class="custom-control-label" for="customCheck3">
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
                            </label>
                          </div>
                       
                    </div>
                    <div class="col-lg-4">
                        <div class="custom-control custom-checkbox product-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck4">
                            <label class="custom-control-label" for="customCheck4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="product-img">
                                            <img src="{{ asset('public/assets/admin/img/donuts.png') }}" alt="">
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
                            </label>
                          </div>
                       
                    </div>
                    <div class="col-lg-4">
                        <div class="custom-control custom-checkbox product-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck5">
                            <label class="custom-control-label" for="customCheck5">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="product-img">
                                            <img src="{{ asset('public/assets/admin/img/donuts.png') }}" alt="">
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
                            </label>
                          </div>
                       
                    </div>
                    <div class="col-lg-4">
                        <div class="custom-control custom-checkbox product-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck6">
                            <label class="custom-control-label" for="customCheck6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="product-img">
                                            <img src="{{ asset('public/assets/admin/img/donuts.png') }}" alt="">
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
                            </label>
                          </div>
                       
                    </div>
                  
                    <div class="col-lg-4">
                        <div class="custom-control custom-checkbox product-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck7">
                            <label class="custom-control-label" for="customCheck7">
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
                            </label>
                          </div>
                       
                    </div>
                    <div class="col-lg-4">
                        <div class="custom-control custom-checkbox product-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck8">
                            <label class="custom-control-label" for="customCheck8">
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
                            </label>
                          </div>
                       
                    </div>
                    <div class="col-lg-4">
                        <div class="custom-control custom-checkbox product-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck9">
                            <label class="custom-control-label" for="customCheck9">
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
                            </label>
                          </div>
                       
                    </div>
                    <div class="col-lg-4">
                        <div class="custom-control custom-checkbox product-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck10">
                            <label class="custom-control-label" for="customCheck10">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="product-img">
                                            <img src="{{ asset('public/assets/admin/img/donuts.png') }}" alt="">
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
                            </label>
                          </div>
                       
                    </div>
                    <div class="col-lg-4">
                        <div class="custom-control custom-checkbox product-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck11">
                            <label class="custom-control-label" for="customCheck11">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="product-img">
                                            <img src="{{ asset('public/assets/admin/img/donuts.png') }}" alt="">
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
                            </label>
                          </div>
                       
                    </div>
                    <div class="col-lg-4">
                        <div class="custom-control custom-checkbox product-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck12">
                            <label class="custom-control-label" for="customCheck12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="product-img">
                                            <img src="{{ asset('public/assets/admin/img/donuts.png') }}" alt="">
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
                            </label>
                          </div>
                       
                    </div> --}}






            </div>
            <div id='page_navigation'></div>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="addproductModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="addproductModalCenterTitle" aria-hidden="true">
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
                        <select id="product_type" class="custom-select custom-select-lg">
                            <option selected>Select Type</option>
                            <option value="normal">Normal</option>
                            <option value="mealkits">MealKits</option>
                            <option value="preorders">Pre Orders</option>
                        </select>
                    </div>
                    <button type="button" onclick="SelectRedirect();" class="btn btn-primary btn-lg">Save
                        changes</button>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.13.0/Sortable.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>


    <script>
        var grid = document.getElementById('grid');
        var items = grid.getElementsByClassName('item');
        // var sortable = Sortable.create(document.getElementById('grid'), {
        //     handle: '.item-handle',
        //     animation: 150,
        //     onEnd: function(evt) {
        //         var ids = [];
        //         var items = evt.to.children;
        //         for (var i = 0; i < items.length; i++) {
        //             ids.push(items[i].getAttribute('data-id'));
        //         }
        //         console.log(ids);
        //         axios.post('products.sort', { ids: ids.join() })
        //             .then(function(response) {
        //                 console.log(response.data);
        //             })
        //             .catch(function(error) {
        //                 console.log(error);
        //             });

        //     },
        // });

        // Trying to Implementing Sortable JS for Drag and drop Feature 
        var sortableList = Sortable.create(document.getElementById('sortable-list'), {

            onEnd: function(evt) {
                var ids = [];
                var items = evt.to.children;
                for (var i = 0; i < items.length; i++) {
                    ids.push(items[i].getAttribute('data-id'));
                }
                console.log(ids);
                axios.post('/vendor-panel/sortProducts', {
                        ids: ids.join()
                    })
                    .then(function(response) {
                        console.log(response.data);
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            },
        });


        // $('#product_type').on('click', function(){

        // })
        function SelectRedirect() {
            // ON selection of section this function will work
            //alert( document.getElementById('s1').value);

            switch (document.getElementById('product_type').value) {
                case "normal":
                    window.location = "{{ route('vendor.addon.addproduct', ['type' => 'Normal']) }}";
                    break;

                case "mealkits":
                    window.location = "{{ route('vendor.addon.addproduct', ['type' => 'MealKits']) }}";
                    break;

                case "preorders":
                    window.location = "{{ route('vendor.addon.addproduct2') }}";
                    break;
                    /// Can be extended to other different selections of SubCategory //////
                default:
                    window.location = "../"; // if no selection matches then redirected to home page
                    break;
            } // end of switch
        }
        //////////////////

        // Code Comment by Osama    

        // $(document).ready(function() {
        //     window.startPos = window.endPos = {};

        //     makeDraggable();

        //     $('.drophere').droppable({
        //         hoverClass: 'hoverClass',
        //         drop: function(event, ui) {
        //             var $from = $(ui.draggable),
        //                 $fromParent = $from.parent(),
        //                 $to = $(this).children(),
        //                 $toParent = $(this);
        //             window.endPos = $to.offset();

        //             $(".drophere").text($("#active-cards").find("div").length);

        //             console.log($fromParent);
        //             console.log($toParent);
        //             swap($from, $from.offset(), window.endPos, 0);
        //             swap($to, window.endPos, window.startPos, 1000, function() {
        //                 $toParent.html($from.css({
        //                     position: 'relative',
        //                     left: '',
        //                     top: '',
        //                     'z-index': ''
        //                 }));
        //                 $fromParent.html($to.css({
        //                     position: 'relative',
        //                     left: '',
        //                     top: '',
        //                     'z-index': ''
        //                 }));
        //                 makeDraggable();
        //             });
        //         }
        //     });

        //     function makeDraggable() {
        //         $('.draghere').draggable({
        //             zIndex: 99999,
        //             revert: 'invalid',
        //             start: function(event, ui) {
        //                 console.log(event);
        //                 console.log(ui);
        //                 window.startPos = $(this).offset();
        //             }
        //         });
        //     }

        //     function swap($el, fromPos, toPos, duration, callback) {
        //         $el.css('position', 'absolute')
        //             .css(fromPos)
        //             .animate(toPos, duration, function() {
        //                 if (callback) callback();
        //             });
        //     }
        // });

        const selectedIds = [];
        let productStatus = 1;
        let productStatusToggle = document.getElementById('productSwitch');
        var lblProductStatus = document.getElementById("lblproductstatus");

        productStatusToggle.addEventListener('change', function() {
            if (this.checked) {
                productStatus = 1;
                lblProductStatus.innerHTML = "Active";
                console.log('Status : ' + productStatus);
            } else {
                productStatus = 0;
                lblProductStatus.innerHTML = "In - Active";
                console.log('Status : ' + productStatus);
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"][data-id]');
            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    if (checkbox.checked) {
                        selectedIds.push(checkbox.dataset
                            .id); // add data-id to array if checkbox is checked
                    } else {
                        const index = selectedIds.indexOf(checkbox.dataset.id);
                        if (index !== -1) {
                            selectedIds.splice(index,
                                1
                            ); // remove data-id from array if checkbox is unchecked
                        }
                    }
                    console.log(selectedIds); // log the updated array to the console
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('btnSaveNow').addEventListener('click', function() {

                let mySelect = document.getElementById('modalSelectProductGroup');
                let selectedOption = mySelect.options[mySelect.selectedIndex];
                let categoryID = selectedOption.getAttribute('cat-id');

                if (selectedIds.length > 0) {
                    axios.post('/vendor-panel/addon/updateProductStatusAndCategory', {
                            products: selectedIds,
                            productStatus,
                            categoryID
                        })
                        .then(function(response) {
                            console.log('Success:', response);
                            $("#productModalCenter").modal('hide');
                            toastr.success(
                                'Products Status or Category Updated Successfully', {
                                    CloseButton: true,
                                    ProgressBar: true
                                }); // show response from the php script.   

                            setTimeout(function() {
                                // This code will execute after a 1 second delay
                                console.log(response.data);
                            }, 8000); // Delay for 7 second (1000 milliseconds)
                            location.reload();
                        })
                        .catch(function(error) {
                            console.log('Error:', error.message);
                        });
                } else {
                    alert('Please select any Product!');
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('btnDelete').addEventListener('click', function() {
                if (selectedIds.length > 0) {
                    axios.post('/vendor-panel/addon/deleteBulkProducts', {
                            products: selectedIds
                        })
                        .then(function(response) {
                            console.log('Success:', response);
                            $("#productModalCenter").modal('hide');
                            toastr.success(
                                'Products Deleted Successfully', {
                                    CloseButton: true,
                                    ProgressBar: true
                                }); // show response from the php script.   

                            setTimeout(function() {
                                // This code will execute after a 1 second delay
                                console.log(response.data);
                            }, 8000); // Delay for 7 second (1000 milliseconds)
                            location.reload();
                        })
                        .catch(function(error) {
                            console.log('Error:', error.message);
                        });
                } else {
                    alert('Please select any Product!');
                }
            });
        });
    </script>
@endsection
