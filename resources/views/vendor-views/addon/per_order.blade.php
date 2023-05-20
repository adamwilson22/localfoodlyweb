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
                        <h1 class="page-header-title">Pre Orders Dishes</h1>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="small-table">
                                <div class="table-responsive">
                                    <table id="columnSearchDatatable"
                                        class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                                        <thead>
                                            <tr>
                                                <th>Dish Name</th>
                                                <th>Pre Order DataTime</th>
                                                <th>Fulfillment DataTime</th>
                                                <th>Fulfillment Type</th>
                                                <th>Total Order#</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($foodPreOrders as $order)
                                                <tr>
                                                    <td>
                                                        <div class="info">
                                                            {{-- <img src="{{ asset('assets/admin/img/NoPath---Copy-(6).png') }}"
                                                                alt=""> --}}
                                                            <span>
                                                                <h4>{{ $order['name'] ?? '' }}
                                                                </h4>
                                                                <p>{{ $order['description'] }}</p>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="invoice">
                                                            {{-- <p>Pre Order DataTime</p> --}}
                                                            <h6>{{ $order['pre_order_end_date'] . ' ' . $order['pre_order_end_time'] }}
                                                            </h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="invoice">
                                                            {{-- <p>Fulfillment DataTime</p> --}}
                                                            <h6>{{ $order['fulfillment_date'] . ' ' . $order['fulfillment_time'] }}
                                                            </h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="invoice">
                                                            {{-- <p>Fulfillment Type</p> --}}
                                                            <h6>{{ $order['fulfillment_type'] }}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="invoice">
                                                            {{-- <p>Total Order#</p> --}}
                                                            <h6>{{ $order['totalOrderCount'] }}</h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="invoice">
                                                            {{-- <p>Total Order#</p> --}}
                                                            <a style="max-width:200px; display:flex; justify-content: center;"
                                                                class="btn"
                                                                href="{{ route('vendor.order.PreOrderDetail', ['id' => $order['id']]) }}">View
                                                                Order</a>
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
                                <img src="{{ asset('assets/admin/img/pexels-ana-madeleine-uribe-27629423.png') }}" alt="">
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
