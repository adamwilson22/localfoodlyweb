@extends('user-views.layouts.app')

@section('css')
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('content')
    {{-- @dd(auth()->guard('customer')->user()) --}}
    <section class="home-banner restaurant-banner d-flex"
        style="background-image:url({{ !empty($restaurant->cover_photo) ? asset('public/images') .'/'. $restaurant->cover_photo : asset('public/customer/assets/images/restaurant-1600x900.jpg') }})">
        <div class="container align-self-center">
            <div class="row">
                <div class="col-lg-3 align-self-end">
                    <div class="proimg">
                        <img src="{{ !empty($restaurant->logo) ? asset('public/images').'/'.$restaurant->logo : asset('public/customer/assets/images/group1589.png') }}" class="" alt="...">
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="bannertext text-center">
                        <h1 class="banner-heading">{{ $restaurant->name }}</h1>
                        <p class="banner-paragraph">{{ $restaurant->about }}</p>
                        <div class="form-row">
                            <div class="col-4">
                                <div class="review-box">
                                    <p>FOLLOWER MEMBER</p>
                                    <h4 id="totalfollower">{{ $followerCount }}</h4>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="review-box">
                                    <p>RESTAURANT RREVIEWS</p>
                                    <h4>2K</h4>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="review-box">
                                    <p>RESTAURANT RATING</p>
                                    <h4>4.5</h4>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-lg-4 align-self-end">
                    <div class="follow-pro">
                        <img src="{{ !empty($vendor->image) ? asset('public/images/vendor').'/'.$vendor->image : asset('public/images/vendor/placeholder_profile.jpg') }}" class="" alt="...">
                         @if (!empty($follower))
                            <a href="javascript:void(0);" data-id="{{ $restaurant->id }}" class="btn btn-primary follower-btn" role="button">unfollow</a>
                        @else
                            <a href="javascript:void(0);" data-id="{{ $restaurant->id }}" class="btn btn-primary follower-btn" role="button">Follow</a>
                        @endif
                        <a href="#" class="btn btn-secondary">Message</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="listitem section-padding">
        <div class="container">
            <select name="" id="" class="btn btn-primary mr-2">
                <option value="">Filter</option>
                <option value="">burger</option>
                <option value="">pizza</option>
                <option value="">sandwich</option>
            </select>
            <select name="" id="" class="btn btn-secondary">
                <option value="">Sort</option>
                <option value="">Newest</option>
                <option value="">Oldest</option>
                <option value="">Popular</option>
            </select>
            <div class="row mt-3">
                @forelse ($foods as $food)
                    @php
                        $images = unserialize($food->image);
                    @endphp

                    <div class="col-lg-4">
                        <div class="card res-card items-card" style="">
                            <div class="img">
                                <label for="">{{ $food->product_type }}</label>
                                <a href="{{ route('food.view', $food->id) }}">
                                    @if (!empty($product->feature_video))
                                        <video src="{{$product->feature_video}}" controls></video>
                                    @elseif (!empty($product->feature_image))
                                        <img src="{{ $product->feature_image }}" alt="">
                                    @else
                                        @foreach ($images as $image)
                                            {{-- {{ dd($image) }} --}}
                                            <img src="{{ !empty(asset('public/images') .'/'. $image) ? asset('public/images') .'/'. $image  : asset('customer/assets/images/news_image2-min-1.png') }}"
                                                class="card-img-top" alt="...">
                                                @break
                                        @endforeach
                            
                                    @endif
                                </a>
                                <div class="stars">
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    (20)
                                </div>
                                {{-- <div class="dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="icon-more-horizontal"></i>
                                    </a>

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="card-body">
                                <a href="{{ route('food.view', $food->id) }}">
                                    <h5 class="card-title">{{$food->name}}</h5>
                                </a>
                                <p class="card-text">{{ $food->description }}</p>
                                 @if ($food->product_type == 'preorder')
                                    <p class="card-text">QTY: {{ $food->unit }}</p>
                                @endif
                                <div class="bottom">
                                    <a href="javascript:void(0);" data-id="{{ $food->id }}"
                                        class="btn btn-primary add-to-cart" role="button"><i
                                            class="icon-shopping-cart mr-2"></i> Add To
                                        Cart</a>
                                    <i class="fa fa-circle-o-notch fa-spin btn-loading"
                                        style="font-size:24px; display: none"></i>
                                    <a href="{{ route('food.view', $food->id) }}" class="ml-3 fs-18">${{ $food->price }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    {{ __('Food Not Found Here') }}
                @endforelse
            </div>

        </div>
    </section>
        <div class="container">
            <h3>Kitchen Images</h3>
            @foreach ($kitchengallery as $g)
            <img style="width:auto; height:150px" src="{{$g->image}}" class="" alt="...">
    
            @endforeach 
        </div>
@endsection

@section('script')

    <script type="text/javascript">
        $(".add-to-cart").click(function(e) {
            e.preventDefault();
            var ele = $(this);
            console.log(ele.attr("data-id"));

            ele.siblings('.btn-loading').show();

            $.ajax({
                url: '{{ url('customer/add-to-cart') }}' + '/' + ele.attr("data-id"),
                method: "get",
                data: {
                    _token: '{{ csrf_token() }}'
                },
                dataType: "json",
                success: function(response) {

                    ele.siblings('.btn-loading').hide();
                    $(".cart-count").html(response.countlist);
                    $("span#status").html('<div class="alert alert-success">' + response.msg +
                        '</div>');
                    $("#header-bar").html(response.data);
                }
            });
        });
        
        $(".follower-btn").click(function(e) {
            e.preventDefault();
            var ele = $(this);
            console.log(ele.attr("data-id"));

            $.ajax({
                url: "{{ route('user.follow') }}",
                method: "get",
                data: {
                    _token: '{{ csrf_token() }}',
                    rest_id: ele.attr("data-id"),
                },
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    if (response.status == "follow") {
                        $('.follower-btn').html('unfollow')
                        $('#totalfollower').html(response.data)
                    }
                    if (response.status == "unfollow") {
                        $('.follower-btn').html('follow')
                        $('#totalfollower').html(response.data)
                    }
                }
            });
        });
    </script>
@endsection
