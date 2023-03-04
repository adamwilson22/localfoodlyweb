@extends('layouts.vendor.app')

@section('title', __('Massage'))

@push('css_or_js')
@endpush

<body class="">
    @section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm">
                    <h1 class="page-header-title">Massage</h1>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="card msgcard">
            <div class="card-body">
                <div class="row chat-row">
                    <div class="col-lg-4 pr-lg-0">
                        <div class="left-side">
                            <div class="chat-list">
                                <ul class="chats">
                                    <li class="active">
                                        <span class="imgchat">
                                            <img class="img-fluid" src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
                                            <span class="online-status"></span>
                                        </span>
                                        <span class="chatname">
                                            <h6>Melissa</h6>
                                            <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                            <span class="status">48 mins</span>
                                        </span>
                                        <span class="unread">1</span>
                                    </li>
                                    <li>
                                        <span class="imgchat">
                                            <img class="img-fluid" src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
                                            <span class="online-status"></span>
                                        </span>
                                        <span class="chatname">
                                            <h6>Helena</h6>
                                            <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                            <span class="status">48 mins</span>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="imgchat">
                                            <img class="img-fluid" src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
                                            <span class="online-status"></span>
                                        </span>
                                        <span class="chatname">
                                            <h6>Andread</h6>
                                            <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                            <span class="status">48 mins</span>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="imgchat">
                                            <img class="img-fluid" src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
                                            <span class="online-status"></span>
                                        </span>
                                        <span class="chatname">
                                            <h6>Cavin</h6>
                                            <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                            <span class="status">48 mins</span>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="imgchat">
                                            <img class="img-fluid" src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
                                            <span class="online-status"></span>
                                        </span>
                                        <span class="chatname">
                                            <h6>Gwain</h6>
                                            <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                            <span class="status">48 mins</span>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="imgchat">
                                            <img class="img-fluid" src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
                                            <span class="online-status"></span>
                                        </span>
                                        <span class="chatname">
                                            <h6>Robin</h6>
                                            <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                            <span class="status">48 mins</span>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="imgchat">
                                            <img class="img-fluid" src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
                                            <span class="online-status"></span>
                                        </span>
                                        <span class="chatname">
                                            <h6>Gwain</h6>
                                            <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                            <span class="status">48 mins</span>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="imgchat">
                                            <img class="img-fluid" src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
                                            <span class="online-status"></span>
                                        </span>
                                        <span class="chatname">
                                            <h6>Robin</h6>
                                            <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                            <span class="status">48 mins</span>
                                        </span>
                                    </li>

                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 pl-lg-0">
                        <div class="right-side">
                            <div class="chat-header">
                                <div class="profile-info">
                                    <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
                                    <h4>Elina Jayson</h4>
                                </div>
                                <div class="menu">
                                    <div class="dropdown show">
                                        <a class="menu-link" href="#" role="button" id="MenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="icon-setting"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="MenuLink">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="massages">
                                <div class="receive-msg">
                                    <div class="profile-info">
                                        <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
                                    </div>
                                    <div>
                                        <div class="msg">
                                            <p>Hey Mellisa, whst's up?</p>
                                        </div>
                                        <div class="time">
                                            <p>10:45 AM</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat-time">
                                    <p>Jan 31, 8:07 PM</p>
                                </div>
                                <div class="send-msg">
                                    <div class="profile-info">
                                        <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
                                    </div>
                                    <div>
                                        <div class="msg">
                                            <p>Hi Billy, where are you?</p>
                                        </div>
                                        <div class="time">
                                            <p>10:45 AM</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="receive-msg">
                                    <div class="profile-info">
                                        <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
                                    </div>
                                    <div>
                                        <div class="msg">
                                            <p>Hey Mellisa, whst's up?</p>
                                        </div>
                                        <div class="time">
                                            <p>10:45 AM</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat-time">
                                    <p>Jan 31, 8:07 PM</p>
                                </div>
                                <div class="send-msg">
                                    <div class="profile-info">
                                        <img src="{{ asset('public/assets/admin/img/NoPath---Copy-(65).png') }}" alt="">
                                    </div>
                                    <div>
                                        <div class="msg">
                                            <p>Hi Billy, where are you?</p>
                                        </div>
                                        <div class="time">
                                            <p>10:45 AM</p>
                                        </div>
                                    </div>
                                </div>




                            </div>
                            <div class="chat-footer">
                                <div class="typemsg">
                                    <div class="input-group">
                                        <div class="input-group-prepend">

                                            <i class="icon-happy_alt_icon"></i>
                                        </div>
                                        <input type="text" class="form-control" aria-label="" placeholder="Start Message....">
                                        <div class="input-group-prepend">
                                            <i class="icon-send1"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
    <!-- Modal -->
    <div class="modal fade" id="customerModalCenter" tabindex="-1" role="dialog" aria-labelledby="customerModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">

                    <div class="row">
                        <div class="col-lg-8">
                            <h1 class="mb-0">Alissia Charles</h1>
                            <p class="mb-5">Custoumer</p>
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
                            <p class="text-grey">Order #533</p>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-4">
                            <p class=" mb-0">Customer Type</p>
                            <p class="text-dark fw-500 mb-0">Repeat</p>
                        </div>
                        <div class="col-lg-4">
                            <p class=" mb-0">Order Date</p>
                            <p class="text-dark fw-500 mb-0">09/16/2022</p>
                        </div>
                        <div class="col-lg-4">
                            <p class=" mb-0">Status</p>
                            <p class="text-dark fw-500 mb-0">In Progress</p>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="columnSearchDatatable" class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                            <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>Time</th>
                                    <th>Qty</th>
                                </tr>
                            </thead>
                            <tbody>

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