@extends('user-views.layouts.app')

@section('css')
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('content')
    {{-- @dd(auth()->guard('customer')->user()) --}}
    <section class="home-banner restaurant-banner d-flex"
        style="background-image:url({{ !empty($restaurant->cover_photo) ? asset('public/images') . '/' . $restaurant->cover_photo : asset('public/customer/assets/images/restaurant-1600x900.jpg') }})">
        <div class="container align-self-center">
            <div class="row">
                <div class="col-lg-8 align-self-end">
                    <div class="bannertext">
                        <span class="subheading text-primary">Exclusive Offer</span>
                        <h1 class="banner-heading fw-400">Buy One Dish And Get <span class="text-primary"><b>20%
                                    Off</b></span> On Next Order</h1>
                        <p class="banner-paragraph">Only this week don't miss</p>
                        <a href="javascript:void(0);" class="btn btn-primary" role="button">Follow</a>
                        <a href="#" class="btn btn-secondary minimize-chat">Message</a>

                    </div>
                </div>
                {{-- <div class="col-lg-3 align-self-end">
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
                </div> --}}
                <div class="col-lg-4 align-self-end">
                    <div class="follow-pro">
                        <img src="{{ !empty($vendor->image) ? asset('public/images/vendor') . '/' . $vendor->image : asset('public/images/vendor/placeholder_profile.jpg') }}"
                            class="" alt="...">
                        @if (!empty($follower))
                            <a href="javascript:void(0);" data-id="{{ $restaurant->id }}"
                                class="btn btn-primary follower-btn" role="button">unfollow</a>
                        @else
                            <a href="javascript:void(0);" data-id="{{ $restaurant->id }}"
                                class="btn btn-primary follower-btn" role="button">Follow</a>
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




            <div class="form-group" style="display:none" id="FilterCategory">
                <form method="GET" action="{{ route('foods.filter1', $restaurant->id) }}">
                    {!! Form::label('category', 'Filter by Category') !!}
                    {!! Form::select('category', $categories, null, ['class' => 'form-control']) !!}
                    <button type="submit" id="FilterCategory1"> Filter</button>
                </form>
            </div>

            <div class="form-group" style="display:none" id="FilterBadges">
                <form method="GET" action="{{ route('foods.filter2', $restaurant->id) }}">
                    {!! Form::label('Badges', 'Filter by Badges') !!}
                    {!! Form::select('badges', $badges, null, ['class' => 'form-control']) !!}

                    <button type="submit" id="FilterBadges1"> Filter</button>
                </form>
            </div>


            <div class="row mt-3">
                <div class="col-lg-3">
                    <div class="filter-box">
                        <h4>Filter</h4>
                        @foreach ($categories as $category)
                          {{-- {!! Form::select('category', $categories, null, ['class' => 'form-control']) !!} --}}
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="category-{{ $category->id }}" data-id="{{ $category->id }}">
                            <label class="custom-control-label" for="category-{{ $category->id }}">{{ $category->name }}</label>
                          </div>
                          
                        @endforeach

                    </div>
                    <div class="filter-box">
                        <h4>Badges</h4>
                        @foreach ($badges as $badge)
                        <div class="custom-control custom-radio">
                            <input type="radio" id="{{ $badge->id }}" name="Badges" class="custom-control-input">
                            <label class="custom-control-label" for="vegan">
                                <img src="{{ $badge->image  }}" class=""
                                    alt="..."> {{ $badge->name }}
                            </label>
                        </div>
                        @endforeach

                        {{-- <div class="custom-control custom-radio">
                            <input type="radio" id="madetoorder" name="Badges" class="custom-control-input">
                            <label class="custom-control-label" for="madetoorder">
                                <img src="{{ asset('public/customer/assets/images/madetoorder.png') }}" class=""
                                    alt="..."> Made to Order
                            </label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="nutfree" name="Badges" class="custom-control-input">
                            <label class="custom-control-label" for="nutfree">
                                <img src="{{ asset('public/customer/assets/images/nutfree.png') }}" class=""
                                    alt="..."> Nut Free
                            </label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="lowcarbs" name="Badges" class="custom-control-input">
                            <label class="custom-control-label" for="lowcarbs">
                                <img src="{{ asset('public/customer/assets/images/lowcarbs.png') }}" class=""
                                    alt="..."> Low Carb
                            </label>
                        </div> --}}

                    </div>
                </div>
               
                <div class="col-lg-9 fooditems">
                    <div id="foodList" class=""></div>
                
                    <div class="row">
                        @forelse ($foods as $food)
                            @php
                                $images = unserialize($food->image);
                            @endphp

                            <div class="col-lg-4">
                                <div class="card res-card filter-card items-card" style="">
                                    <div class="img">
                                        <label for="">{{ $food->product_type }}</label>
                                        <a href="{{ route('food.view', $food->id) }}">
                                            @if (!empty($food->feature_image))
                                                <img src="{{ !empty($food->feature_image) ? $food->feature_image : asset('customer/assets/images/news_image2-min-1.png') }}"
                                                    class="card-img-top" alt="...">
                                            @else
                                                @foreach ($images as $image)
                                            
                                                    <img src="{{ !empty(asset('public/images') . '/' . $image) ? asset('public/images') . '/' . $image : asset('customer/assets/images/news_image2-min-1.png') }}"
                                                        class="card-img-top" alt="...">
                                                @break
                                            @endforeach

                                        @endif
                                    </a>

                    
                                </div>
                                <div class="card-body">
                                    <div class="stars">
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        (20)
                                    </div>
                                    <a href="{{ route('food.view', $food->id) }}">
                                        <h5 class="card-title">{{ $food->name }}</h5>
                                    </a>
                                    <p class="card-text mb-0">{{ $food->description }}</p>
                                    @if ($food->product_type == 'preorder')
                                        <p class="card-text">QTY: {{ $food->unit }}</p>
                                    @endif
                                    <div class="bottom">
                                        <a href="javascript:void(0);" data-id="{{ $food->id }}"
                                            class="btn btn-primary add-to-cart btn-sm" role="button"><i
                                                class="icon-shopping-cart mr-2"></i> Add To
                                            Cart</a>
                                        <i class="fa fa-circle-o-notch fa-spin btn-loading"
                                            style="font-size:24px; display: none"></i>
                                        <a href="{{ route('food.view', $food->id) }}"
                                            class="ml-3 fs-18">${{ $food->price }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        {{ __('Food Not Found Here') }}
                    @endforelse
                </div>
            </div>
        </div>

    </div>
</section>
<div class="container">
    <h3>Kitchen Images</h3>
    @forelse ($kitchengallery as $g)
        <div id="img{{ $g->id }}" class="d-inline" style="">
            @if (in_array(pathinfo($g->image, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
                <a href="{{ $g->image }}" data-fancybox="gallery" data-caption="Kitchen Image">
                    <img src="{{ $g->image }}" class="kitchenimg" alt="...">
                </a>
            @elseif(in_array(pathinfo($g->image, PATHINFO_EXTENSION), ['doc', 'docx', 'ppt', 'pptx', 'xls', 'xlsx']))
                {{-- <div class="document-file"> --}}
                <a href="{{ asset($g->image) }}" target="_blank"
                    style="vertical-align: middle;">{{ $g->image }}</a>
                {{-- </div> --}}
            @elseif(in_array(pathinfo($g->image, PATHINFO_EXTENSION), ['pdf']))
                {{-- <div class="pdf-file"> --}}
                <embed src="{{ asset($g->image) }}" type="application/pdf" class="kitchenimg"
                    style="vertical-align: middle;" />
                {{-- </div> --}}
            @elseif(in_array(pathinfo($g->image, PATHINFO_EXTENSION), ['mp4', 'avi', 'mov', 'wmv', 'flv', 'webm']))
                {{-- <div class="video-file"> --}}
                <video src="{{ asset($g->image) }}" class="kitchenimg" style="vertical-align: middle;"
                    controls></video>
                {{-- </div> --}}
            @endif
        @empty
            <p>Image not found...</p>
    @endforelse
    {{-- @foreach ($kitchengallery as $g)
                <img style="width:auto; height:150px" src="{{$g->image}}" class="" alt="...">
        
                @endforeach  --}}
</div>
</div>
<section class="section-padding">
    <div class="container">
        <div class="mb-4 text-center">
            <h3 class="mheading fw-700">Follow the @SPICY On Instagram Profile</h3>
        </div>
        <div class="insta-box">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card res-card filter-card insta-card" style="">
                        <img src="{{ asset('public/customer/assets/images/insta1.png') }}" class=""
                            alt="...">
                        <div class="card-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisc...</p>
                            <div class="total-likes">
                                <span><img src="{{ asset('public/customer/assets/images/heart.png') }}"
                                        class="" alt="..."> 250</span>
                                <span><img src="{{ asset('public/customer/assets/images/chat.png') }}" class=""
                                        alt="..."> 147</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card res-card filter-card insta-card" style="">
                        <img src="{{ asset('public/customer/assets/images/insta2.png') }}" class=""
                            alt="...">
                        <div class="card-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisc...</p>
                            <div class="total-likes">
                                <span><img src="{{ asset('public/customer/assets/images/heart.png') }}"
                                        class="" alt="..."> 250</span>
                                <span><img src="{{ asset('public/customer/assets/images/chat.png') }}" class=""
                                        alt="..."> 147</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card res-card filter-card insta-card" style="">
                        <img src="{{ asset('public/customer/assets/images/insta3.png') }}" class=""
                            alt="...">
                        <div class="card-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisc...</p>
                            <div class="total-likes">
                                <span><img src="{{ asset('public/customer/assets/images/heart.png') }}"
                                        class="" alt="..."> 250</span>
                                <span><img src="{{ asset('public/customer/assets/images/chat.png') }}" class=""
                                        alt="..."> 147</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card res-card filter-card insta-card" style="">
                        <img src="{{ asset('public/customer/assets/images/insta4.png') }}" class=""
                            alt="...">
                        <div class="card-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisc...</p>
                            <div class="total-likes">
                                <span><img src="{{ asset('public/customer/assets/images/heart.png') }}"
                                        class="" alt="..."> 250</span>
                                <span><img src="{{ asset('public/customer/assets/images/chat.png') }}" class=""
                                        alt="..."> 147</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-3">
                <a href="#" class="btn btn-primary"><i class="icon-instagram1"></i> Follow us on Instagram</a>
            </div>
        </div>
    </div>
</section>
<section class="section-padding py-4">
    <div class="container">
        <div class="my-4 text-center">
            <h3 class="mheading fw-700">Offers</h3>
        </div>
        <img class="img-fluid" src="{{ asset('public/customer/assets/images/coupan.png') }}" class=""
            alt="...">
    </div>
</section>
<section class="section-padding">
    <div class="container">
        <div class="my-4 text-center">
            <h3 class="mheading fw-700">Our Story</h3>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <img class="img-fluid" src="{{ asset('public/customer/assets/images/story.png') }}" class=""
                    alt="...">
            </div>
            <div class="col-lg-6 align-self-center">
                <h3 class="mheading fw-700 mb-3">LOREM IPSUM</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum facilisis ultricies.
                    Cras non gravida ante, nec lacinia sem. Cras condimentum lorem vitae mauris faucibus, eget laoreet
                    nibh facilisis. Morbi tristique sit amet dui ac ultricies. Aliquam semper auctor laoreet. Integer
                    dolor dui, sagittis id elit tincidunt, tincidunt convallis quam.</p>
            </div>
        </div>
    </div>
</section>

<div class="chat-pop">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Chat messages</h5>
            <div class="d-flex flex-row align-items-center minimize-chat">
                <i class="fas fa-minus mr-3 text-muted"></i>
            </div>
        </div>
        <div class="chat-body" style="display: none;">
            <div class="card-body" id="chatDetails">
                @forelse ($conversation_lists as $conversation_list)
                    @if ($conversation_list->type == 'seller')
                        <div class="d-flex justify-content-between">
                            <p class="small mb-1">
                                {{ $conversation_list->restaurant->name }}</p>
                            <p class="small mb-1 text-muted">{{ $conversation_list->created_at }}</p>
                        </div>
                        <div class="d-flex flex-row justify-content-end mb-2 pt-1">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava5-bg.webp"
                                alt="avatar 1" class="avatar">
                            <div>
                                <p class="recieve textchat" style="background-color: #f5f6f7;">
                                    {{ $conversation_list->reply }}</p>
                            </div>
                        </div>
                    @endif
                    @if ($conversation_list->type == 'customer')
                        <div class="d-flex justify-content-between">
                            <p class="small mb-1">
                                {{ $conversation_list->user->f_name . ' ' . $conversation_list->user->l_name }}</p>
                            <p class="small mb-1 text-muted">{{ $conversation_list->created_at }}</p>
                        </div>
                        <div class="d-flex flex-row justify-content-start mb-2 pt-1">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava5-bg.webp"
                                alt="avatar 1" class="avatar">
                            <div>
                                <p class="recieve textchat" style="background-color: #f5f6f7;">
                                    {{ $conversation_list->reply }}</p>
                            </div>
                        </div>
                    @endif
                @empty
                    {{ __('Data Not Found') }}
                @endforelse

            </div>
            <div class="card-footer">
                <div class="input-group mb-0">
                    <input type="text" class="form-control" id="text-message" placeholder="Type message"
                        aria-label="Recipient's username" aria-describedby="button-addon2" />
                    <button class="btn btn-primary" type="button" id="button-addon2"
                        data-id="{{ !empty($restaurant->id)?$restaurant->id:'' }}">
                        Button
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script type="text/javascript">

// Add a new class to the body class list
// bodyClass.add('dark-theme');

// $(window).on('load',function () {
//     var logoPath;
//             logoPath =  "<?php echo asset('public/images') . '/' . $restaurant->logo ?>"
 
//             $(".navbar-brand img").attr("src", logoPath);

// });

    $(document).ready(function() {
        // console.log("selectedIdss");
        
        // var currentUrl = window.location.href;
         


    //     setTimeout(() => {
    //     var logoPath;
    //     var logoChecker = 0;
    //     if(logoChecker == 1)
    //     {
    //         logoPath = "<?php echo $restaurant->logo ?> ";
    //         console.log(logoPath);
    //         // Update the logo source attribute
    //         $(".navbar-brand img").attr("src", logoPath);
    //     }
           
           
    //         console.log("window load");
    // }, 500);

var bodyClass = document.body.classList;
console.log("bodyClass "  + bodyClass);
var template = "<?php echo $restaurant->store_template; ?>";
            console.log(template);
            bodyClass.add(template);

        $('#button-addon2').on('click', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var message = $('#text-message').val();
            var type = 'customer';
            // alert(id + ' ' + message);
            $.ajax({
                type: 'POST',
                url: "{{ route('send.message') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    submit_message: message,
                    type: type,
                    seller_id: id
                },
                success: (data) => {
                    $('#text-message').val('');
                    // toastr.success(data.message);
                    console.log(data);
                    if (data.status == true) {
                        var appendChat = '';
                        $.each(data.chatlists, function(index, ChatData) {
                            console.log(ChatData.type == 'seller');
                            if (ChatData.type == 'customer') {
                                appendChat += `
                                    <div class="d-flex justify-content-between">
                                        <p class="small mb-1">
                                            ${data.User.firstname}`;
                                appendChat += ` ${data.User.lastname}</p>
                                        <p class="small mb-1 text-muted">${ChatData.created_at}</p>
                                    </div>
                                    <div class="d-flex flex-row justify-content-start mb-2 pt-1">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava5-bg.webp"
                                            alt="avatar 1" class="avatar">
                                        <div>
                                            <p class="recieve textchat" style="background-color: #f5f6f7;">
                                                ${ChatData.reply}</p>
                                        </div>
                                    </div>
                                    `;
                            }
                            if (ChatData.type == 'seller') {
                                appendChat += `
                                    <div class="d-flex justify-content-between">
                                        <p class="small mb-1">
                                            ${data.senderData.name}</p>
                                        <p class="small mb-1 text-muted">${ChatData.created_at}</p>
                                    </div>
                                    <div class="d-flex flex-row justify-content-end mb-2 pt-1">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava5-bg.webp"
                                            alt="avatar 1" class="avatar">
                                        <div>
                                            <p class="recieve textchat" style="background-color: #f5f6f7;">
                                                ${ChatData.reply}</p>
                                        </div>
                                    </div>
                                    `;
                            }
                        });
                        $('#chatDetails').html(appendChat);
                    }
                }
            });
        });


        Pusher.logToConsole = true;
        var pusher = new Pusher("{{ env('PUSHER_APP_KEY') }}", {
            cluster: "ap2",
        });
        var channel = pusher.subscribe("local.chat");

        channel.bind("customer-Chat", function(data) {
            var id = "{{ $restaurant->id }}";
            console.log(data.conservationData);
            console.log(data.conservationData.sent_user);
            console.log(data.conservationData.sent_user == id);
            console.log(data.conservationData.type == 'seller');
            var appendChat = '';
            if (data.conservationData.sent_user == id) {
                if (data.conservationData.type == 'seller') {
                    appendChat += `
                    <div class="d-flex justify-content-between">
                        <p class="small mb-1">
                            ${data.conservationData.senderData.name}</p>
                        <p class="small mb-1 text-muted">${data.conservationData.MessageDateTime}</p>
                    </div>
                    <div class="d-flex flex-row justify-content-end mb-2 pt-1">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava5-bg.webp"
                            alt="avatar 1" class="avatar">
                        <div>
                            <p class="recieve textchat" style="background-color: #f5f6f7;">
                                ${data.conservationData.message}</p>
                        </div>
                    </div>
                        <br>
                    `;
                }
                $('#chatDetails').append(appendChat);
            }
        });

        var restaurantId = <?php echo $restaurant->id; ?>;
            console.log(restaurantId);
        $('.custom-control-input').on('change', function() {
    if ($(this).is(':checked')) {
      console.log('Checkbox with ID ' + $(this).data('id') + ' is checked');

      $.ajax({
                    url: "{{  route('foods.filter1') }}",
                    data: {
                        id: restaurantId, category: $(this).data('id')
                    },
                    
                    success: function(data) {
                        console.log("success");
                        console.log(data);
                        console.log("success1");
                        
                        var foodList = "";
                            foodList += '  <div class="row"> ';
                                $.each(data, function(index, food) {
                                    @php

                                    // $data = '<script>'+ food.image +' </script>';
                                    $data = 'a:2:{i:0;s:46:"prod1674884910.food-banner-design-template.jpg";i:1;s:27:"prod1674884910.ninja jp.png";}';
                            $json_data = json_encode(unserialize($data));


                                // $images = unserialize(food.images);  
                            @endphp
                            // var data = {{$json_data}};
                            // var decoded_data = JSON.parse(data);

                                    
                            // console.log("Images" +  $images);
                                   foodList += ' <div class="col-lg-4">'
                                       foodList += ' <div class="card res-card filter-card items-card" style=""> '
                                           foodList += ' <div class="img"> '
                                              foodList += '  <label for=""> '+ food.product_type+'   </label> '
                                              foodList += '  <a href="https://testapp-dev.thesuitchstaging.com/customer/view/38/food"> '
                                                   foodList += ' <img src="https://testapp-dev.thesuitchstaging.com/public/images/prods1675984222.burgers_category.jpg" class="card-img-top" alt="..."> '
                                               foodList += ' </a> '
                                           foodList += ' </div> '
                                           foodList += ' <div class="card-body"> '
                                              foodList += '  <div class="stars"> '
                                                  foodList += '  <i class="icon-star"></i> '
                                                  foodList += ' <i class="icon-star"></i> '
                                                  foodList += '  <i class="icon-star"></i> '
                                                  foodList += '  <i class="icon-star"></i> '
                                                  foodList += '  <i class="icon-star"></i> '
                                                  foodList += '  (20) '
                                               foodList += ' </div> '
                                               foodList += ' <a href="https://testapp-dev.thesuitchstaging.com/customer/view/38/food"> '
                                                   foodList += ' <h5 class="card-title">'+ food.name +'</h5> '
                                               foodList += ' </a> '
                                               foodList += ' <p class="card-text mb-0">'+ food.description +'</p> '
                                               foodList += ' <div class="bottom"> '
                                                  foodList += '  <a href="javascript:void(0);" data-id="38" class="btn btn-primary add-to-cart btn-sm" role="button"><i class="icon-shopping-cart mr-2"></i> Add To Cart</a> '
                                                   foodList += ' <i class="fa fa-circle-o-notch fa-spin btn-loading" style="font-size:24px; display: none"></i> '
                                                   foodList += ' <a href="javascript:;" class="ml-3 fs-18">$'+ food.price +'</a> '
                                               foodList += ' </div> '
                                           foodList += ' </div> '
                                       foodList += ' </div> '
                                   foodList += ' </div> '
                                   // foodList += '  <div class="card"> ';
                                    //    foodList += ' <div class="card-body">';
                                      //      foodList += '   <h6> Id :'+ food.id +'</h6>';
                                       //     foodList += '   <h6>  Name : '+ food.name +'</h6>';
                                       //     foodList += '   <h6>  Description :'+ food.description +'</h6>';
                                        //    foodList += '   <h6>  Price : '+ food.price +'</h6>';
                                    //    foodList += '   </div>';
                                  //  foodList += '   </div>';
                                
                                });
                            foodList += '   </div>';

                       
                        $('#foodList').html(foodList);
                    }
                });
                
      // Perform some action when checkbox is checked
    } else {
      console.log('Checkbox with ID ' + $(this).data('id') + ' is unchecked');
      // Perform some action when checkbox is unchecked
    }
  });
});



         
        
    


 
        selectElement = document.querySelector('#mySelect');

        selectElement.addEventListener('change', (event) => {

            selectedOption = event.target.value;
            console.log(`Selected option: ${selectedOption}`);

            if (selectedOption == "Category") {
                $("#FilterCategory").show();
                $("#FilterCategory1").show();
                $("#FilterBadges").hide();
                $("#FilterBadges1").hide();
            }
            if (selectedOption == "Badges") {
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
