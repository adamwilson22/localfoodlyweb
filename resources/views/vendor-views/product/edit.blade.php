@extends('layouts.vendor.app')

@section('title', __('Edit Product'))

@push('css_or_js')
<style>
    .selectMultiple {
  width: 400px;
  position: relative;
}
.selectMultiple select {
  display: none;
}
.selectMultiple > div {
  position: relative;
  z-index: 2;
  padding: 8px 12px 2px 12px;
  border-radius: 8px;
  background: #fff;
  font-size: 14px;
  min-height: 44px;
  box-shadow: 0 4px 16px 0 rgba(22, 42, 90, 0.12);
  transition: box-shadow 0.3s ease;
}
.selectMultiple > div:hover {
  box-shadow: 0 4px 24px -1px rgba(22, 42, 90, 0.16);
}
.selectMultiple > div .arrow {
  right: 1px;
  top: 0;
  bottom: 0;
  cursor: pointer;
  width: 28px;
  position: absolute;
}
.selectMultiple > div .arrow:before, .selectMultiple > div .arrow:after {
  content: "";
  position: absolute;
  display: block;
  width: 2px;
  height: 8px;
  border-bottom: 8px solid #99A3BA;
  top: 43%;
  transition: all 0.3s ease;
}
.selectMultiple > div .arrow:before {
  right: 12px;
  transform: rotate(-130deg);
}
.selectMultiple > div .arrow:after {
  left: 9px;
  transform: rotate(130deg);
}
.selectMultiple > div span {
  color: #99A3BA;
  display: block;
  position: absolute;
  left: 12px;
  cursor: pointer;
  top: 8px;
  line-height: 28px;
  transition: all 0.3s ease;
}
.selectMultiple > div span.hide {
  opacity: 0;
  visibility: hidden;
  transform: translate(-4px, 0);
}
.selectMultiple > div a {
  position: relative;
  padding: 0 24px 6px 8px;
  line-height: 28px;
  color: #1E2330;
  display: inline-block;
  vertical-align: top;
  margin: 0 6px 0 0;
}
.selectMultiple > div a em {
  font-style: normal;
  display: block;
  white-space: nowrap;
}
.selectMultiple > div a:before {
  content: "";
  left: 0;
  top: 0;
  bottom: 6px;
  width: 100%;
  position: absolute;
  display: block;
  background: rgba(228, 236, 250, 0.7);
  z-index: -1;
  border-radius: 4px;
}
.selectMultiple > div a i {
  cursor: pointer;
  position: absolute;
  top: 0;
  right: 0;
  width: 24px;
  height: 28px;
  display: block;
}
.selectMultiple > div a i:before, .selectMultiple > div a i:after {
  content: "";
  display: block;
  width: 2px;
  height: 10px;
  position: absolute;
  left: 50%;
  top: 50%;
  background: #006aff;
  border-radius: 1px;
}
.selectMultiple > div a i:before {
  transform: translate(-50%, -50%) rotate(45deg);
}
.selectMultiple > div a i:after {
  transform: translate(-50%, -50%) rotate(-45deg);
}
.selectMultiple > div a.notShown {
  opacity: 0;
  transition: opacity 0.3s ease;
}
.selectMultiple > div a.notShown:before {
  width: 28px;
  transition: width 0.45s cubic-bezier(0.87, -0.41, 0.19, 1.44) 0.2s;
}
.selectMultiple > div a.notShown i {
  opacity: 0;
  transition: all 0.3s ease 0.3s;
}
.selectMultiple > div a.notShown em {
  opacity: 0;
  transform: translate(-6px, 0);
  transition: all 0.4s ease 0.3s;
}
.selectMultiple > div a.notShown.shown {
  opacity: 1;
}
.selectMultiple > div a.notShown.shown:before {
  width: 100%;
}
.selectMultiple > div a.notShown.shown i {
  opacity: 1;
}
.selectMultiple > div a.notShown.shown em {
  opacity: 1;
  transform: translate(0, 0);
}
.selectMultiple > div a.remove:before {
  width: 28px;
  transition: width 0.4s cubic-bezier(0.87, -0.41, 0.19, 1.44) 0s;
}
.selectMultiple > div a.remove i {
  opacity: 0;
  transition: all 0.3s ease 0s;
}
.selectMultiple > div a.remove em {
  opacity: 0;
  transform: translate(-12px, 0);
  transition: all 0.4s ease 0s;
}
.selectMultiple > div a.remove.disappear {
  opacity: 0;
  transition: opacity 0.5s ease 0s;
}
.selectMultiple > ul {
  margin: 0;
  padding: 0;
  list-style: none;
  font-size: 16px;
  z-index: 99;
  position: absolute;
  top: 100%;
  left: 0;
  right: 0;
  visibility: hidden;
  opacity: 0;
  border-radius: 8px;
  transform: translate(0, 20px) scale(0.8);
  transform-origin: 0 0;
  filter: drop-shadow(0 12px 20px rgba(22, 42, 90, 0.08));
  transition: all 0.4s ease, transform 0.4s cubic-bezier(0.87, -0.41, 0.19, 1.44), filter 0.3s ease 0.2s;
}
.selectMultiple > ul li {
  color: #1E2330;
  background: #fff;
  padding: 12px 16px;
  cursor: pointer;
  overflow: hidden;
  position: relative;
  transition: background 0.3s ease, color 0.3s ease, transform 0.3s ease 0.3s, opacity 0.5s ease 0.3s, border-radius 0.3s ease 0.3s;
}
.selectMultiple > ul li:first-child {
  border-radius: 8px 8px 0 0;
}
.selectMultiple > ul li:first-child:last-child {
  border-radius: 8px;
}
.selectMultiple > ul li:last-child {
  border-radius: 0 0 8px 8px;
}
.selectMultiple > ul li:last-child:first-child {
  border-radius: 8px;
}
.selectMultiple > ul li:hover {
  background: #006aff;
  color: #fff;
}
.selectMultiple > ul li:after {
  content: "";
  position: absolute;
  top: 50%;
  left: 50%;
  width: 6px;
  height: 6px;
  background: rgba(0, 0, 0, 0.4);
  opacity: 0;
  border-radius: 100%;
  transform: scale(1, 1) translate(-50%, -50%);
  transform-origin: 50% 50%;
}
.selectMultiple > ul li.beforeRemove {
  border-radius: 0 0 8px 8px;
}
.selectMultiple > ul li.beforeRemove:first-child {
  border-radius: 8px;
}
.selectMultiple > ul li.afterRemove {
  border-radius: 8px 8px 0 0;
}
.selectMultiple > ul li.afterRemove:last-child {
  border-radius: 8px;
}
.selectMultiple > ul li.remove {
  transform: scale(0);
  opacity: 0;
}
.selectMultiple > ul li.remove:after {
  -webkit-animation: ripple 0.4s ease-out;
          animation: ripple 0.4s ease-out;
}
.selectMultiple > ul li.notShown {
  display: none;
  transform: scale(0);
  opacity: 0;
  transition: transform 0.35s ease, opacity 0.4s ease;
}
.selectMultiple > ul li.notShown.show {
  transform: scale(1);
  opacity: 1;
}
.selectMultiple.open > div {
  box-shadow: 0 4px 20px -1px rgba(22, 42, 90, 0.12);
}
.selectMultiple.open > div .arrow:before {
  transform: rotate(-50deg);
}
.selectMultiple.open > div .arrow:after {
  transform: rotate(50deg);
}
.selectMultiple.open > ul {
  transform: translate(0, 12px) scale(1);
  opacity: 1;
  visibility: visible;
  filter: drop-shadow(0 16px 24px rgba(22, 42, 90, 0.16));
}

@-webkit-keyframes ripple {
  0% {
    transform: scale(0, 0);
    opacity: 1;
  }
  25% {
    transform: scale(30, 30);
    opacity: 1;
  }
  100% {
    opacity: 0;
    transform: scale(50, 50);
  }
}

@keyframes ripple {
  0% {
    transform: scale(0, 0);
    opacity: 1;
  }
  25% {
    transform: scale(30, 30);
    opacity: 1;
  }
  100% {
    opacity: 0;
    transform: scale(50, 50);
  }
}
</style>
@endpush

<body class="">
    @section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm">
                    <h1 class="page-header-title">
                        Edit Product
                    </h1>
                </div>
            </div>
        </div>
        <!-- End Page Header -->

        <div class="product-form">

            <div class="row">
                <div class="col-lg-7 order-lg-1 order-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-head">
                                <a href="javascript:history.back()"><i class="icon-arrow-left"></i></a>
                                {{-- <div>
                                    <a href="#"><i class="icon-trash"></i>Delete</a>
                                    <a href="#"><i class="icon-document"></i>Duplicate</a>
                                </div> --}}
                            </div>
                            <form action="{{ route('vendor.addon.product.update', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <!-- Form Group -->
                                <div class=" form-group">
                                    <label class="input-label" for="">Product Name *</label>
                                    <input type="text" class="form-control form-control-lg" name="name" value="{{$product->name}}"
                                    placeholder="Name">
                                </div>
                                <div class=" form-group" hidden>
                                    <label class="input-label" for="">Product Type *</label>
                                    <input type="text" class="form-control form-control-lg" name="product_type"
                                    value="{{$product->product_type}}">
                                    
                                    {{-- <select name="product_type" id="label" class="custom-select custom-select-lg">
                                        <option value="">Please select a product type</option>
                                        <option value="Normal">Normal</option>
                                        <option value="Meal Kits">Meal Kits</option>
                                    </select> --}}
                                </div>
                                <div class=" form-group">
                                    <label class="input-label" for="">Description *</label>
                                    <textarea name="description" id="description" cols="" rows="4" class="form-control form-control-lg">{{$product->description}}</textarea>
                                </div>
                                
                                <div class=" form-group">
                                    <label class="input-label" for="">Category</label>
                                    <select name="category_id" id="category_id" class="custom-select custom-select-lg">
                                        <option value="">Please select category</option>
                                        @foreach ($category as $value)
                                        <option value="{{ $value->id }}" {{$product->category_id == $value->id ? 'selected' :'' }}>{{ $value->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- PreOrders --}}
                                {{-- <h2 class="mb-4">Fulfillment Date</h2>
                                <div class="form-row">
                                    <div class="col-lg-6">
                                        <div class=" form-group">
                                            <label class="input-label" for="">Date</label>
                                            <input type="date" class="form-control form-control-lg" name="fulfillment_date">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class=" form-group">
                                            <label class="input-label" for="">Time</label>
                                            <input type="time" class="form-control form-control-lg" name="fulfillment_time">
                                        </div>
                                    </div>
                                </div>
                                <h2 class="mb-4">Pre-Order End Date</h2>
                                <div class="form-row">
                                    <div class="col-lg-6">
                                        <div class=" form-group">
                                            <label class="input-label" for="">Date</label>
                                            <input type="date" class="form-control form-control-lg" name="fulfillment_time">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class=" form-group">
                                            <label class="input-label" for="">Time</label>
                                            <input type="time" class="form-control form-control-lg" name="fulfillment_time">
                                        </div>
                                    </div>
                                </div>
                                <h2 class="mb-4">Fulfillment Type</h2>
                                <div class=" form-group">
                                    <select name="fulfillment_type" id="" class="custom-select custom-select-lg">
                                        <option value="">Please select a delivery option</option>
                                        <option value="delivery">Delivery</option>
                                        <option value="pickup">Pickup</option>
                                    </select>
                                </div>
                                <div class=" form-group">
                                    <label class="input-label" for="">Pre-Order Quantity Limit</label>
                                    <input type="number" class="form-control form-control-lg" name="pre_order_quantity_limit" placeholder="10 Purchases">
                                </div> --}}
                                {{-- PreOrders --}}
                                
                                <div class=" form-group">
                                    <label class="input-label" for="">Add Ingredients</label>
                                    <div class="search-form">
                                        <div class="input-group input-group-merge input-group-flush">
                                            <div class="input-group-prepend">
                                                <button type="submit" class="">
                                                    <div class="input-group-text">
                                                        <i class="icon-Path-11"></i>
                                                    </div>
                                                </button>
                                            </div>
                                            <input id="ingredients" type="text" name="ingredient"  class="form-control form-control-lg" placeholder="Enter Ingredients" aria-label="Search by ingredients">

                                        </div>
                                    </div>
                                    <div class="tags ingredients">
                                     @foreach ($ingredients as $value)
                                     <div class="alert alert-primary fade show" role="alert">
                                      {{$value}}
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                      <input type="hidden" name="ingredients[]" value="{{$value}}">
                                  </div>
                                     @endforeach   
                                    </div>
                                </div>
                                {{-- <div class=" form-group">
                                    <label class="input-label" for="">Add Ingredients</label>
                                    <div class="search-form">
                                        <!-- Search -->
                                        <div class="input-group input-group-merge input-group-flush">
                                            <div class="input-group-prepend">
                                                <button type="submit" class="">
                                                    <div class="input-group-text">
                                                        <i class="icon-Path-11"></i>
                                                    </div>
                                                </button>
                                            </div>
                                            <input id="" type="search" name="ingredients" class="form-control form-control-lg" placeholder="Search here" aria-label="Search by related things">

                                        </div>
                                        <!-- End Search -->
                                    </div>
                                    <div class="tags">
                                        <div class="alert alert-primary fade show" role="alert">
                                            One Tag
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="alert alert-primary fade show" role="alert">
                                            One Tag
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="alert alert-primary fade show" role="alert">
                                            One Tag
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class=" form-group">
                                    <label class="input-label" for="">Add Allergens</label>
                                    <div class="search-form">
                                        <div class="input-group input-group-merge input-group-flush">
                                            <div class="input-group-prepend">
                                                <button type="submit" class="">
                                                    <div class="input-group-text">
                                                        <i class="icon-Path-11"></i>
                                                    </div>
                                                </button>
                                            </div>
                                            <input id="allergens" type="text" name="allergen"  class="form-control form-control-lg" placeholder="Enter Allergens" aria-label="Search by allergens">

                                        </div>
                                    </div>
                                    <div class="tags allergens">
                                      @foreach ($allergens as $value)
                                      <div class="alert alert-primary fade show" role="alert">
                                       {{$value}}
                                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                           <span aria-hidden="true">&times;</span>
                                       </button>
                                       <input type="hidden" name="allergens[]" value="{{$value}}">
                                   </div>
                                      @endforeach   
                                    </div>
                                </div>
                                {{-- <div class=" form-group">
                                    <label class="input-label" for="">Add Allergens</label>
                                    <div class="search-form">
                                        <!-- Search -->
                                        <div class="input-group input-group-merge input-group-flush">
                                            <div class="input-group-prepend">
                                                <button type="submit" class="">
                                                    <div class="input-group-text">
                                                        <i class="icon-Path-11"></i>
                                                    </div>
                                                </button>
                                            </div>
                                            <input id="" type="search" name="allergens" class="form-control form-control-lg" placeholder="Search here" aria-label="Search by related things">

                                        </div>
                                        <!-- End Search -->
                                    </div>
                                    <div class="tags">
                                        <div class="alert alert-primary fade show" role="alert">
                                            One Tag
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="alert alert-primary fade show" role="alert">
                                            One Tag
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="alert alert-primary fade show" role="alert">
                                            One Tag
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class=" form-group">
                                    <label class="input-label" for="">Unit</label>
                                    <input type="number" class="form-control form-control-lg" name="unit" value="{{$product->unit}}" placeholder="Please enter the quantity or size">
                                </div>
                                <div class=" form-group">
                                    <label class="input-label" for="addons">Add-On</label>
                                    <select name="add_ons[]" class="custom-select custom-select-lg" multiple data-placeholder="Select Add-On">
                                        <!--<option>Italian Sausage</option>-->
                                        <!--<option>Meatballs</option>-->
                                        <!--<option>Nuggets</option>-->
                                        @foreach ($addon as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                      </select>
                                </div>
                                <div class=" form-group">
                                    <a href="{{ route('vendor.addon.add-new') }}" target="_blank">Create More Add-On</a>
                                </div>
                                <div class=" form-group">
                                    <label class="input-label" for="addons">Badge</label>
                                    <select name="Badge[]" class="custom-select custom-select-lg" multiple
                                        data-placeholder="Select Badge">
                                        {{-- <option>Italian Sausage</option>
                                        <option>Meatballs</option>
                                        <option>Nuggets</option> --}}
                                        @foreach ($badges as $badge)
                                            <option value="{{ $badge->id }}">{{ $badge->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class=" form-group">
                                    <a href="{{ route('vendor.badge.add-new') }}">Create More Badge</a>
                                </div>
                                 <div class="form-group">
                                     <div class="variant_combination" id="variant_combination">
                                        @include(
                                            'vendor-views.product.partials._edit-combinations',
                                            [
                                                'combinations' => json_decode(
                                                    $product['variations'],
                                                    true
                                                ),
                                            ]
                                        )
                                    </div>
                                </div>
                                <div class=" form-group">
                                    <label class="input-label" for="">Serves</label>
                                    <select name="serves" id="serves" class="custom-select custom-select-lg">
                                    @for ($i = 1; $i <= 16; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                    </select>
                                </div>

                                
                                {{-- <div class=" form-group">
                                    <label class="input-label" for="">Restaurant</label>
                                    <select name="restaurant_id" id="restaurant_id"
                                        class="custom-select custom-select-lg">
                                        <option value="">Please select Restaurant</option>
                                        <option value="1">Item 1</option>
                                        <option value="2">Item 2</option>
                                        <option value="3">Item 3</option>
                                    </select>
                                </div> --}}

                                {{-- <input type="hidden" name="product_type" value="3" /> --}}

                                
                                <div class=" form-group">
                                    <label class="input-label" for="">Add Labels</label>
                                    <select name="labels" id="label" class="custom-select custom-select-lg">
                                        <option value="">Please select one or multiple labels from dropdown</option>
                                        <option value="1">Item 1</option>
                                        <option value="2">Item 2</option>
                                        <option value="3">Item 3</option>
                                    </select>
                                </div>
                                
                                <div class=" form-group">
                                    <label class="input-label" for="">Add Related Tags</label>
                                    <div class="search-form">
                                        <div class="input-group input-group-merge input-group-flush">
                                            <div class="input-group-prepend">
                                                <button type="submit" class="">
                                                    <div class="input-group-text">
                                                        <i class="icon-Path-11"></i>
                                                    </div>
                                                </button>
                                            </div>
                                            <input id="related_tags" type="text" name="related_tag"  class="form-control form-control-lg" placeholder="Search here" aria-label="Search by related things">

                                        </div>
                                    </div>
                                    
                                    <div class="tags related_tags">
                                      @foreach ($allergens as $value)
                                      <div class="alert alert-primary fade show" role="alert">
                                       {{$value}}
                                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                           <span aria-hidden="true">&times;</span>
                                       </button>
                                       <input type="hidden" name="related_tags[]" value="{{$value}}">
                                       @endforeach   
                                    </div>
                                   </div>
                                </div>


                                <div class=" form-group">
                                    <label class="input-label" for="">Default Prize</label>
                                    <div class="search-form">
                                        <!-- Search -->
                                        <div class="input-group input-group-merge input-group-flush">
                                            <div class="input-group-prepend">
                                                <button type="submit" class="">
                                                    <div class="input-group-text">
                                                        <i class="icon-banking_currency_dollar_icon"></i>
                                                    </div>
                                                </button>
                                            </div>
                                            <input id="price" type="number" name="price" value="{{$product->price}}" class="form-control"
                                                placeholder="67.00">
                                        </div>
                                        <!-- End Search -->
                                    </div>
                                </div>

                                {{-- <div class=" form-group">
                                    <label class="input-label" for="">Discount</label>
                                    <div class="search-form">
                                        <!-- Search -->
                                        <div class="input-group input-group-merge input-group-flush">
                                            <div class="input-group-prepend">
                                                <button type="submit" class="">
                                                    <div class="input-group-text">
                                                        <i class="icon-banking_currency_dollar_icon"></i>
                                                    </div>
                                                </button>
                                            </div>
                                            <input id="discount" type="number" name="discount"
                                                class="form-control" placeholder="4.00">
                                        </div>
                                        <!-- End Search -->
                                    </div>
                                </div>

                                <div class=" form-group">
                                    <label class="input-label" for="">Tax</label>
                                    <div class="search-form">
                                        <!-- Search -->
                                        <div class="input-group input-group-merge input-group-flush">
                                            <div class="input-group-prepend">
                                                <button type="submit" class="">
                                                    <div class="input-group-text">
                                                        <i class="icon-banking_currency_dollar_icon"></i>
                                                    </div>
                                                </button>
                                            </div>
                                            <input id="tax" type="number" name="tax" class="form-control"
                                                placeholder="0.00">
                                        </div>
                                        <!-- End Search -->
                                    </div>
                                </div> --}}

                                {{-- <div class=" form-group">
                                    <label class="input-label" for="">Available Time Starts</label>
                                    <input id="available_time_starts" type="time" name="available_time_starts"
                                        class="form-control" />
                                </div>

                                <div class=" form-group">
                                    <label class="input-label" for="">Available End Starts</label>
                                    <input id="available_time_ends" type="time" name="available_time_ends"
                                        class="form-control" />
                                </div> --}}

                                <div class=" form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input name="instock" type="checkbox" class="custom-control-input"
                                            id="customControlInline">
                                        <label class="custom-control-label" for="customControlInline">Product Is Out
                                            Of Stock</label>
                                    </div>
                                </div>
                                <div class="form-group images-old">
                                  
                                </div>
                                <Button type="submit" class="btn btn-primary btn-lg">Save Now</Button>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="col-lg-5">
                        <div class="uploadimgs">
                            <div class="card">
                                <div class="card-body">
                                    <div class="inputgroup">
                                        <div class="input-group-prepend">
                                            <i class="icon-plus"><i class="path1"></i><i class="path2"></i><i
                                                    class="path3"></i></i>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" name="images[]" id="inputGroupFile01" multiple />
                                            <label class="custom-file-label" for="inputGroupFile01">Upload
                                                Images/Video <p>Select file</p></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-lg-5 order-lg-2 order-1 mb-lg-0 mb-3">
                        <div class="uploadimgs insert-img">
                            <div class="card">
                                <div class="card-body">
                                    
                                    <div class="form-row images-preview-div">
                                      @foreach ($product->image as $image)
                                          
                                      <div class="img">
                                          <img src="{{$image['link']}}" alt="">
                                          <div class="action-btn">
                                              <button type="button"><i data-img="{{$image['name']}}" class="icon-trash old-img"></i></button>
                                          </div>
                                      </div>

                                      @endforeach
    
                                        {{-- <div class="img">
                                            <img src="{{ asset('public/assets/admin/img/Group-173.jpg') }}" alt="">
                                            <div class="action-btn">
                                                <button><i class="icon-Pin"></i></button>
                                                <button><i class="icon-trash"></i></button>
                                            </div>
                                        </div> --}}
    
                                        {{-- <div class="img">
                                            <img src="{{ asset('public/assets/admin/img/Group-174.jpg') }}" alt="">
                                            <div class="action-btn">
                                                <button class="pinned"><i class="icon-Pin"></i></button>
                                            </div>
                                        </div>
                                        
                                        <div class="img">
                                            <img src="{{ asset('public/assets/admin/img/Group-176.jpg') }}" alt="">
                                            
                                        </div>
                                        <div class="img">
                                            <img src="{{ asset('public/assets/admin/img/Group-177.jpg') }}" alt="">
                                            <div class="action-btn">
                                                <button class="pinned"><i class="icon-Pin"></i></button>
                                            </div>
                                        </div> --}}
    
    
                                    </div>
                                    <div class="inputgroup">
                                        <div class="input-group-prepend">
                                            <i class="icon-plus_round_icon"></i>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" name="images[]" class="custom-file-input" id="images" multiple>
                                            <label class="custom-file-label" for="inputGroupFile01">Upload Images/Video <p>Select file</p></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <br>
                            <div class="uploadimgs insert-img">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-row featureImage-preview-div">
                                            
                                        </div>
                                        <div class="inputgroup">
                                            <div class="input-group-prepend">
                                                <i class="icon-plus_round_icon"></i>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" name="featureImage" class="custom-file-input"
                                                    id="featureImage">
                                                <label class="custom-file-label" for="inputGroupFile01">Upload Feature
                                                    Images
                                                    Optional
                                                    <p>Select file</p>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
</body>

@push('custom_js')
<script >
    $(function() {
    // Multiple images preview with JavaScript
    var previewImages = function(input, imgPreviewPlaceholder) {
    if (input.files) {
    var filesAmount = input.files.length;
    for (i = 0; i < filesAmount; i++) {
    var reader = new FileReader();
    reader.onload = function(event) {
    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
    }
    reader.readAsDataURL(input.files[i]);
    }
    }
    };
    // $('#images').on('change', function() {
    // previewImages(this, 'div.images-preview-div');
    // });
    });

    $('#images').on('change',function(){
        render_img(this);
        // $('.images-preview-div').append(render_img(this));
        // (this).value= "";
    })

    $('.old-img').on('click', function(){
      // console.log($('.images-preview-div'));
      console.log($(this).data('img'));
      $(this).parent().prev().parent().remove();
      $('.images-old').append(`
          <input type="text" class="form-control form-control-lg" name="deleted_images[]" value="${$(this).data('img')}" hidden>
            
        `);
    })
    

function render_img(input) {
    if (input.files) {
    var filesAmount = input.files.length;
    for (i = 0; i < filesAmount; i++) {
    var reader = new FileReader();
    reader.onload = function(event) {
        $('.images-preview-div').append(`
            <div class="img">
                <img src="${event.target.result}" alt="">
                <div class="action-btn">
                   <button type="button"><i class="icon-trash"></i></button>
                </div>
            </div>
        `);
    }
    reader.readAsDataURL(input.files[i]);
    }
    }

    // var tag = `
    //         <div class="img images-preview-div">
    //             <img src="${target}" alt="">
    //             <div class="action-btn">
    //                 <button><i class="icon-Pin"></i></button>
    //                 <button><i class="icon-trash"></i></button>
    //             </div>
    //         </div>
    //     `;
    // return tag;
}

    </script>
<script>
$(document).ready(function () {

var select = $('select[multiple]');
var options = select.find('option');

var div = $('<div />').addClass('selectMultiple');
var active = $('<div />');
var list = $('<ul />');
var placeholder = select.data('placeholder');

var span = $('<span />').text(placeholder).appendTo(active);

options.each(function () {
  var text = $(this).text();
  if ($(this).is(':selected')) {
    active.append($('<a />').html('<em>' + text + '</em><i></i>'));
    span.addClass('hide');
  } else {
    list.append($('<li />').html(text));
  }
});

active.append($('<div />').addClass('arrow'));
div.append(active).append(list);

select.wrap(div);

$(document).on('click', '.selectMultiple ul li', function (e) {
  var select = $(this).parent().parent();
  var li = $(this);
  if (!select.hasClass('clicked')) {
    select.addClass('clicked');
    li.prev().addClass('beforeRemove');
    li.next().addClass('afterRemove');
    li.addClass('remove');
    var a = $('<a />').addClass('notShown').html('<em>' + li.text() + '</em><i></i>').hide().appendTo(select.children('div'));
    a.slideDown(400, function () {
      setTimeout(function () {
        a.addClass('shown');
        select.children('div').children('span').addClass('hide');
        select.find('option:contains(' + li.text() + ')').prop('selected', true);
      }, 500);
    });
    setTimeout(function () {
      if (li.prev().is(':last-child')) {
        li.prev().removeClass('beforeRemove');
      }
      if (li.next().is(':first-child')) {
        li.next().removeClass('afterRemove');
      }
      setTimeout(function () {
        li.prev().removeClass('beforeRemove');
        li.next().removeClass('afterRemove');
      }, 200);

      li.slideUp(400, function () {
        li.remove();
        select.removeClass('clicked');
      });
    }, 600);
  }
});

$(document).on('click', '.selectMultiple > div a', function (e) {
  var select = $(this).parent().parent();
  var self = $(this);
  self.removeClass().addClass('remove');
  select.addClass('open');
  setTimeout(function () {
    self.addClass('disappear');
    setTimeout(function () {
      self.animate({
        width: 0,
        height: 0,
        padding: 0,
        margin: 0
      }, 300, function () {
        var li = $('<li />').text(self.children('em').text()).addClass('notShown').appendTo(select.find('ul'));
        li.slideDown(400, function () {
          li.addClass('show');
          setTimeout(function () {
            select.find('option:contains(' + self.children('em').text() + ')').prop('selected', false);
            if (!select.find('option:selected').length) {
              select.children('div').children('span').removeClass('hide');
            }
            li.removeClass();
          }, 400);
        });
        self.remove();
      })
    }, 300);
  }, 400);
});

$(document).on('click', '.selectMultiple > div .arrow, .selectMultiple > div span', function (e) {
  $(this).parent().parent().toggleClass('open');
});

});

    $('#related_tags, #ingredients, #allergens').on('change',function(){
        $('.'+$(this).attr('id')).append(render_tag((this).value, (this).id));
        (this).value= "";
    })

function render_tag(value, id) {
    var tag = `
            <div class="alert alert-primary fade show" role="alert">
                ${value}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <input type="hidden" name="${id}[]" value="${value}">
            </div>
        `;
    return tag;
}
</script>
@endpush
