@extends('user-views.layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"
    integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .rate {
        float: left;
        height: 46px;
        padding: 0 10px;
    }

    .rate:not(:checked)>input {
        position: absolute;
        display: none;
    }

    .rate:not(:checked)>label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ccc;
    }

    .rated:not(:checked)>label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ccc;
    }

    .rate:not(:checked)>label:before {
        content: '★ ';
    }

    .rate>input:checked~label {
        color: #ffc700;
    }

    .rate:not(:checked)>label:hover,
    .rate:not(:checked)>label:hover~label {
        color: #deb217;
    }

    .rate>input:checked+label:hover,
    .rate>input:checked+label:hover~label,
    .rate>input:checked~label:hover,
    .rate>input:checked~label:hover~label,
    .rate>label:hover~input:checked~label {
        color: #c59b08;
    }

    .star-rating-complete {
        color: #c59b08;
    }

    .rating-container .form-control:hover,
    .rating-container .form-control:focus {
        background: #fff;
        border: 1px solid #ced4da;
    }

    .rating-container textarea:focus,
    .rating-container input:focus {
        color: #000;
    }

    .rated {
        float: left;
        height: 46px;
        padding: 0 10px;
    }

    .rated:not(:checked)>input {
        position: absolute;
        display: none;
    }

    .rated:not(:checked)>label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ffc700;
    }

    .rated:not(:checked)>label:before {
        content: '★ ';
    }

    .rated>input:checked~label {
        color: #ffc700;
    }

    .rated:not(:checked)>label:hover,
    .rated:not(:checked)>label:hover~label {
        color: #deb217;
    }

    .rated>input:checked+label:hover,
    .rated>input:checked+label:hover~label,
    .rated>input:checked~label:hover,
    .rated>input:checked~label:hover~label,
    .rated>label:hover~input:checked~label {
        color: #c59b08;
    }
</style>
@section('content')
    <section class="section-padding product">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-slider">
                        <ul class="inner-slider">
                            @php
                                $images = unserialize($food->image);
                            @endphp
                            @if ($food->feature_image != null)
                                <li>
                                    <img src="{{ $food->feature_image }}">
                                </li>
                            @endif
                            @foreach ($images as $image)
                                {{-- {{ dd($image) }} --}}
                                <li>
                                    <img src="{{ !empty(asset('public/images') . '/' . $image) ? asset('public/images') . '/' . $image : asset('customer/assets/images/screenshot_1.png') }}"
                                        class="" alt="...">
                                </li>
                            @endforeach
                            {{-- <li>
                                    <img src="{{ asset('customer/assets/images/news_image3-min.png') }}" class=""
                        alt="...">
                        </li>
                        <li>
                            <img src="{{ asset('customer/assets/images/news_image2-min-2.png') }}" class="" alt="...">
                        </li>
                        <li>
                            <img src="{{ asset('customer/assets/images/news_image2-min-1.png') }}" class="" alt="...">
                        </li>
                        <li>
                            <img src="{{ asset('customer/assets/images/news_image2-min.png') }}" class="" alt="...">
                        </li>
                        <li>
                            <img src="{{ asset('customer/assets/images/news_image3-min.png') }}" class="" alt="...">
                        </li>
                        <li>
                            <img src="{{ asset('customer/assets/images/news_image2-min-2.png') }}" class="" alt="...">
                        </li> --}}
                        </ul>
                        <ul class="dots-slider">

                            @if ($food->feature_image != null)
                                <li>
                                    <img src="{{ $food->feature_image }}">
                                </li>
                            @endif
                            @foreach ($images as $image)
                                {{-- {{ dd($image) }} --}}
                                <li>
                                    <img src="{{ !empty(asset('public/images') . '/' . $image) ? asset('public/images') . '/' . $image : asset('customer/assets/images/screenshot_1.png') }}"
                                        class="" alt="...">
                                </li>
                            @endforeach
                            {{-- <li>
                                    <img src="{{ asset('customer/assets/images/news_image3-min.png') }}" class=""
                        alt="...">
                        </li>
                        <li>
                            <img src="{{ asset('customer/assets/images/news_image2-min-2.png') }}" class="" alt="...">
                        </li>
                        <li>
                            <img src="{{ asset('customer/assets/images/news_image2-min-1.png') }}" class="" alt="...">
                        </li>
                        <li>
                            <img src="{{ asset('customer/assets/images/news_image2-min.png') }}" class="" alt="...">
                        </li>
                        <li>
                            <img src="{{ asset('customer/assets/images/news_image3-min.png') }}" class="" alt="...">
                        </li>
                        <li>
                            <img src="{{ asset('customer/assets/images/news_image2-min-2.png') }}" class="" alt="...">
                        </li> --}}
                        </ul>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="">
                        <div class="stars">
                            <i class="icon-star"></i>
                            <i class="icon-star"></i>
                            <i class="icon-star"></i>
                            <i class="icon-star"></i>
                            <i class="icon-star"></i>
                            Based on 128 reviews
                        </div>


                        <h4 class="title">{{$food->product_type != 'MealKits' ? $food->name : $food->name . ' (MealKit)' }}</h4>
                        <h6 id="product_price" class="price" value="{{ $food->price }}">${{ $food->price }}</h6>
                        <div class="imgs-icon">


                            <?php $array = json_decode($food->badges);

                            ?>
                            @foreach ($badges as $badge)
                                @if ($array != null && in_array($badge->id, $array))
                                    <img src={{ $badge->image }} class="" alt="" />
                                @endif
                            @endforeach


                        </div>
                        <div class="info">
                            <p>Serves {{ $food->serves }}</p>
                            @if ($food->product_type == 'preorder')
                                <p>QTY: {{ $food->unit }} | Fulfillment Type {{ $food->fulfillment_type }}</p>
                                <p>Fulfillment DateTime: {{ $food->fulfillment_date . ' ' . $food->fulfillment_time }}</p>
                                <p>pre Order DateTime: {{ $food->pre_order_end_date . ' ' . $food->pre_order_end_time }}
                                </p>
                            @endif
                        </div>
                        @if ($food->product_type != 'MealKits')
                        <div class="container">
                            <h4 class="heading pb-0">Variants</h4>
                        </div>
                        @endif
                        @if ($food->allow_subscription == 1)
                        <div class="container">
                            <h3 class="pb-0">Available for Subscription</h4>
                        </div>
                        @endif
                        <hr>
                        <div class="container" id="variants">
                            @if (!empty($variations))
                                @foreach ($variations as $key => $option)
                                    <p class="mb-2 font-weight-bold">
                                        {{ $option->name }}
                                    </p>
                                    <div class="d-flex align-items-center mb-3">
                                        @foreach ($option->values as $value)
                                            {{-- <form id="options-form" class="mr-2"> --}}
                                            <input class="mr-1" type="radio" id="variantss"
                                                data-name="{{ $option->name }},{{ $value->optionPrice }}"
                                                name="variants[{{ $option->name }}]" value="{{ $value->optionPrice }}">
                                            <label class="mr-2"
                                                for="variants">{{ $value->label . ' (+$' . $value->optionPrice . ')' }}
                                            </label>
                                            {{-- </form> --}}
                                            <!--<p class="mparagraph">-->
                                            <!--</p>-->
                                        @endforeach
                                    </div>
                                @endforeach
                            @endif

                        </div>
                        <div class="number">
                            <span class="minus">-</span>
                            <input type="text" id="addMoreQuantity" value="1" />
                            <span class="plus">+</span>
                        </div>
                        <button data-id="{{ $food->id }}" class="btn btn-primary add-to-cart"><i
                                class="icon-shopping-cart"></i> Add To Cart</button>

                        @if ($food->allow_subscription == 1)
                        <a data-id="{{ $food->id }}" class="btn btn-primary" data-toggle="modal"
                            data-target="#subscribe"><i
                                class="icon-shopping-cart"></i> Subscribe</a>
                        @endif
                                
                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="modal fade" id="subscribe" tabindex="-1" role="dialog"
                aria-labelledby="subscribeTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <form action="{{ route('subscribe.food')}}" id="subscribe_form" name="subscribe_form" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Subscribe For This Product</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="form-group">
                                    <label class="input-label" for="start_date">Start Date</label>
                                    <input type="date" name="start_date" id="start-date" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label class="input-label" for="end_date">End Date</label>
                                    <input type="date" name="end_date"  id="end-date" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label class="input-label" for="frequency">Frequency</label>
                                    <select name="frequency" id="frequency" class="custom-select custom-select-lg">
                                        <option disabled>Select Frequency</option>
                                        <option value="weekly">Weekly</option>
                                        <option value="biweekly">Bi-Weekly</option>
                                        <option value="monthly">Monthly</option>
                                    </select>
                                </div>
                                    <input type="hidden" name="totalPrice" id="totalPrice" value="">
                                    <input type="hidden" name="food_id" value={{$food->id}}>
                                    <input type="hidden" id="food_price" name="food_price" value={{$food->price}}>
                                    <table>
                                        <tr>
                                            <td class="text-right pr-1"><h5>Count of Frequency: </h5></td>
                                            <td><h5 id="orders">0</h5></td>
                                        </tr>
                                        <tr>
                                            <td class="text-right pr-1"><h5>Total Amount: </h5></td>
                                            <td><h5 id="total_price">${{$food->price}}</h5></td>
                                        </tr>
                                    </table>
                                    <h2 class="heading mb-2">Stripe Details</h2>
                                        <div class="form-row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input type="text" name="cardName" class="form-control"
                                                        placeholder="Enter Your Name On Card">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input type="number" name="cardNumber" class="form-control"
                                                        placeholder="Enter Your Card Number">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input type="number" name="cardCVC" class="form-control"
                                                        placeholder="Enter Your CVC">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input type="number" name="month" class="form-control"
                                                        placeholder="MM">
                                                        <br>
                                                    <input type="number" name="year" class="form-control"
                                                        placeholder="YYYY">
                                                </div>
                                            </div>
                                        </div>
                                <button type="submit" class="btn btn-primary btn-lg pull-right">Pay Now</button>
                            </form>
                            
                            {{-- <h5>Count of Frequency: 12 </h5>
                            <h5>Total: {{$food->price}}</h5> --}}
                        </div>

                    </div>
                </div>
            </div>

    <section class="section-padding product pb-0">
        <div class="container">
            <h2 class="heading pb-0">Description</h2>
        </div>
        <hr>
        <div class="container">
            <p class="mparagraph">
                {{ $food->description }}
            </p>
        </div>
    </section>


    <section class="section-padding product pb-0">
        <div class="container">
            <h2 class="heading pb-0">Variants</h2>
        </div>
        <hr>
        <div class="container">
            @if (!empty($variations))
                @foreach ($variations as $key => $option)
                    <h4 class="mb-2">
                        {{ $option->name }}
                    </h4>
                    <div class="d-flex align-items-center mb-3">
                        @foreach ($option->values as $value)
                            {{-- <form id="options-form" class="mr-2"> --}}
                            <input class="mr-2" type="radio" id="variants" name="variants"
                                value="{{ $value->optionPrice }}">
                            <label for="variants">{{ $value->label . ' (+$' . $value->optionPrice . ')' }} </label>
                            {{-- </form> --}}
                            <!--<p class="mparagraph">-->
                            <!--</p>-->
                        @endforeach
                    </div>
                @endforeach
            @endif

        </div>
    </section>

    <section class="section-padding product pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="heading">Ingredients</h2>
                </div>
                <div class="col-lg-6 border-left">
                    <h2 class="heading">Allergens</h2>
                </div>
            </div>
        </div>
        <hr class="my-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-2">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul>
                                {{ $food->ingredients }}

                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul>
                                {{-- {{ $food->ingredients }} --}}
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6 border-left pt-2">
                    <ul>
                        {{ $food->allergens }}

                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="section-padding product pb-0">
        <div class="container">
            <h2 class="heading">Items that goes well with this purchase (Add Ons)</h2>

            <div class="row mt-2">
                @foreach ($addonsData as $item)
                    <div class="col-lg-6">
                        <div class="card related-card">
                            <div class="row no-gutters">
                                <div class="col-md-6">
                                    {{-- {{ $addonsData }} --}}
                                    {{-- <img src="{{ asset('customer/assets/images/news_image2-min-1.png') }}" --}}
                                    <img src="{{ $item->image }}" class="img-fluid" alt="...">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="">
                                            <div class="stars">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                Based on 123 reviews
                                            </div>
                                            <h4 class="title">{{ $item->name }}</h4>
                                            <h6 class="price">${{ $item->price }}</h6>

                                            <button class="btn btn-primary add-to-cart" data-id="{{ $item->id }}"><i
                                                    class="icon-shopping-cart"></i> Add To
                                                Cart</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>
    <section class="section-padding product pb-0">
        <div class="container">
            <h2 class="heading pb-0">Reviews</h2>
        </div>
        <hr>
        <div class="container">
            <div class="row">
                @if (empty($reviews->all()))
                    <p>No reviews found</p>
                @else
                    @foreach ($reviews as $review)
                        <div class="col-lg-4">
                            <div class="card review-card shadow">
                                <div class="card-body">
                                    <p>{{ $review->comment }}</p>
                                    <h6>{{ $review->customer->f_name }} {{ $review->customer->l_name }}</h6>
                                    <p class="mb-0">
                                    <div class="rated">
                                        @for ($i = 5; $i >= 1; $i--)
                                            @if ($i > $review->rating)
                                                <label style="color:#ccc" class="star-rating-complete"
                                                    title="text">{{ $i }} stars</label>
                                            @else
                                                <label class="star-rating-complete" title="text">{{ $i }}
                                                    stars</label>
                                            @endif
                                        @endfor
                                    </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <!-- <div class="col-lg-4">
                                    <div class="card review-card shadow">
                                        <div class="card-body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eleifend felis sit amet eros
                                                aliquam varius.</p>
                                            <h6>John Doe</h6>
                                            <p class="mb-0">Admin</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card review-card shadow">
                                        <div class="card-body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eleifend felis sit amet eros
                                                aliquam varius.</p>
                                            <h6>John Doe</h6>
                                            <p class="mb-0">Admin</p>
                                        </div>
                                    </div>
                                </div> -->
            <!-- <p class="mparagraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi et leo nec tellus sagittis
                                    faucibus. Quisque interdum sit amet libero quis eleifend. Fusce sit amet sapien ultricies, euismod leo nec,
                                    eleifend justo. Aenean augue lorem, lacinia sit amet mauris ut, sagittis auctor urna. Donec sapien elit,
                                    congue sagittis aliquam eu, egestas in lorem. Donec vestibulum nisl sed risus sollicitudin, eget pharetra
                                    nibh ullamcorper.</p> -->
        </div>
    </section>
    <section class="section-padding product pb-0">
        <div class="container">
            <h2 class="heading pb-0">Write a Review</h2>
        </div>
        <hr>
        <div class="container">
            <form class="shadow-form" action="{{ route('review.food') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="hidden" name="food_id" value="{{ $food->id }}">
                            <p class="font-weight-bold ">Rating</p>
                            <div class="col">
                                <div class="rate">
                                    <input type="radio" id="star5" class="rate" name="rating"
                                        value="5" />
                                    <label for="star5" title="text">5 stars</label>
                                    <input type="radio" id="star4" class="rate" name="rating"
                                        value="4" />
                                    <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star3" class="rate" name="rating"
                                        value="3" />
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star2" class="rate" name="rating" value="2">
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star1" class="rate" name="rating"
                                        value="1" />
                                    <label for="star1" title="text">1 star</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" placeholder="Type your email...">
                                            </div>
                                        </div> -->
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Review</label>
                            <textarea name="comment" id="" rows="5" class="form-control" placeholder="Type your feedback..."></textarea>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>

    <section class="listitem section-padding">
        <div class="container">
            {{-- <select name="" id="" class="btn btn-primary mr-2">
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
        </select> --}}
            <h2 class="heading pb-0">Other Products</h2>
            <div class="row mt-3">
                <div class="col-lg-4">
                    <div class="card res-card items-card" style="">
                        <div class="img">
                            <label for="">Pre-Order</label>
                            <img src="{{ asset('customer/assets/images/news_image2-min-1.png') }}" class="card-img-top"
                                alt="...">
                            <div class="stars">
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                (20)
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="icon-more-horizontal"></i>
                                </a>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Attribute Variation</h5>
                            <p class="card-text">Chicken, tommato, green salad, pita, ketchup,….</p>
                            <a href="#" class="btn btn-primary"><i class="icon-shopping-cart mr-2"></i> Add To
                                Cart</a>
                            <a href="#" class="ml-3 fs-18">$10.99</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card res-card items-card" style="">
                        <div class="img">
                            <label for="">Pre-Order</label>
                            <img src="{{ asset('customer/assets/images/news_image2-min-2.png') }}" class="card-img-top"
                                alt="...">
                            <div class="stars">
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                (20)
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="icon-more-horizontal"></i>
                                </a>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Attribute Variation</h5>
                            <p class="card-text">Chicken, tommato, green salad, pita, ketchup,….</p>
                            <a href="#" class="btn btn-primary"><i class="icon-shopping-cart mr-2"></i> Add To
                                Cart</a>
                            <a href="#" class="ml-3 fs-18">$10.99</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card res-card items-card" style="">
                        <div class="img">
                            <label for="">Pre-Order</label>
                            <img src="{{ asset('customer/assets/images/news_image3-min.png') }}" class="card-img-top"
                                alt="...">
                            <div class="stars">
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                (20)
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="icon-more-horizontal"></i>
                                </a>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Attribute Variation</h5>
                            <p class="card-text">Chicken, tommato, green salad, pita, ketchup,….</p>
                            <a href="#" class="btn btn-primary"><i class="icon-shopping-cart mr-2"></i> Add To
                                Cart</a>
                            <a href="#" class="ml-3 fs-18">$10.99</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card res-card items-card" style="">
                        <div class="img">
                            <label for="">Pre-Order</label>
                            <img src="{{ asset('customer/assets/images/news_image2-min.png') }}" class="card-img-top"
                                alt="...">
                            <div class="stars">
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                (20)
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="icon-more-horizontal"></i>
                                </a>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Attribute Variation</h5>
                            <p class="card-text">Chicken, tommato, green salad, pita, ketchup,….</p>
                            <a href="#" class="btn btn-primary"><i class="icon-shopping-cart mr-2"></i> Add To
                                Cart</a>
                            <a href="#" class="ml-3 fs-18">$10.99</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card res-card items-card" style="">
                        <div class="img">
                            <label for="">Pre-Order</label>
                            <img src="{{ asset('customer/assets/images/news_image2-min-1.png') }}" class="card-img-top"
                                alt="...">
                            <div class="stars">
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                (20)
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="icon-more-horizontal"></i>
                                </a>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Attribute Variation</h5>
                            <p class="card-text">Chicken, tommato, green salad, pita, ketchup,….</p>
                            <a href="#" class="btn btn-primary"><i class="icon-shopping-cart mr-2"></i> Add To
                                Cart</a>
                            <a href="#" class="ml-3 fs-18">$10.99</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card res-card items-card" style="">
                        <div class="img">
                            <label for="">Pre-Order</label>
                            <img src="{{ asset('customer/assets/images/news_image2-min-1.png') }}" class="card-img-top"
                                alt="...">
                            <div class="stars">
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                (20)
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="icon-more-horizontal"></i>
                                </a>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Attribute Variation</h5>
                            <p class="card-text">Chicken, tommato, green salad, pita, ketchup,….</p>
                            <a href="#" class="btn btn-primary"><i class="icon-shopping-cart mr-2"></i> Add To
                                Cart</a>
                            <a href="#" class="ml-3 fs-18">$10.99</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection

@section('script')
    @push('script_2')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
            integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="text/javascript">
            $(document).ready(function() {

                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }

                $(".add-to-cart").click(function(e) {
                    e.preventDefault();
                    var ele = $(this);
                    var addMoreQuantity = $('#addMoreQuantity').val();
                    var variant = [];
                    var variants = $("#variants input[type='radio']:checked").map(function(index) {
                        variant = $(this).attr("data-name");
                        return variant;
                    }).get();
                    //            $.each(variants , function(index, val) {
                    //             variants[index] = 'test'
                    // });
                    console.log(variants);
                    console.log(ele);
                    console.log(ele.attr("data-id"));

                    ele.siblings('.btn-loading').show();

                    console.log(addMoreQuantity)
                    $.ajax({
                        url: '{{ url('customer/add-to-cart') }}' + '/' + ele.attr("data-id"),
                        method: "get",
                        data: {
                            _token: '{{ csrf_token() }}',
                            addMoreQuantity: addMoreQuantity,
                            variants: variants
                        },
                        dataType: "json",
                        success: function(response) {

                            ele.siblings('.btn-loading').hide();
                            $(".cart-count").html(response.countlist);
                            $("span#status").html('<div class="alert alert-success">' + response
                                .msg +
                                '</div>');
                            $("#header-bar").html(response.data);
                            toastr.success(response.msg);
                        }
                    });
                });
                $("#subscribe_form").submit(function(e){
                    e.preventDefault();
                    var actionUrl = e.currentTarget.action;
                    console.log(actionUrl);
                    // var formData = $('form[name="subscribe_form"]').serialize();
                    var formData = $(this);
                    $.ajax({
                        url: actionUrl,
                        method: 'post',
                        dataType: 'json',
                        data: formData.serialize(),
                        success: function(response) {
                            $('#subscribe').modal('hide');
                            $('body').removeClass('modal-open');
                            $('.modal-backdrop').remove();
                            console.log('success');
                            toastr.success(response);
                            
                        }
                    })
                });
const startDateInput = document.getElementById("start-date");
const endDateInput = document.getElementById("end-date");
const frequencyInput = document.getElementById("frequency");

console.log(startDateInput);
console.log(endDateInput);
console.log(frequencyInput);

function calculateOrders(startDate, endDate, frequency) {

    const oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
    const start = new Date(startDate);
    const end = new Date(endDate);
    days = Math.round(Math.abs((start - end) / oneDay));

  // Calculate the number of orders based on the frequency.
    switch (frequency) {
        case "weekly":
            orders = Math.ceil(days / 7) || 0;
            console.log("weekly");
            console.log(orders);
            document.getElementById("orders").innerHTML = orders;
            document.getElementById("total_price").innerHTML = orders * document.getElementById("food_price").value;
            document.getElementById("totalPrice").value = orders * document.getElementById("food_price").value;
            return;
        case "biweekly":
            orders = Math.ceil(days / 14) || 0;
            console.log("biweekly");
            console.log(orders);
            document.getElementById("orders").innerHTML = orders;
            document.getElementById("total_price").innerHTML = orders * document.getElementById("food_price").value;
            document.getElementById("totalPrice").value = orders * document.getElementById("food_price").value;
            return;
        case "monthly":
            orders = Math.ceil(days / 30) || 0;
            console.log("monthly");
            console.log(orders);
            document.getElementById("orders").innerHTML = orders;
            document.getElementById("total_price").innerHTML = orders * document.getElementById("food_price").value;
            document.getElementById("totalPrice").value = orders * document.getElementById("food_price").value;
            return;
        default:
            throw new Error("Invalid frequency");
  }
}
$("#start-date").on("change", function(e) {
    console.log("start-date changed");
    calculateOrders(startDateInput.value, endDateInput.value, frequencyInput.value);
})
$("#end-date").on("change", function(e) {
    console.log("end-date changed");
    calculateOrders(startDateInput.value, endDateInput.value, frequencyInput.value);
})
$("#frequency").on("change", function(e) {
    console.log("frequency changed");
    calculateOrders(startDateInput.value, endDateInput.value, frequencyInput.value);
})
                // $('input[name="variants[]"]').change(updatePrice);

                // function updatePrice() {

                //     var priceIncrease = 0;
                //     let price = parseInt($('#product_price').text().replace('$', ''));

                // $('input[name="variants[]"]:checked').each(function() {
                //     priceIncrease += parseInt($(this).val());
                //     console.log(priceIncrease);
                // });
                //   totalPrice = price + priceIncrease;
                // //   $('#product_price').text('$' + totalPrice.toFixed(2));
                //   $('#product_price').text('$' + totalPrice);
                // }

                $(document).ready(function() {
                    var originalPrice = parseInt($('#product_price').text().replace('$', ''));
                    $("input[type='radio']").click(function() {

                        var priceTotal = originalPrice;

                        $("input[type='radio']:checked").each(function() {
                            priceTotal += parseInt($(this).val());
                        });

                        $('#product_price').text('$' + priceTotal);
                    });
                });

            });
        </script>
    @endsection
@endpush
