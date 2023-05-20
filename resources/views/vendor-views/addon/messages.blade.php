@extends('layouts.vendor.app')

@section('title', __('Messages'))

@push('css_or_js')
@endpush

<body class="">
    @section('content')
    <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm">
                        <h1 class="page-header-title">Messages</h1>
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
                                        @forelse ($conversation_lists as $conversation_list)
                                            <li class="active toggle-btn" data-user-id="{{ $conversation_list->user1_id }}"
                                                data-seller-id="{{ $conversation_list->user2_id }}">
                                                <span class="imgchat">
                                                    <img class="img-fluid"
                                                        src="{{ asset('images/vendor/' . $conversation_list->user->image) }}"
                                                        alt="">
                                                    <span class="online-status"></span>
                                                </span>
                                                <span class="chatname">
                                                    <h6>{{ $conversation_list->user->f_name . ' ' . $conversation_list->user->l_name }}
                                                    </h6>
                                                    <p>{{ $conversation_list->user->email }}</p>
                                                    <span
                                                        class="status">{{ $conversation_list->updated_at->diffForHumans() }}</span>
                                                </span>
                                                {{-- <span class="unread">1</span> --}}
                                            </li>
                                        @empty
                                            <li class="active">
                                                <span class="imgchat">
                                                    {{ __('NOT FOUND') }}
                                                </span>
                                                {{-- <span class="unread">1</span> --}}
                                            </li>
                                        @endforelse

                                    </ul>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 pl-lg-0">
                            <div class="right-side" id="chatDetails">

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


@section('script')
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>
        var sent_user_id = '';
        $(document).ready(function() {
            $(".toggle-btn").click(function() {
                var UserId = $(this).attr("data-user-id");
                var SellerId = $(this).attr("data-seller-id");

                $.ajax({
                    type: 'GET',
                    url: "{{ route('vendor.addon.fetch.messages') }}",
                    data: {
                        UserId: UserId,
                        SellerId: SellerId,
                    },
                    success: (data) => {
                        console.log(data);
                        var appendChat = '';
                        if (data.status == true) {
                            sent_user_id = data.User.id;
                            appendChat += `
                                <div class="chat-header">
                                    <div class="profile-info">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava5-bg.webp"
                                            alt="">
                                        <h4>${data.User.f_name}  ${data.User.l_name}</h4>
                                    </div>
                                    <div class="menu">
                                        <div class="dropdown show">
                                            <a class="menu-link" href="#" role="button" id="MenuLink"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                <div class="Messagess" id="fetch-last-text">
                            `;
                            $.each(data.chatlists, function(index, ChatData) {
                                // console.log(ChatData);
                                // console.log(ChatData.type == 'seller');
                                if (ChatData.type == 'customer') {
                                    appendChat += `
                                        <div class="receive-msg">
                                            <div class="profile-info">
                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava5-bg.webp"
                                                    alt="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava5-bg.webp">
                                            </div>
                                            <div>
                                                <div class="msg">
                                                    <p>${ChatData.reply}</p>
                                                </div>
                                                <div class="time">

                                                </div>
                                            </div>
                                        </div>
                                    `;
                                }
                                if (ChatData.type == 'seller') {
                                    appendChat += `
                                        <div class="send-msg">
                                            <div class="profile-info">
                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava5-bg.webp"
                                                    alt="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava5-bg.webp">
                                            </div>
                                            <div>
                                                <div class="msg">
                                                    <p>${ChatData.reply}</p>
                                                </div>
                                                <div class="time">

                                                </div>
                                            </div>
                                        </div>
                                    `;
                                }
                            });
                            appendChat += `
                                </div>
                                <div class="chat-footer">
                                    <div class="typemsg">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <i class="icon-happy_alt_icon"></i>
                                            </div>
                                            <input type="text" id="sending-text" class="form-control" aria-label=""
                                                placeholder="Start Message....">
                                            <div class="input-group-prepend" onclick="send_message(${data.User.id})">
                                                <i class="icon-send1"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;
                            $('#chatDetails').html(appendChat);
                        }
                    }
                });
                // alert(SellerId + ' ' + UserId);
            });
        });

        Pusher.logToConsole = true;
        var pusher = new Pusher("{{ env('PUSHER_APP_KEY') }}", {
            cluster: "ap2",
        });
        var channel = pusher.subscribe("local.chat");

        channel.bind("seller-Chat", function(data) {
            console.log(data.conservationData);
            console.log(sent_user_id);
            console.log(data.conservationData.recieved_user);
            console.log(data.conservationData.recieved_user == sent_user_id);
            console.log(data.conservationData.type == 'customer');
            var appendChat = '';
            if (data.conservationData.recieved_user == sent_user_id) {
                if (data.conservationData.type == 'customer') {
                    appendChat += `
                    <div class="receive-msg">
                        <div class="profile-info">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava5-bg.webp"
                                alt="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava5-bg.webp">
                        </div>
                        <div>
                            <div class="msg">
                                <p>${data.conservationData.message}</p>
                            </div>
                            <div class="time">

                            </div>
                        </div>
                    </div>
                        <br>
                    `;
                }
                $('#fetch-last-text').append(appendChat);
            }
        });

        function send_message(id) {
            var submit_message = $('#sending-text').val();
            var type = "seller";
            $.ajax({
                type: 'POST',
                url: "{{ route('vendor.addon.send.message') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    submit_message: submit_message,
                    type: type,
                    receiver_id: id
                },
                success: (data) => {
                    $('#sending-text').val('');
                    toastr.success(data.message);
                    console.log(data);
                    var appendChat = '';
                    if (data.status == true) {
                        appendChat += `
                                <div class="chat-header">
                                    <div class="profile-info">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava5-bg.webp"
                                            alt="">
                                        <h4>${data.User.f_name}  ${data.User.l_name}</h4>
                                    </div>
                                    <div class="menu">
                                        <div class="dropdown show">
                                            <a class="menu-link" href="#" role="button" id="MenuLink"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                <div class="Messagess">
                            `;
                        $.each(data.chatlists, function(index, ChatData) {
                            console.log(ChatData);
                            console.log(ChatData.type == 'seller');
                            if (ChatData.type == 'customer') {
                                appendChat += `
                                        <div class="receive-msg">
                                            <div class="profile-info">
                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava5-bg.webp"
                                                    alt="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava5-bg.webp">
                                            </div>
                                            <div>
                                                <div class="msg">
                                                    <p>${ChatData.reply}</p>
                                                </div>
                                                <div class="time">

                                                </div>
                                            </div>
                                        </div>
                                    `;
                            }
                            if (ChatData.type == 'seller') {
                                appendChat += `
                                        <div class="send-msg">
                                            <div class="profile-info">
                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava5-bg.webp"
                                                    alt="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava5-bg.webp">
                                            </div>
                                            <div>
                                                <div class="msg">
                                                    <p>${ChatData.reply}</p>
                                                </div>
                                                <div class="time">

                                                </div>
                                            </div>
                                        </div>
                                    `;
                            }
                        });
                        appendChat += `
                                </div>
                                <div class="chat-footer">
                                    <div class="typemsg">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <i class="icon-happy_alt_icon"></i>
                                            </div>
                                            <input type="text" id="sending-text" class="form-control" aria-label=""
                                                placeholder="Start Message....">
                                            <div class="input-group-prepend" onclick="send_message(${data.User.id})">
                                                <i class="icon-send1"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;
                        $('#chatDetails').html(appendChat);
                    }

                },
                error: function(data) {
                    console.log('Error:', data);
                    $('#btnsave').html('Save Changes');
                }
            });
        }
    </script>
@endsection