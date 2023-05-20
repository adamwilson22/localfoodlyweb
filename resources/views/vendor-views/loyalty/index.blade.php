@extends('layouts.vendor.app')

@section('title', __('Loyalty Program'))

@push('css_or_js')
<title>Packages</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .package {
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .package h2 {
            margin-top: 0;
        }
    </style>
@endpush

@section('content')

 <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm">
                    <h1 class="page-header-title">
                      Loyalty Program
                    </h1>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="package bronze">
                        <h2>Bronze Package</h2>
                        <form>
                            <div class="form-group">
                                <label for="bronzeOption">Select Points</label>
                                <select class="form-control" id="bronzeOption" name="bronzeOption">
                                    <option value="0">Select Points</option>
                                    @for ($i = 30; $i < 150; $i += 30)
                                        <option value="{{$i}}">{{$i}} Points</option>
                                    @endfor
                                </select>
                            </div>
                            <!-- More form elements specific to the bronze package -->
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="package silver">
                        <h2>Silver Package</h2>
                        <form>
                            <!-- Silver Package Form Elements -->
                            <div class="form-group">
                                <label for="bronzeOption">Select Points</label>
                                <select class="form-control" id="bronzeOption" name="bronzeOption">
                                    <option value="0">Select Points</option>
                                    @for ($i = 30; $i < 150; $i += 30)
                                        <option value="{{$i}}">{{$i}} Points</option>
                                    @endfor
                                </select>
                            </div>
                            <!-- More form elements specific to the silver package -->
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="package gold">
                        <h2>Gold Package</h2>
                        <form>
                            <!-- Gold Package Form Elements -->
                            <div class="form-group">
                                <label for="bronzeOption">Select Points</label>
                                <select class="form-control" id="bronzeOption" name="bronzeOption">
                                    <option value="option1">Option 1</option>
                                    <option value="option2">Option 2</option>
                                    <option value="option3">Option 3</option>
                                    <option value="option1">Option 1</option>
                                    <option value="option2">Option 2</option>
                                    <option value="option3">Option 3</option>
                                </select>
                            </div>
                            <!-- More form elements specific to the gold package -->
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="product-form">
            <form id="">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class=" form-group">
                                    <label class="input-label" for="">How Much Dollar Does Customer Have To Spend For 1 Loyalty Point?</label>
                                    <input type="number" class="form-control form-control-lg" name="" placeholder="Amount in Dollar $"
                                        required="required">
                                </div>
                                <div class=" form-group">
                                    <label class="input-label" for="">After How Many Months Will Points Expire?</label>
                                    <input type="number" class="form-control form-control-lg" name="" placeholder="Type months in number"
                                        required="required">
                                </div>
                                
                               <div class="product-cards mt-4">
                                    <label class="input-label mb-3" for="">Add Products Which Can Be Bought By Loyalty Points</label>
                                <div class="row">
                                   

                                     <div class="col-lg-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="product-img">
                                                    <img src="{{ asset('public/assets/admin/img/Screenshot_11.png') }}" alt="">
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
                                    <div class="col-lg-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="product-img">
                                                    <img src="{{ asset('public/assets/admin/img/Screenshot_11.png') }}" alt="">
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
                                    <div class="col-lg-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="product-img">
                                                    <img src="{{ asset('public/assets/admin/img/Screenshot_11.png') }}" alt="">
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
                                    <div class="col-lg-6">
                                        <div class="addmore">
                                                
                                            <a href="javascript:;" class="" data-toggle="modal"
                                                data-target="#addproductModalCenter">
                                                 <img class="img-fluid" src="{{ asset('public/assets/admin/img/pluss.png') }}" alt="">
                                                 <p>Add More</p>
                                            </a>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>

                                <Button type="submit" class="btn btn-primary btn-lg">Save</Button>
                            </div>
                        </div>
                    </div>

                    
                </div>
            </form>
          
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
    </div> --}}
@endsection