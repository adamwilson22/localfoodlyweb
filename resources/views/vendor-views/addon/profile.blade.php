@extends('layouts.vendor.app')

@section('title', __('Profile'))

@push('css_or_js')
@endpush

<body class="profilepg">
    @section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div style="background-image: url('{{ asset('public/images') }}/{{ empty($restaurant->cover_photo) ? '' : $restaurant->cover_photo  }}');" class="cover-banner">

        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="profile-info">
                    <div class="inner-info">
                        <div class="img">
                            <img src="{{ asset('public/images') .'/'. $restaurant->logo}}" alt="">
                        </div>
                        <span>
                            <h4>{{$restaurant->name}}</h4>
                            <p>{{$restaurant->about}}</p>
                        </span>
                    </div>
                    <div class="best-badge">
                        <img src="{{ asset('public/assets/admin/img/best2.png') }}" alt="">
                        <img src="{{ asset('public/assets/admin/img/best.png') }}" alt="">
                    </div>
                </div>

                <div class="rating">
                    <div class="form-row">
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="icon">
                                        <i class="icon-Fire"></i>
                                    </div>
                                    <div class="text">
                                        <h4>3K</h4>
                                        <p>Followers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="icon">
                                        <i class="icon-msg"></i>
                                    </div>
                                    <div class="text">
                                        <h4>165</h4>
                                        
                                        <p>Total Reviews</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="icon">
                                        <i class="icon-star"></i>
                                    </div>
                                    <div class="text">
                                        <h4>0.5</h4>
                                        <p>Ratings</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <h1 class="page-header-title mb-4">
                    Products
                </h1>

                <div class="product-cards">
                    <div class="row">
                        @foreach ($products as $product)
                            
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="product-img">
                                        <img src="{{ $product->image }}" alt="">
                                    </div>
                                    <div class="content">
                                        <div class="name-price">
                                            <a href="{{route('vendor.addon.product-detail', ['id' => $product->id])}}">
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
                                            <img src="{{ asset('public/assets/admin/img/vegan.png') }}" alt="">
                                            <img src="{{ asset('public/assets/admin/img/madetoorder.png') }}" alt="">
                                            <img src="{{ asset('public/assets/admin/img/nutfree.png') }}" alt="">
                                        </div>

                                    </div>
                                    <div class="action">
                                        <a href="{{route('vendor.addon.product.edit', ['id' => $product->id])}}">
                                            <i class="icon-edit_icon"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        {{-- <div class="col-lg-6">
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
                        <div class="col-lg-6">
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
                                        </div>

                                    </div>
                                    <div class="action">
                                        <a href="#">
                                            <i class="icon-edit_icon"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                {{-- list --}}
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

    </div>

    @endsection
</body>