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
                                    <p>RESTAURANT REVIEWS</p>
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
            {{-- <select name="" id="" class="btn btn-secondary">
                <option value="">Sort</option>
                <option value="">Newest</option>
                <option value="">Oldest</option>
                <option value="">Popular</option>
            </select> --}}
            
            <select name="" id="mySelect" class="btn btn-primary mr-2">
                <option selected disabled>Select Your Filter</option>
                <option value="Category">Category</option>
                <option value="Badges">Badges</option>
            
            </select>

            {{-- <form method="GET" action="{{ route('foods.filter') }}"> --}}
                {{-- <input type="text" name="search" placeholder="Search by food name..."> --}}
               
            
            
            
            <div class="form-group" style="display:none" id ="FilterCategory">
                <form method="GET" action="{{ route('foods.filter1',$restaurant->id) }}">
                {!! Form::label('category', 'Filter by Category') !!}
                {!! Form::select('category', $categories, null, ['class' => 'form-control']) !!}
                <button type="submit"  id ="FilterCategory1"> Filter</button>
                 </form>
            </div>

            <div class="form-group" style="display:none" id ="FilterBadges">
                <form method="GET" action="{{ route('foods.filter2',$restaurant->id) }}">
                {!! Form::label('Badges', 'Filter by Badges') !!}
                {!! Form::select('badges', $badges, null, ['class' => 'form-control']) !!}

                <button type="submit" id ="FilterBadges1"> Filter</button>
                </form>
            </div>
       
           
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
                                    @if (!empty($food->feature_image))
                                    <img src="{{ !empty($food->feature_image) ? $food->feature_image  : asset('customer/assets/images/news_image2-min-1.png') }}"
                                    class="card-img-top" alt="...">
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
            @forelse ($kitchengallery as $g)
            <div id="img{{$g->id}}" class="d-inline" style="">
                @if(in_array(pathinfo($g->image, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
                    
                    <a href="{{$g->image}}" data-fancybox="gallery" data-caption="Kitchen Image">
                        <img src="{{$g->image}}" class="kitchenimg" alt="...">
                      </a>
                @elseif(in_array(pathinfo($g->image, PATHINFO_EXTENSION), ['doc', 'docx', 'ppt', 'pptx', 'xls', 'xlsx']))
                    {{-- <div class="document-file"> --}}
                        <a href="{{ asset($g->image) }}" target="_blank" style="vertical-align: middle;">{{ $g->image }}</a>
                    {{-- </div> --}}
                @elseif(in_array(pathinfo($g->image, PATHINFO_EXTENSION), ['pdf']))
                    {{-- <div class="pdf-file"> --}}
                        <embed src="{{ asset($g->image) }}" type="application/pdf" class="kitchenimg" style="vertical-align: middle;"/>
                    {{-- </div> --}}
                @elseif(in_array(pathinfo($g->image, PATHINFO_EXTENSION), ['mp4', 'avi', 'mov', 'wmv', 'flv', 'webm']))
                    {{-- <div class="video-file"> --}}
                        <video src="{{ asset($g->image) }}" class="kitchenimg" style="vertical-align: middle;" controls></video>
                    {{-- </div> --}}
                @endif
                @empty
                <p>Image not found...</p>
                    
                @endforelse
                {{-- @foreach ($kitchengallery as $g)
                <img style="width:auto; height:150px" src="{{$g->image}}" class="" alt="...">
        
                @endforeach  --}}
            </div>
@endsection

@section('script')

    <script type="text/javascript">
      $(document).ready(function () {
           console.log("osama");
           selectElement = document.querySelector('#mySelect');

selectElement.addEventListener('change', (event) => {

   selectedOption = event.target.value;
  console.log(`Selected option: ${selectedOption}`);

  if (selectedOption == "Category") {
    $("#FilterCategory").show();
    $("#FilterCategory1").show();
    $("#FilterBadges").hide();
    $("#FilterBadges1").hide();
  } if (selectedOption == "Badges") {
    $("#FilterBadges").show();
    $("#FilterBadges1").show();
    $("#FilterCategory").hide();
    $("#FilterCategory1").hide();
  }


  // Perform any other actions you want to take when an option is selected
  // API Calling for Filtering Data 

//   axios.post('/vendor-panel/sortProducts', {
//                         ids: ids.join()
//                     })
//                     .then(function(response) {
//                         console.log(response.data);
//                     })
//                     .catch(function(error) {
//                         console.log(error);
//                     });

});
        });


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
