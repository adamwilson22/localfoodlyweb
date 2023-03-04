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
                    <div class="inline-select">
                        <label for="" class="">Sort by</label>
                        <select id="" class="custom-select custom-select-lg">
                            <option selected>Best Seller</option>
                            <option>...</option>
                        </select>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-6 mt-lg-0 mt-3 text-lg-right">
                    <a href="{{route('vendor.addon.categories')}}" class="btn btn-secondary btn-lg sltcateg">View All Categories</a>
                    <a href="" class="btn btn-primary btn-lg ml-sm-3 mt-lg-0 mt-2"  
                    data-toggle="modal" data-target="#addproductModalCenter"
                    >Add More Products</a>
                </div>
            </div>

            <div class="product-cards mt-5">
                <input type='hidden' id='current_page' />
                <input type='hidden' id='show_per_page' />
                <div class="row" id="pagingBox">
                
                    @foreach ($products as $product)
                    
                    <div class="col-lg-4 drophere">
                        <div class="custom-control custom-checkbox product-checkbox draghere">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="product-img">
                                            {{-- <img src="{{ asset('public/assets/admin/img/pizza.png') }}" alt=""> --}}
                                            @if (!empty($product->feature_video))
                                                <video src="{{$product->feature_video}}" controls></video>
                                            @elseif (!empty($product->feature_image))
                                                <img src="{{ $product->feature_image }}" alt="">
                                            @else
                                                <img src="{{ $product->image }}" alt="">
                                            @endif
                                        </div>
                                        <div class="content">
                                            <div class="name-price">
                                                <a href="{{route('vendor.addon.product-detail', ['id' => $product->id])}}">
                                                    <h4>{{$product->name}}</h4>
                                                </a>
                                                <p>${{$product->price}}</p>
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
                                                   {{ $badgeImages }}
                                                @endif
                                            </div>
                                            
                                        </div>
                                        <div class="action">
                                            <a href="{{route('vendor.addon.product.edit', ['id' => $product->id])}}">
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
                        <button type="button" onclick="SelectRedirect();" class="btn btn-primary btn-lg">Save changes</button>
                    </div>
                    
                </div>
            </div>
        </div>
    @endsection

@section('script')
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script>
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


        $(document).ready(function() {
            window.startPos = window.endPos = {};

            makeDraggable();

            $('.drophere').droppable({
                hoverClass: 'hoverClass',
                drop: function(event, ui) {
                    var $from = $(ui.draggable),
                        $fromParent = $from.parent(),
                        $to = $(this).children(),
                        $toParent = $(this);
                    window.endPos = $to.offset();

                    $(".drophere").text($("#active-cards").find("div").length);

                    console.log($fromParent);
                    console.log($toParent);
                    swap($from, $from.offset(), window.endPos, 0);
                    swap($to, window.endPos, window.startPos, 1000, function() {
                        $toParent.html($from.css({
                            position: 'relative',
                            left: '',
                            top: '',
                            'z-index': ''
                        }));
                        $fromParent.html($to.css({
                            position: 'relative',
                            left: '',
                            top: '',
                            'z-index': ''
                        }));
                        makeDraggable();
                    });
                }
            });

            function makeDraggable() {
                $('.draghere').draggable({
                    zIndex: 99999,
                    revert: 'invalid',
                    start: function(event, ui) {
                        console.log(event);
                        console.log(ui);
                        window.startPos = $(this).offset();
                    }
                });
            }

            function swap($el, fromPos, toPos, duration, callback) {
                $el.css('position', 'absolute')
                    .css(fromPos)
                    .animate(toPos, duration, function() {
                        if (callback) callback();
                    });
            }
        });
    </script>
@endsection
