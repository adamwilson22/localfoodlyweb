@extends('user-views.layouts.app')

@section('content')
    <section class="section-padding">
        <div class="container">
             @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @include('user-views.layouts.flash-message')
            <div class="row">
                <div class="col-lg-6">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total = 0; ?>
                                @if (session('cart'))
                                    @foreach ((array) session('cart') as $id => $details)
                                        <?php $total += $details['price'] * $details['quantity']; ?>
                                        @php
                                            $images = unserialize($details['photo']);
                                        @endphp
                                        <tr>
                                            <td data-th="Product">
                                                @foreach ($images as $image)
                                                    {{-- {{ dd($image) }} --}}
                                                    <img src="{{ !empty(asset('public/images') . '/' . $image) ? asset('public/images') . '/' . $image : asset('customer/assets/images/news_image2-min-1.png') }}"
                                                        class="img-fluid" alt="...">
                                                @break
                                            @endforeach
                                            {{-- <img src="{{ asset('custmer/assets/images/news_image2-min.png') }}"
                                                class="img-fluid" alt="..."> --}}
                                        </td>
                                            <td data-th="Product">{{ $details['name'] }}</td>
                                            <td data-th="Product">${{ $details['price'] }}</td>
                                            <td data-th="Quantity">
                                                <div class="number">
                                                    <span class="minus update-cart" data-id="{{ $id }}">-</span>
                                                    <input type="text" class="quantity" value="{{ $details['quantity'] }}" />
                                                    <span class="plus update-cart" data-id="{{ $id }}">+</span>
                                                </div>
                                            </td>
                                            <td data-th="Subtotal">$<span
                                                    class="product-subtotal">{{ $details['price'] * $details['quantity'] }}</span>
                                            </td>
                                            <td class="action"><button class="delete remove-from-cart"
                                                    data-id="{{ $id }}"><i class="icon-trash-2"><a href=""></a></i></button></td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <table class="table total-table">
                        <tbody>
                        {{--<tr>
                                 <td>Sub Total</td>
                                <td>$50.00</td>
                            </tr> --}}
                            {{-- <tr>
                                <td>Discount <input type="text" placeholder="Coupon Code"></td>
                                <td>$47.00</td> 
                            </tr>--}}
                            {{--<tr>
                                 <td>Loyalty Rewards For This Purchase</td>
                                <td>47 Points</td>
                            </tr> --}}
                            <tr>
                                <!-- <td></td> -->
                                <td class="grand"><span class="cart-total">${{ $total }}</span><br>
                                    <span>Total Amount</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-6">


                    {{-- @if (empty(Auth::guard('customer')->address) && empty(Auth::guard('customer')->phone)) --}}

                        <form class="cart-form" action="{{ route('order.food') }}" method="POST">
                            @method('POST')
                            @csrf
                            @foreach ((array) session('cart') as $id => $details)
                                    <input type="hidden" name="food_id[]" value="{{ $id }}">
                                    <input type="hidden" name="quantity[]" value="{{ $details['quantity'] }}">
                                @endforeach

                            <input type="hidden" name="totalPrice" value="{{ $total }}">
                            <!-- <h2 class="heading mb-2">Payment Details</h2> -->
                            <div class="form-row">
                                <div class="col-lg-12">
                              
                                    <!-- <button class="btn-link mb-4" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">Stripe</label>
                                        </div>    
                                    
                                    </button> -->
                                    <h2 class="heading mb-2">Billing Details</h2>
                                    <div class="form-row">
                                        {{-- <div class="col-lg-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="United State (US)">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="First Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Last Name">
                                            </div>
                                        </div> --}}
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder="Phone Number">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="street_address" name="street_address" placeholder="Street Address">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="apartment" name="apartment"
                                                    placeholder="Apartment, Suite, unit etc.">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="city" name="city" placeholder="Town / City">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="zipCode" name="zipCode" placeholder="Postcode / Zip">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="country" name="country" placeholder="Country">
                                            </div>
                                        </div>
                                        {{-- <div class="col-lg-12">
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Email Address">
                                            </div>
                                        </div> --}}

                                       
                                    </div>
                                    <!-- <div class="collapse" id="collapseExample"> -->
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
                                    <!-- </div> -->
                                    
                                    
                                    <!-- <label for='r12'>
                                        <input type="radio" id="optradio" name="optradio">Cash On Delivery
                                    </label>
                                    <label for='r12'>
                                        <input type='radio' id='r12' name='optradio' value='stripe'
                                            required /> Stripe
                                        <a data-toggle="collapse" data-parent="#accordion"
                                            href="#collapseTwo"></a>
                                    </label> -->
                                    
                                </div>
                            </div>
                            
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label fw-400" for="customCheck1"><b>Disclaimer:</b>
                                            Make sure that you agree with our terms and condition.</label>
                                    </div>
                                </div>
                            
                            <button type="submit" class="btn btn-primary">Place Order</button>
                        </form>
                    {{-- @else
                    @endif --}}
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $('#r12').on('click', function() {
            $(this).parent().find('a').trigger('click')
        });
        $(".update-cart").click(function(e) {
            e.preventDefault();
            var ele = $(this);

            var parent_row = ele.parents("tr");

            var quantity = parent_row.find(".quantity").val();

            var product_subtotal = parent_row.find("span.product-subtotal");

            var cart_total = $(".cart-total");

            var loading = parent_row.find(".btn-loading");

            loading.show();

            $.ajax({
                url: '{{ url('customer/update-cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.attr("data-id"),
                    quantity: quantity
                },
                dataType: "json",
                success: function(response) {

                    loading.hide();

                    $("span#status").html('<div class="alert alert-success">' + response.msg +
                        '</div>');

                    $("#header-bar").html(response.data);
                    $(".cart-count").html(response.countlist);
                    product_subtotal.text(response.subTotal);

                    cart_total.text(response.total);
                }
            });
        });

        $(".remove-from-cart").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            var parent_row = ele.parents("tr");

            var cart_total = $(".cart-total");

            if (confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('customer/remove-from-cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.attr("data-id")
                    },
                    dataType: "json",
                    success: function(response) {

                        parent_row.remove();
                        $(".cart-count").html(response.countlist);
                        $("span#status").html('<div class="alert alert-success">' + response.msg +
                            '</div>');

                        $("#header-bar").html(response.data);

                        cart_total.text(response.total);
                    }
                });
            }
        });
    </script>
@endsection
