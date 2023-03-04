@extends('layouts.vendor.app')

@section('title', __('Review'))

@push('css_or_js')
@endpush

<body class="">
    @section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm">
                    <h1 class="page-header-title">Review</h1>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="row mb-5">
            <div class="col-xl-4 col-lg-6">
                <div class="inline-select">
                    <label for="" class="">Sort by</label>
                    <select id="" class="custom-select custom-select-lg">
                        <option selected>High Rated</option>
                        <option>...</option>
                    </select>
                </div>
            </div>
            <div class="col-xl-8 col-lg-6 mt-lg-0 mt-3 text-lg-right">
                <ul class="nav nav-tabs nav-review" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="all-reviews-tab" data-toggle="tab" href="#all-reviews" role="tab" aria-controls="all-reviews" aria-selected="true">All Reviews</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="replied-reviews-tab" data-toggle="tab" href="#replied-reviews" role="tab" aria-controls="replied-reviews" aria-selected="false">Replied Reviews</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="all-reviews" role="tabpanel" aria-labelledby="all-reviews-tab">
                <div class="customer">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body review-list">
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
                                    <div class="detail mt-5 mb-0">
                                        <div class="info">
                                            <img class="radius-6" src="{{ asset('public/assets/admin/img/Group-174.jpg') }}" alt="">
                                            <span>
                                                <h4>Pizza Margherita</h4>
                                                <p>Lorem ipsum dolor sit</p>
                                            </span>
                                        </div>
                                        <a href="#" class="btn btn-primary btn-lg">Reply</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body review-list">
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
                                    <div class="detail mt-5 mb-0">
                                        <div class="info">
                                            <img class="radius-6" src="{{ asset('public/assets/admin/img/Group-174.jpg') }}" alt="">
                                            <span>
                                                <h4>Pizza Margherita</h4>
                                                <p>Lorem ipsum dolor sit</p>
                                            </span>
                                        </div>
                                        <a href="#" class="btn btn-primary btn-lg">Reply</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body review-list">
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
                                    <div class="detail mt-5 mb-0">
                                        <div class="info">
                                            <img class="radius-6" src="{{ asset('public/assets/admin/img/Group-174.jpg') }}" alt="">
                                            <span>
                                                <h4>Pizza Margherita</h4>
                                                <p>Lorem ipsum dolor sit</p>
                                            </span>
                                        </div>
                                        <a href="#" class="btn btn-primary btn-lg">Reply</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body review-list">
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
                                    <div class="detail mt-5 mb-0">
                                        <div class="info">
                                            <img class="radius-6" src="{{ asset('public/assets/admin/img/Group-174.jpg') }}" alt="">
                                            <span>
                                                <h4>Pizza Margherita</h4>
                                                <p>Lorem ipsum dolor sit</p>
                                            </span>
                                        </div>
                                        <a href="#" class="btn btn-primary btn-lg">Reply</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body review-list">
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
                                    <div class="detail mt-5 mb-0">
                                        <div class="info">
                                            <img class="radius-6" src="{{ asset('public/assets/admin/img/Group-174.jpg') }}" alt="">
                                            <span>
                                                <h4>Pizza Margherita</h4>
                                                <p>Lorem ipsum dolor sit</p>
                                            </span>
                                        </div>
                                        <a href="#" class="btn btn-primary btn-lg">Reply</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body review-list">
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
                                    <div class="detail mt-5 mb-0">
                                        <div class="info">
                                            <img class="radius-6" src="{{ asset('public/assets/admin/img/Group-174.jpg') }}" alt="">
                                            <span>
                                                <h4>Pizza Margherita</h4>
                                                <p>Lorem ipsum dolor sit</p>
                                            </span>
                                        </div>
                                        <a href="#" class="btn btn-primary btn-lg">Reply</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body review-list">
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
                                    <div class="detail mt-5 mb-0">
                                        <div class="info">
                                            <img class="radius-6" src="{{ asset('public/assets/admin/img/Group-174.jpg') }}" alt="">
                                            <span>
                                                <h4>Pizza Margherita</h4>
                                                <p>Lorem ipsum dolor sit</p>
                                            </span>
                                        </div>
                                        <a href="#" class="btn btn-primary btn-lg">Reply</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body review-list">
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
                                    <div class="detail mt-5 mb-0">
                                        <div class="info">
                                            <img class="radius-6" src="{{ asset('public/assets/admin/img/Group-174.jpg') }}" alt="">
                                            <span>
                                                <h4>Pizza Margherita</h4>
                                                <p>Lorem ipsum dolor sit</p>
                                            </span>
                                        </div>
                                        <a href="#" class="btn btn-primary btn-lg">Reply</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body review-list">
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
                                    <div class="detail mt-5 mb-0">
                                        <div class="info">
                                            <img class="radius-6" src="{{ asset('public/assets/admin/img/Group-174.jpg') }}" alt="">
                                            <span>
                                                <h4>Pizza Margherita</h4>
                                                <p>Lorem ipsum dolor sit</p>
                                            </span>
                                        </div>
                                        <a href="#" class="btn btn-primary btn-lg">Reply</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="replied-reviews" role="tabpanel" aria-labelledby="replied-reviews-tab">
                <div class="customer">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body review-list">
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
                                    <div class="collapse" id="collapseExample">
                                        <div class="mt-4">
                                            <p><a href="#">@Zayn</a> Campbellr ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                                        </div>
                                    </div>

                                    <div class="detail mt-5 mb-0">
                                        <div class="info">
                                            <img class="radius-6" src="{{ asset('public/assets/admin/img/Group-174.jpg') }}" alt="">
                                            <span>
                                                <h4>Pizza Margherita</h4>
                                                <p>Lorem ipsum dolor sit</p>
                                            </span>
                                        </div>
                                        <a class="" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                            View Reply
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body review-list">
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
                                    <div class="collapse" id="collapseExample2">
                                        <div class="mt-4">
                                            <p><a href="#">@Zayn</a> Campbellr ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                                        </div>
                                    </div>

                                    <div class="detail mt-5 mb-0">
                                        <div class="info">
                                            <img class="radius-6" src="{{ asset('public/assets/admin/img/Group-174.jpg') }}" alt="">
                                            <span>
                                                <h4>Pizza Margherita</h4>
                                                <p>Lorem ipsum dolor sit</p>
                                            </span>
                                        </div>
                                        <a class="" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2">
                                            View Reply
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body review-list">
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
                                    <div class="collapse" id="collapseExample3">
                                        <div class="mt-4">
                                            <p><a href="#">@Zayn</a> Campbellr ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                                        </div>
                                    </div>

                                    <div class="detail mt-5 mb-0">
                                        <div class="info">
                                            <img class="radius-6" src="{{ asset('public/assets/admin/img/Group-174.jpg') }}" alt="">
                                            <span>
                                                <h4>Pizza Margherita</h4>
                                                <p>Lorem ipsum dolor sit</p>
                                            </span>
                                        </div>
                                        <a class="" data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample3">
                                            View Reply
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body review-list">
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
                                    <div class="collapse" id="collapseExample4">
                                        <div class="mt-4">
                                            <p><a href="#">@Zayn</a> Campbellr ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                                        </div>
                                    </div>

                                    <div class="detail mt-5 mb-0">
                                        <div class="info">
                                            <img class="radius-6" src="{{ asset('public/assets/admin/img/Group-174.jpg') }}" alt="">
                                            <span>
                                                <h4>Pizza Margherita</h4>
                                                <p>Lorem ipsum dolor sit</p>
                                            </span>
                                        </div>
                                        <a class="" data-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false" aria-controls="collapseExample4">
                                            View Reply
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body review-list">
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
                                    <div class="collapse" id="collapseExample5">
                                        <div class="mt-4">
                                            <p><a href="#">@Zayn</a> Campbellr ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                                        </div>
                                    </div>

                                    <div class="detail mt-5 mb-0">
                                        <div class="info">
                                            <img class="radius-6" src="{{ asset('public/assets/admin/img/Group-174.jpg') }}" alt="">
                                            <span>
                                                <h4>Pizza Margherita</h4>
                                                <p>Lorem ipsum dolor sit</p>
                                            </span>
                                        </div>
                                        <a class="" data-toggle="collapse" href="#collapseExample5" role="button" aria-expanded="false" aria-controls="collapseExample5">
                                            View Reply
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body review-list">
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
                                    <div class="collapse" id="collapseExample6">
                                        <div class="mt-4">
                                            <p><a href="#">@Zayn</a> Campbellr ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                                        </div>
                                    </div>

                                    <div class="detail mt-5 mb-0">
                                        <div class="info">
                                            <img class="radius-6" src="{{ asset('public/assets/admin/img/Group-174.jpg') }}" alt="">
                                            <span>
                                                <h4>Pizza Margherita</h4>
                                                <p>Lorem ipsum dolor sit</p>
                                            </span>
                                        </div>
                                        <a class="" data-toggle="collapse" href="#collapseExample6" role="button" aria-expanded="false" aria-controls="collapseExample6">
                                            View Reply
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body review-list">
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
                                    <div class="collapse" id="collapseExample7">
                                        <div class="mt-4">
                                            <p><a href="#">@Zayn</a> Campbellr ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                                        </div>
                                    </div>

                                    <div class="detail mt-5 mb-0">
                                        <div class="info">
                                            <img class="radius-6" src="{{ asset('public/assets/admin/img/Group-174.jpg') }}" alt="">
                                            <span>
                                                <h4>Pizza Margherita</h4>
                                                <p>Lorem ipsum dolor sit</p>
                                            </span>
                                        </div>
                                        <a class="" data-toggle="collapse" href="#collapseExample7" role="button" aria-expanded="false" aria-controls="collapseExample7">
                                            View Reply
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body review-list">
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
                                    <div class="collapse" id="collapseExample8">
                                        <div class="mt-4">
                                            <p><a href="#">@Zayn</a> Campbellr ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                                        </div>
                                    </div>

                                    <div class="detail mt-5 mb-0">
                                        <div class="info">
                                            <img class="radius-6" src="{{ asset('public/assets/admin/img/Group-174.jpg') }}" alt="">
                                            <span>
                                                <h4>Pizza Margherita</h4>
                                                <p>Lorem ipsum dolor sit</p>
                                            </span>
                                        </div>
                                        <a class="" data-toggle="collapse" href="#collapseExample8" role="button" aria-expanded="false" aria-controls="collapseExample8">
                                            View Reply
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body review-list">
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
                                    <div class="collapse" id="collapseExample9">
                                        <div class="mt-4">
                                            <p><a href="#">@Zayn</a> Campbellr ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
                                        </div>
                                    </div>

                                    <div class="detail mt-5 mb-0">
                                        <div class="info">
                                            <img class="radius-6" src="{{ asset('public/assets/admin/img/Group-174.jpg') }}" alt="">
                                            <span>
                                                <h4>Pizza Margherita</h4>
                                                <p>Lorem ipsum dolor sit</p>
                                            </span>
                                        </div>
                                        <a class="" data-toggle="collapse" href="#collapseExample9" role="button" aria-expanded="false" aria-controls="collapseExample9">
                                            View Reply
                                        </a>

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