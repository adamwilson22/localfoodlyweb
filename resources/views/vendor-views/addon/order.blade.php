@extends('layouts.vendor.app')

@section('title', __('Order'))

@push('css_or_js')
@endpush

<body class="">
    @section('content')
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm">
                        <h1 class="page-header-title">Order</h1>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->
            <div class="row">
                <div class="col-lg-7">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h4 class="title">Pending Orders</h4>
                            <div class="small-table">
                                <div class="table-responsive">
                                    <table id="columnSearchDatatable"
                                        class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                                        <tbody>

                                            @foreach ($pendingorders as $order)
                                                <tr>
                                                    <td>
                                                        <div class="info">
                                                            <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(6).png') }}"
                                                                alt="">
                                                            <span>
                                                                <h4>{{ $order->ful_name ?? '' }} </h4>
                                                                <p>{{ $order->delivery_address }}</p>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="invoice">
                                                            <p>Order #</p>
                                                            <h6>{{ $order->id }}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="invoice">
                                                            <p>Amount</p>
                                                            <h6>{{ $order->order_amount }}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="invoice">
                                                            <p>Time</p>
                                                            <h6>{{ humanTiming(strtotime($order->created_at)) }}Ago </h6>
                                                        </div>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div style=" display:flex; justify-content: flex-end;">
                                <a style="max-width:200px; display:flex; justify-content: center;" class="btn"
                                    href="{{ route('vendor.order.list', ['status' => 'pending']) }}">All Pending Orders</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="col-4">
                            <div class="card record-card">
                                <div class="card-body">
                                    <div class="icon icon-blue">
                                        <i class="icon-orders"></i>
                                    </div>
                                    <p>Delivery</p>
                                    <h1>{{ $delivery }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card record-card">
                                <div class="card-body">
                                    <div class="icon icon-green">
                                        <i class="icon-orders"></i>
                                    </div>
                                    <p>Pickup</p>
                                    <h1>{{ $pickup }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card record-card">
                                <div class="card-body">
                                    <div class="icon icon-yellow">
                                        <i class="icon-orders"></i>
                                    </div>
                                    <p>Curbside</p>
                                    <h1>{{ $curbside }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="title">Recurring Orders</h4>
                            <div class="small-table">
                                <div class="table-responsive">
                                    <table id="columnSearchDatatable"
                                        class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                                        <tbody>
                                            @foreach ($recurringOrders as $order)
                                                <tr>
                                                    <td>
                                                        <div class="info">
                                                            <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(6).png') }}"
                                                                alt="">
                                                            <span>
                                                                <h4>{{ $order->ful_name }}</h4>
                                                                <p>{{ $order->delivery_address }}</p>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="invoice">
                                                            <p>MX87498</p>
                                                            <h6>View Invoice</h6>
                                                        </div>
                                                    </td>
                                                    <td><span
                                                            class="{{ $order->payment_status == 'Paid' ? 'badge badge-primary' : 'badge badge-danger' }}">{{ $order->payment_status }}</span>
                                                    </td>
                                                    <td>
                                                        <div class="price">
                                                            <h2>${{ $order->order_amount }}</h2>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card mb-4">
                        <div class="card-body seller-card">
                            <h4 class="title">Orders Confirmation</h4>
                            <ul class="list-group list-group-flush selling-list">

                                @foreach ($orders as $order)
                                    <li class="list-group-item">
                                        <div class="info">
                                            <img src="{{ asset('public/assets/admin/img/top-selling/top1.png') }}"
                                                alt="">
                                            <span>
                                                <h4>{{ $order->customer->f_name ?? '' }}
                                                    {{ $order->customer->l_name ?? '' }}</h4>
                                                <p>{{ $order->delivery_address }} </p>
                                            </span>
                                        </div>
                                        <div class="action-btn">
                                            <a href="#" class="edit" data-toggle="modal"
                                                data-id="{{ $order->id }}" data-target="#customerModalCenter"><i
                                                    class="icon-edit_icon"></i></a>
                                            <a href="#" class="delete"><i class="icon-trash"></i></a>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>

                        </div>
                        <div style=" display:flex; justify-content: flex-end;">

                            <a style="max-width:200px; display:flex; justify-content: center; margin:50px 30px"
                                class="btn" href="{{ route('vendor.order.list', ['status' => 'confirmed']) }}">Confirmed
                                Orders</a>
                        </div>
                    </div>
                    <!-- <div class="card">
                                                                                            <div class="card-body seller-card">
                                                                                                <h4 class="title">Orders Confirmation</h4>
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
                                                                                        </div> -->
                </div>
            </div>



        </div>
        <!-- Modal -->
        <div class="modal fade" id="customerModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="customerModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-lg-8">
                                <h1 class="mb-0 customer-name"></h1>
                                <p class="mb-5">Customer</p>
                            </div>
                            <div class="col-lg-4 text-right">
                                <div class="mb-2">
                                    <a href="#" class="text-dark mr-3">
                                        <i class="icon-download_data_icon"></i>
                                    </a>
                                    <a href="#" class="text-dark">
                                        <i class="icon-computers_hardware_print_printer_icon"></i>
                                    </a>
                                </div>
                                <p class="text-grey order-id"></p>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-4">
                                <p class=" mb-0">Customer Type</p>
                                <p class="text-dark fw-500 mb-0 customer-type"></p>
                            </div>
                            <div class="col-lg-4">
                                <p class=" mb-0">Order Date</p>
                                <p class="text-dark fw-500 mb-0 order-date"></p>
                            </div>
                            <div class="col-lg-4">
                                <p class=" mb-0">Status</p>
                                <p class="text-dark fw-500 mb-0 order-status"></p>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="columnSearchDatatable"
                                class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                                <thead>
                                    <tr>
                                        <th>Description</th>
                                        <!-- <th>Time</th> -->
                                        <th>Qty</th>
                                    </tr>
                                </thead>
                                <tbody id="modal-table">

                                    <!-- <tr>
                                                                                                            <td>
                                                                                                                <div class="info">
                                                                                                                    <img src="{{ asset('public/assets/admin/img/pexels-ana-madeleine-uribe-27629423.png') }}" alt="">
                                                                                                                    <span>
                                                                                                                        <h4>Pizza Margherita</h4>
                                                                                                                        <p>Lorem ipsum dolor sit</p>
                                                                                                                    </span>
                                                                                                                </div>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <div class="">
                                                                                                                    <p class="mb-0 text-dark">12 min Ago</p>
                                                                                                                </div>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <div class="">
                                                                                                                    <p class="mb-0 text-dark">(02)</p>
                                                                                                                </div>
                                                                                                            </td>
                                                                                                           
                                                                                                        </tr>
                                                                                                       
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                <div class="info">
                                                                                                                    <img src="{{ asset('public/assets/admin/img/pexels-ana-madeleine-uribe-27629423.png') }}" alt="">
                                                                                                                    <span>
                                                                                                                        <h4>Pizza Margherita</h4>
                                                                                                                        <p>Lorem ipsum dolor sit</p>
                                                                                                                    </span>
                                                                                                                </div>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <div class="">
                                                                                                                    <p class="mb-0 text-dark">12 min Ago</p>
                                                                                                                </div>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <div class="">
                                                                                                                    <p class="mb-0 text-dark">(02)</p>
                                                                                                                </div>
                                                                                                            </td>
                                                                                                           
                                                                                                        </tr>
                                                                                                       
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                <div class="info">
                                                                                                                    <img src="{{ asset('public/assets/admin/img/pexels-ana-madeleine-uribe-27629423.png') }}" alt="">
                                                                                                                    <span>
                                                                                                                        <h4>Pizza Margherita</h4>
                                                                                                                        <p>Lorem ipsum dolor sit</p>
                                                                                                                    </span>
                                                                                                                </div>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <div class="">
                                                                                                                    <p class="mb-0 text-dark">12 min Ago</p>
                                                                                                                </div>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <div class="">
                                                                                                                    <p class="mb-0 text-dark">(02)</p>
                                                                                                                </div>
                                                                                                            </td>
                                                                                                           
                                                                                                        </tr> -->

                                </tbody>
                            </table>
                        </div>

                        <button type="button" class="btn btn-primary btn-lg">Back</button>
                    </div>

                </div>
            </div>
        </div>
    @endsection

</body>
@push('custom_js')
    <script>
        $(document).ready(function() {
            $('.edit').click(function(e) {
                // e.preventDefault();  
                var orderId = $(this).data('id');
                $.ajax({
                    url: "/vendor-panel/order/detailsAjax/" + orderId,
                    type: "GET",
                    dataType: "json",
                    success: function(order) {
                        // update modal with product details

                        $('.customer-name').text(order.customer.f_name + ' ' + order.customer
                            .l_name);
                        $('.order-id').text('Order #' + order.id);
                        $('.customer-type').text(order.customer.orders_count > 1 ? "Repeat" :
                            "New");
                        $('.order-date').text(order.created_at);
                        $('.order-status').text(order.order_status);

                        let tableBody = $('#modal-table');
                        tableBody.empty();
                        order.details.forEach(function(record) {
                            let row = `
                        <tr>
                            <td>
                            <div class="info">
                                <img src="{{ asset('public/assets/admin/img/pexels-ana-madeleine-uribe-27629423.png') }}" alt="">
                                <span>
                                    <h4>${record.food.name}</h4>
                                    <p>${record.food.description}</p>
                                </span>
                            </div>
                            </td>

                            <td>
                                <div class="">
                                    <p class="mb-0 text-dark">(${record.quantity})</p>
                                </div>
                            </td>
                        </tr>
                    `;
                            tableBody.append(row);
                        })

                        // $('#productModal .modal-body').html(product.description);
                        // show the modal
                        // $('#productModal').modal('show');
                    }
                });
            });
        });
    </script>
@endpush
