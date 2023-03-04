@extends('layouts.vendor.app')

@section('title', __('messages.dashboard'))

@push('css_or_js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .grid-card {
            border: 2px solid #00000012;
            border-radius: 10px;
            padding: 10px;
        }

        .label_1 {
            position: absolute;
            font-size: 10px;
            background: #865439;
            color: #ffffff;
            width: 60px;
            padding: 2px;
            font-weight: bold;
            border-radius: 6px;
        }
    </style>
@endpush

@section('content')
    <div class="content container-fluid">
        @if (auth('vendor')->check())
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm mb-2 mb-sm-0">
                        <h1 class="page-header-title">
                            {{ __('messages.dashboard') }}
                        </h1>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="small-banner">
                        <h2>{{ auth('vendor')->user()->f_name . " " . auth('vendor')->user()->l_name }}</h2>
                        <p>{{ auth('vendor')->user()->about }}</p>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            {{-- list --}}
                            <div class="card  mb-4">
                                <div class="card-body seller-card">
                                    <h4 class="title">Top Selling Items</h4>
                                    <ul class="list-group list-group-flush selling-list">
                                        
                                        <li class="list-group-item d-none">
                                            <div class="info">
                                                <img src="{{asset('public/assets/admin/img/top-selling/top1.png')}}" alt="">
                                                <span>
                                                    <h4>Pizza Margherita</h4>
                                                    <p>Lorem ipsum dolor sit</p>
                                                </span>
                                            </div>
                                            <div class="price">
                                                <p class="">$35.24</p>
                                            </div>
                                        </li>
                                        <li class="list-group-item d-none">
                                            <div class="info">
                                                <img src="{{asset('public/assets/admin/img/top-selling/top3.png')}}" alt="">
                                                <span>
                                                    <h4>Egg Sandwich</h4>
                                                    <p>Lorem ipsum dolor sit</p>
                                                </span>
                                            </div>
                                            <div class="price">
                                                <p class="">$35.24</p>
                                            </div>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card  mb-4">
                                <div class="card-body">
                                    <h4 class="title">Total Visitors</h4>
                                    
                                    <div id="barchart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card chart-card mb-4">
                        <div class="card-body">
                            <h4 class="title">Total Orders</h4>
                            <!-- <select class="custom-select" name="" >
                                <option value="overall" selected="">
                                    Today
                                </option>
                                <option value="today">
                                    Today's Statistics
                                </option>
                                <option value="today">
                                    Today's Statistics
                                </option>
                            </select> -->
                            <div id="circlechart"></div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body">
                            <h4 class="title">Areachart</h4>
                           
                            <div id="areachart"></div>
                        </div>
                    </div>
                </div>
            </div>


           

        @endif
    </div>
@endsection

@push('script')
    <script src="{{ asset('public/assets/admin') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('public/assets/admin') }}/vendor/chart.js.extensions/chartjs-extensions.js"></script>
    <script
        src="{{ asset('public/assets/admin') }}/vendor/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js">
    </script>
@endpush


@push('script_2')
    <script>
        // INITIALIZATION OF CHARTJS
        // =======================================================
        Chart.plugins.unregister(ChartDataLabels);

        $('.js-chart').each(function() {
            $.HSCore.components.HSChartJS.init($(this));
        });

        var updatingChart = $.HSCore.components.HSChartJS.init($('#updatingData'));
    </script>

    <script>
        function order_stats_update(type) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post({
                url: '{{ route('vendor.dashboard.order-stats') }}',
                data: {
                    statistics_type: type
                },
                beforeSend: function() {
                    $('#loading').show()
                },
                success: function(data) {
                    insert_param('statistics_type', type);
                    $('#order_stats').html(data.view)
                },
                complete: function() {
                    $('#loading').hide()
                }
            });
        }
    </script>

    <script>
        function insert_param(key, value) {
            key = encodeURIComponent(key);
            value = encodeURIComponent(value);
            // kvp looks like ['key1=value1', 'key2=value2', ...]
            var kvp = document.location.search.substr(1).split('&');
            let i = 0;

            for (; i < kvp.length; i++) {
                if (kvp[i].startsWith(key + '=')) {
                    let pair = kvp[i].split('=');
                    pair[1] = value;
                    kvp[i] = pair.join('=');
                    break;
                }
            }
            if (i >= kvp.length) {
                kvp[kvp.length] = [key, value].join('=');
            }
            // can return this or...
            let params = kvp.join('&');
            // change url page with new params
            window.history.pushState('page2', 'Title', '{{ url()->current() }}?' + params);
        }
    </script>
@endpush
