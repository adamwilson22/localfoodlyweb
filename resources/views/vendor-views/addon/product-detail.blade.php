@extends('layouts.vendor.app')

@section('title', __('Product Detail'))

@push('css_or_js')
@endpush

<body class="">
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
            <div class="col-lg-7">
                <div class="row mb-4">
                    <div class="col-lg-6">
                        <div class="product-detail">
                            <div class="product-big">
                                @foreach ($product->image as $img)
                                <div>
                                    <img src="{{ $img }}" alt="">
                                </div>
                                    
                                @endforeach
                                {{-- <div>
                                    <img src="{{ asset('public/assets/admin/img/pexels-ana-madeleine-uribe-2762942.png') }}" alt="">
                                </div>
                                <div>
                                    <img src="{{ asset('public/assets/admin/img/pexels-ana-madeleine-uribe-27629421.png') }}" alt="">
                                </div>
                                <div>
                                    <img src="{{ asset('public/assets/admin/img/pexels-ana-madeleine-uribe-27629422png.png') }}" alt="">
                                </div>
                                <div>
                                    <img src="{{ asset('public/assets/admin/img/pexels-ana-madeleine-uribe-27629423.png') }}" alt="">
                                </div> --}}
                            </div>
                            <div>
                                <a href="#" class="btn btn-primary btn-lg w-100" data-toggle="modal" data-target="#sharedModalCenter">Share This Product</a>
                            </div>
                            <div class="product-nav">
                                
                                @foreach ($product->image as $img)
                                <div>
                                    <img src="{{ $img }}" alt="">
                                </div>
                                    
                                @endforeach
                                {{-- <div>
                                    <img src="{{ asset('public/assets/admin/img/pizza.png') }}" alt="">
                                </div>
                                <div>
                                    <img src="{{ asset('public/assets/admin/img/pexels-ana-madeleine-uribe-2762942.png') }}" alt="">
                                </div>
                                <div>
                                    <img src="{{ asset('public/assets/admin/img/pexels-ana-madeleine-uribe-27629421.png') }}" alt="">
                                </div>
                                <div>
                                    <img src="{{ asset('public/assets/admin/img/pexels-ana-madeleine-uribe-27629422png.png') }}" alt="">
                                </div>
                                <div>
                                    <img src="{{ asset('public/assets/admin/img/pexels-ana-madeleine-uribe-27629423.png') }}" alt="">
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h4 class=""> Add-Ons</h4>

                        <div class="product-cards detail-pro">
                            @foreach ($addon as $item)
                            <div class="card">
                                <div class="card-body">
                                    <div class="product-img">
                                        {{-- <img src="{{ asset('public/assets/admin/img/Untitled-1.png') }}" alt=""> --}}
                                        <img src="{{ $item->image }}" alt="">
                                    </div>
                                    <div class="content">
                                        <h4>{{$item->name}}</h4>
                                        <div class="star">
                                            @if ($item->rating_count != 0)
                                            
                                            @for ($i = 0 ; $i < $item->rating_count ; $i++)
                                                <i class="icon-star_icon"></i>     
                                            @endfor
                                            {{ '(' . $item->rating_count . ')' }}
                                            @endif
                                        </div>
                                        <p>{{ '$' . $item->price }}</p>
                                    </div>
                                    <div class="action">
                                        <a href="#">
                                            <i class="icon-edit_icon"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="">
                                <a href="#" class="">Create More Add-Ons</a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-7">
                                <h2 class="">
                                    {{$product->name}}
                                </h2>
                            </div>
                            <div class="col-lg-5">
                                <div class="sltoption justify-content-end">
                                    <img src="{{ asset('public/assets/admin/img/vegan.png') }}" alt="">
                                    <img src="{{ asset('public/assets/admin/img/madetoorder.png') }}" alt="">
                                    <img src="{{ asset('public/assets/admin/img/nutfree.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                        
                        <div class="star">
                            @for ($i = 0 ; $i  < $product->rating_count ; $i++)
                            
                                <i class="icon-star_icon"></i>    
                            
                            @endfor
                            
                            ({{ $product->rating_count }})
                        </div>

                        <p>{{$product->description}}</p>
                        <div class="btn-group sizing-btn btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary active">
                                <input type="radio" name="options" id="small" autocomplete="off" checked> S
                            </label>
                            <label class="btn btn-secondary">
                                <input type="radio" name="options" id="medium" autocomplete="off"> M
                            </label>
                            <label class="btn btn-secondary">
                                <input type="radio" name="options" id="large" autocomplete="off"> L
                            </label>
                            <label class="btn btn-secondary">
                                <input type="radio" name="options" id="extralarge" autocomplete="off"> XL
                            </label>
                        </div>
                        <div class=" form-group">
                            <label class="input-label" for="">{{'Serves: ' . $product->serves }}</label>
                            {{-- <select name="" id="" class="custom-select custom-select-lg">
                                <option value="">More than 4</option>
                                <option value="">Item 1</option>
                                <option value="">Item 1</option>
                                <option value="">Item 1</option>
                            </select> --}}
                        </div>
                        
                        <h2 class="">
                            Add-Ons
                        </h2>
                        <div class="row">
                            @foreach ($addon as $item)
                            <div class="col-lg-4">
                                <div class="custom-control custom-checkbox mb-2">
                                    <input type="checkbox" class="custom-control-input" id="{{'addon[' . $item->id . ']'}}">
                                    <label class="custom-control-label" for="Veggie">{{ $item->name }}</label>
                                </div>
                            </div>
                            @endforeach
                            
                            {{-- <div class="col-lg-4">
                                <div class="custom-control custom-checkbox mb-2">
                                    <input type="checkbox" class="custom-control-input" id="Margherita">
                                    <label class="custom-control-label" for="Margherita">Margherita Pizza</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-2">
                                    <input type="checkbox" class="custom-control-input" id="BBQ">
                                    <label class="custom-control-label" for="BBQ">BBQ Chicken Pizza</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-2">
                                    <input type="checkbox" class="custom-control-input" id="Hawaiian">
                                    <label class="custom-control-label" for="Hawaiian">Hawaiian Pizza</label>
                                </div>
                            </div> --}}
                        </div>
                        <div class="input-group quantity-add">
                            <span class="input-group-btn">
                                <button id="minusBtn" type="button" class="btn btn-default btn-number"  data-type="minus" data-field="quant[1]">
                                    <i class="icon-minus_round_icon"></i>
                                </button>
                            </span>
                            $<input id="product_price" type="text" name="quant[1]" class="input-number" value="{{$product->price}}" min="8" max="3000">
                            <span class="input-group-btn">
                                <button id="plusBtn" type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                                    <i class="icon-plus_round_icon"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="title">Invoice</h4>
                        <div class="small-table">
                            <div class="table-responsive">
                                <table id="columnSearchDatatable" class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                                    <tbody>

                                        <tr>
                                            <td>
                                                <div class="info">
                                                    <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(6).png') }}" alt="">
                                                    <span>
                                                        <h4>Pizza Margherita</h4>
                                                        <p>Lorem ipsum dolor sit</p>
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="invoice">
                                                    <p>MX87498</p>
                                                    <h6>View Invoice</h6>
                                                </div>
                                            </td>
                                            <td><span class="badge badge-primary">Paid</span></td>
                                            <td>
                                                <div class="price">
                                                    <h2>$35.24</h2>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="info">
                                                    <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(6).png') }}" alt="">
                                                    <span>
                                                        <h4>Pizza Margherita</h4>
                                                        <p>Lorem ipsum dolor sit</p>
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="invoice">
                                                    <p>MX87498</p>
                                                    <h6>View Invoice</h6>
                                                </div>
                                            </td>
                                            <td><span class="badge badge-primary">Paid</span></td>
                                            <td>
                                                <div class="price">
                                                    <h2>$35.24</h2>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="info">
                                                    <img src="{{ asset('public/assets/admin/img/NoPath---Copy-().png') }}" alt="">
                                                    <span>
                                                        <h4>Pizza Margherita</h4>
                                                        <p>Lorem ipsum dolor sit</p>
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="invoice">
                                                    <p>MX87498</p>
                                                    <h6>View Invoice</h6>
                                                </div>
                                            </td>
                                            <td><span class="badge badge-danger">Unpaid</span></td>
                                            <td>
                                                <div class="price">
                                                    <h2>$35.24</h2>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="info">
                                                    <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
                                                    <span>
                                                        <h4>Pizza Margherita</h4>
                                                        <p>Lorem ipsum dolor sit</p>
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="invoice">
                                                    <p>MX87498</p>
                                                    <h6>View Invoice</h6>
                                                </div>
                                            </td>
                                            <td><span class="badge badge-danger">Unpaid</span></td>
                                            <td>
                                                <div class="price">
                                                    <h2>$35.24</h2>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card chart-card">
                    <div class="card-body">
                        <h4 class="title">Recurring Orders</h4>
                        <select class="custom-select" name="">
                            <option value="overall" selected="">
                                weekly
                            </option>
                            <option value="today">
                                Today'
                            </option>
                            <option value="today">
                                Today'
                            </option>
                        </select>
                        <div class="small-table">
                            <div class="table-responsive">
                                <table id="columnSearchDatatable" class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">


                                    <tbody>

                                        <tr>
                                            <td>
                                                <div class="info">
                                                    <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(6).png') }}" alt="">
                                                    <span>
                                                        <h4>Pizza Margherita</h4>
                                                        <p>Lorem ipsum dolor sit</p>
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="invoice">
                                                    <p>MX87498</p>
                                                    <h6>View Invoice</h6>
                                                </div>
                                            </td>
                                            <td><span class="badge badge-primary">Paid</span></td>
                                            <td>
                                                <div class="price">
                                                    <h2>$35.24</h2>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="info">
                                                    <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
                                                    <span>
                                                        <h4>Pizza Margherita</h4>
                                                        <p>Lorem ipsum dolor sit</p>
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="invoice">
                                                    <p>MX87498</p>
                                                    <h6>View Invoice</h6>
                                                </div>
                                            </td>
                                            <td><span class="badge badge-danger">Unpaid</span></td>
                                            <td>
                                                <div class="price">
                                                    <h2>$35.24</h2>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="info">
                                                    <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(6).png') }}" alt="">
                                                    <span>
                                                        <h4>Pizza Margherita</h4>
                                                        <p>Lorem ipsum dolor sit</p>
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="invoice">
                                                    <p>MX87498</p>
                                                    <h6>View Invoice</h6>
                                                </div>
                                            </td>
                                            <td><span class="badge badge-danger">Unpaid</span></td>
                                            <td>
                                                <div class="price">
                                                    <h2>$35.24</h2>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card chart-card mb-4">
                    <div class="card-body">
                        <h4 class="title">Total Orders</h4>
                        <select class="custom-select" name="">
                            <option value="overall" selected="">
                                Today
                            </option>
                            <option value="today">
                                Today's Statistics
                            </option>
                            <option value="today">
                                Today's Statistics
                            </option>
                        </select>
                        <div id="circlechart"></div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="title">Areachart</h4>

                        <div id="areachart"></div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body seller-card">
                        <h4 class="title">Review</h4>
                        <ul class="list-group list-group-flush review-list">
                            <li class="list-group-item">
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
                            </li>
                            <li class="list-group-item">
                                <div class="detail">
                                    <div class="info">
                                        <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
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
                            </li>
                            <li class="list-group-item">
                                <div class="detail">
                                    <div class="info">
                                        <img src="{{ asset('public/assets/admin/img/NoPath---Copy-().png') }}" alt="">
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
                            </li>
                            <li class="list-group-item">
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
                            </li>


                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- Modal -->
    <div class="modal fade" id="sharedModalCenter" tabindex="-1" role="dialog" aria-labelledby="sharedModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body pt-4">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <h1 class="text-center mb-4">Share this link via</h1>
                    <div class="social-modal">
                        <a href="#" class="facebook"><i class="icon-facebook-logo_icon"></i></a>
                        <a href="#" class="twitter"><i class="icon-twitter_bird_icon"></i></a>
                        <a href="#" class="instagram"><i class="icon-instagram_icon"></i></a>
                        <a href="#" class="whatsapp"><i class="icon-whatsapp_icon"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endsection
</body>
@push('custom_js')
<script >

$(document).ready(function() {
  console.log('Price Functions working 1');

  currentPrice = $('#product_price').val();
  console.log(currentPrice);
  
  plusBtn = $('#plusBtn');
  minusBtn = $('#minusBtn');

  plusBtn.on('click', function() {
    currentValue = parseInt(currentPrice);
    currentValue++;
    // currentPrice.value(currentValue.toFixed(2));
    $('#product_price').val(currentValue);
  });

  minusBtn.on('click', function() {
    currentValue = parseInt(currentPrice);
    currentValue--;
    $('#product_price').val(currentValue);
  });
});
</script>
@endpush