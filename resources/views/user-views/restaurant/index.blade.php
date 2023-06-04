@extends('user-views.layouts.app')

@section('content')
    {{-- @dd(auth()->guard('customer')->user()) --}}
    <section class="home-banner d-flex"
        style="background-image:url({{ asset('public/customer/assets/images/restaurant-1600x900.jpg') }})">
        <div class="container align-self-center">
            <div class="row">
                <div class="col-lg-10">
                    <div class="bannertext">
                        <h1 class="banner-heading">Welcome To Local Foodly </h1>
                        <p class="banner-paragraph">Please Select Your City For Best Experience</p>
                        <div class="form-group">
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>United State (US)</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="listitem section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <h2 class="mheading">Want To Eat?</h2>
                    <p class="mparagraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>

                <div class="col-lg-12">
                    <div class="packagewrap">
                        <ul class="nav nav-pills mb-lg-5 mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-Burger-tab" data-toggle="pill" href="#pills-Burger" role="tab" aria-controls="pills-Burger" aria-selected="true">Burger</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-Pizza-tab" data-toggle="pill" href="#pills-Pizza" role="tab" aria-controls="pills-Pizza" aria-selected="false">Pizza</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-FastFood-tab" data-toggle="pill" href="#pills-FastFood" role="tab" aria-controls="pills-FastFood" aria-selected="false">Fast Food</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-Chinses-tab" data-toggle="pill" href="#pills-Chinses" role="tab" aria-controls="pills-Chinses" aria-selected="false">Chinses</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-BarBQ-tab" data-toggle="pill" href="#pills-BarBQ" role="tab" aria-controls="pills-BarBQ" aria-selected="false">Bar B Q</a>
                            </li>
                            
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-Burger" role="tabpanel" aria-labelledby="pills-Burger-tab">
                            <h2 class="mheading">Popular Restaurants</h2>
                                <p class="mparagraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <div class="row mt-2">
                                    <div class="col-lg-4 col-6">
                                        <div class="card items-card" style="">
                                            <img src="{{ asset('public/customer/assets/images/restaurent/images.jpg') }}"
                                                class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <div class="stars">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    (20)
                                                </div>
                                                <h5 class="card-title">Attribute Variationss</h5>
                                                <p class="card-text">Chicken, tommato, green salad, pita, ketchup,….</p>
                                                <a href="#" class="btn btn-primary">View Restaurant</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-6">
                                        <div class="card items-card" style="">
                                            <img src="{{ asset('public/customer/assets/images/restaurent/photo-1517248135467-4c7edcad34c4.jpg') }}"
                                                class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <div class="stars">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    (20)
                                                </div>
                                                <h5 class="card-title">Attribute Variation</h5>
                                                <p class="card-text">Chicken, tommato, green salad, pita, ketchup,….</p>
                                                <a href="#" class="btn btn-primary">View Restaurant</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-6">
                                        <div class="card items-card" style="">
                                            <img src="{{ asset('public/customer/assets/images/restaurent/restaurant.jpeg') }}"
                                                class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <div class="stars">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    (20)
                                                </div>
                                                <h5 class="card-title">Attribute Variation</h5>
                                                <p class="card-text">Chicken, tommato, green salad, pita, ketchup,….</p>
                                                <a href="#" class="btn btn-primary">View Restaurant</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-6">
                                        <div class="card items-card" style="">
                                            <img src="{{ asset('public/customer/assets/images/restaurent/images.jpg') }}"
                                                class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <div class="stars">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    (20)
                                                </div>
                                                <h5 class="card-title">Attribute Variation</h5>
                                                <p class="card-text">Chicken, tommato, green salad, pita, ketchup,….</p>
                                                <a href="#" class="btn btn-primary">View Restaurant</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-6">
                                        <div class="card items-card" style="">
                                            <img src="{{ asset('public/customer/assets/images/restaurent/photo-1517248135467-4c7edcad34c4.jpg') }}"
                                                class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <div class="stars">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    (20)
                                                </div>
                                                <h5 class="card-title">Attribute Variation</h5>
                                                <p class="card-text">Chicken, tommato, green salad, pita, ketchup,….</p>
                                                <a href="#" class="btn btn-primary">View Restaurant</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-6">
                                        <div class="card items-card" style="">
                                            <img src="{{ asset('public/customer/assets/images/restaurent/restaurant.jpeg') }}"
                                                class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <div class="stars">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    (20)
                                                </div>
                                                <h5 class="card-title">Attribute Variation</h5>
                                                <p class="card-text">Chicken, tommato, green salad, pita, ketchup,….</p>
                                                <a href="#" class="btn btn-primary">View Restaurant</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-Pizza" role="tabpanel" aria-labelledby="pills-Pizza-tab">
                            <div class="row mt-2">
                                    <div class="col-lg-4 col-6">
                                        <div class="card items-card" style="">
                                            <img src="{{ asset('public/customer/assets/images/restaurent/images.jpg') }}"
                                                class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <div class="stars">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    (20)
                                                </div>
                                                <h5 class="card-title">Attribute Variation</h5>
                                                <p class="card-text">Chicken, tommato, green salad, pita, ketchup,….</p>
                                                <a href="#" class="btn btn-primary">View Restaurant</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-6">
                                        <div class="card items-card" style="">
                                            <img src="{{ asset('public/customer/assets/images/restaurent/photo-1517248135467-4c7edcad34c4.jpg') }}"
                                                class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <div class="stars">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    (20)
                                                </div>
                                                <h5 class="card-title">Attribute Variation</h5>
                                                <p class="card-text">Chicken, tommato, green salad, pita, ketchup,….</p>
                                                <a href="#" class="btn btn-primary">View Restaurant</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-6">
                                        <div class="card items-card" style="">
                                            <img src="{{ asset('public/customer/assets/images/restaurent/restaurant.jpeg') }}"
                                                class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <div class="stars">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    (20)
                                                </div>
                                                <h5 class="card-title">Attribute Variation</h5>
                                                <p class="card-text">Chicken, tommato, green salad, pita, ketchup,….</p>
                                                <a href="#" class="btn btn-primary">View Restaurant</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-FastFood" role="tabpanel" aria-labelledby="pills-FastFood-tab">
                            <div class="row">
                                    <div class="col-lg-4 col-6">
                                        <div class="card items-card" style="">
                                            <img src="{{ asset('public/customer/assets/images/restaurent/images.jpg') }}"
                                                class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <div class="stars">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    (20)
                                                </div>
                                                <h5 class="card-title">Attribute Variation</h5>
                                                <p class="card-text">Chicken, tommato, green salad, pita, ketchup,….</p>
                                                <a href="#" class="btn btn-primary">View Restaurant</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-6">
                                        <div class="card items-card" style="">
                                            <img src="{{ !empty($restaurant->cover_photo) ? asset('images') .'/'. $restaurant->cover_photo : asset('public/customer/assets/images/restaurent/photo-1517248135467-4c7edcad34c4.jpg') }}"
                                                class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <div class="stars">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    (20)
                                                </div>
                                                <h5 class="card-title">Attribute Variation</h5>
                                                <p class="card-text">Chicken, tommato, green salad, pita, ketchup,….</p>
                                                <a href="#" class="btn btn-primary">View Restaurant</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-6">
                                        <div class="card items-card" style="">
                                            <img src="{{ asset('public/customer/assets/images/restaurent/restaurant.jpeg') }}"
                                                class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <div class="stars">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    (20)
                                                </div>
                                                <h5 class="card-title">Attribute Variation</h5>
                                                <p class="card-text">Chicken, tommato, green salad, pita, ketchup,….</p>
                                                <a href="#" class="btn btn-primary">View Restaurant</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-Chinses" role="tabpanel" aria-labelledby="pills-Chinses-tab">
                            <div class="row">
                                    <div class="col-lg-4 col-6">
                                        <div class="card items-card" style="">
                                            <img src="{{ asset('public/customer/assets/images/restaurent/images.jpg') }}"
                                                class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <div class="stars">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    (20)
                                                </div>
                                                <h5 class="card-title">Attribute Variation</h5>
                                                <p class="card-text">Chicken, tommato, green salad, pita, ketchup,….</p>
                                                <a href="#" class="btn btn-primary">View Restaurant</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-6">
                                        <div class="card items-card" style="">
                                            <img src="{{ asset('public/customer/assets/images/restaurent/photo-1517248135467-4c7edcad34c4.jpg') }}"
                                                class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <div class="stars">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    (20)
                                                </div>
                                                <h5 class="card-title">Attribute Variation</h5>
                                                <p class="card-text">Chicken, tommato, green salad, pita, ketchup,….</p>
                                                <a href="#" class="btn btn-primary">View Restaurant</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-6">
                                        <div class="card items-card" style="">
                                            <img src="{{ asset('public/customer/assets/images/restaurent/restaurant.jpeg') }}"
                                                class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <div class="stars">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    (20)
                                                </div>
                                                <h5 class="card-title">Attribute Variation</h5>
                                                <p class="card-text">Chicken, tommato, green salad, pita, ketchup,….</p>
                                                <a href="#" class="btn btn-primary">View Restaurant</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-BarBQ" role="tabpanel" aria-labelledby="pills-BarBQ-tab">...</div>
                        </div>
                      
                        <div class="row mt-2">
                            <div class="col-lg-12 mb-4">
                                <h2 class="mheading">Restaurants Near You</h2>
                                <p class="mparagraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                            @forelse ($listRestaurants as $listRestaurant)
                                <div class="col-lg-4 col-6">
                                    <div class="card items-card" style="">
                                        <img src="{{ $listRestaurant->cover_photo ==null ?  asset('public/customer/assets/images/restaurent/images.jpg') : asset( 'public/images/' . $listRestaurant->cover_photo ) }}"
                                            class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <div class="stars">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                {{ $listRestaurant->rate }}
                                            </div>
                                            <h5 class="card-title">{{ $listRestaurant->name }}</h5>
                                            <p class="card-text">{{ $listRestaurant->about }}</p>
                                            <a href="{{ route('restaurant.view', $listRestaurant->id) }}"
                                                class="btn btn-primary">View Restaurant</a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                {{ __('Restaurant List Not Found Here') }}
                            @endforelse



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
