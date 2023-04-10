@extends('layouts.vendor.app')

@section('title', __('Customers'))

@push('css_or_js')
@endpush

<body class="">
    @section('content')
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm">
                        <h1 class="page-header-title">Customers</h1>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="inline-select">
                        <label for="" class="">Sort by</label>
                        <select id="selectCustomerGroup" class="custom-select custom-select-lg">
                            <option selected> Select Group </option>
                            @foreach ($customerGroups as $groups)
                                <option>{{ $groups->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <a href="#" class="btn btn-secondary btn-lg ml-sm-2 mt-2">Send Coupon</a>
                    <a href="#" class="btn btn-secondary btn-lg sltcateg ml-sm-2 mt-2">Bulk Select</a>
                    <a id="btnMoveToGroup" href="#" class="btn btn-primary btn-lg ml-sm-2 mt-2" data-toggle="modal"
                        data-target="#customerModalCenter">Move To Group</a>
                    <a href="#" class="btn btn-primary btn-lg ml-sm-2 mt-2" data-toggle="modal"
                        data-target="#createCustomerGroupModal">Add Customer Group</a>
                </div>
            </div>

            <div class="customer">
                <input type='hidden' id='current_page' />
                <input type='hidden' id='show_per_page' />
                <div class="row" id="pagingBox">
                    {{-- {{ dd($assignedCustomerGroups) }} --}}
                    @foreach ($assignedCustomerGroups as $customer)
                        {{-- @foreach ($item as $customer) --}}
                        <div class="col-lg-4">
                            <div class="custom-control custom-checkbox customer-checkbox">
                                <input type="checkbox" class="custom-control-input" data-id="{{ $customer->id }}"
                                    id="{{ 'customCheck[' . $customer->id . ']' }}">
                                <label class="custom-control-label" for="{{ 'customCheck[' . $customer->id . ']' }}">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="detail">
                                                <div class="info">
                                                    <div class="proimg">
                                                        <img src="{{ asset('public/assets/admin/img/' . $customer->image)}}"
                                                            alt="">
                                                        <!-- <span class="status"></span> -->
                                                    </div>

                                                    <span>
                                                        {{-- <h4>{{ $customer->f_name . ' ' . $customer->l_name }}</h4> --}}
                                                        <h4>{{ $customer->customer_name }}</h4>
                                                        <p>Customer</p>
                                                    </span>
                                                </div>
                                                <div class="categ">
                                                    <h6>Group</h6>
                                                    <p class="">{{ $customer->customer_group_name }}</p>
                                                </div>
                                            </div>
                                            <div class="contact">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <a href="tel:+10000000000"><i class="icon-phone"></i>
                                                            {{ $customer->phone_number }}</a>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <a href="mailto:user@mail.com"><i class="icon-mail"></i>
                                                            {{ $customer->email }}</a>
                                                    </div>
                                                    <div class="col-12">
                                                        <p><i class="icon-map-pin"></i> {{ $customer->address }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="detail">
                                                <a href="{{ route('vendor.addon.single-customer', $customer->id) }}"
                                                    class="btn btn-primary btn-lg">View Profile</a>
                                                <div class="points">
                                                    <h6>Loyalty Points</h6>
                                                    <p>50 points</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    @endforeach
                    {{-- @endforeach --}}
                    {{-- <div class="col-lg-4">

                        </div> --}}
                    <div id='page_navigation'></div>
                </div>

            </div>
            <!-- Modal -->
            <div style="" class="modal fade" id="customerModalCenter" tabindex="-1" role="dialog"
                aria-labelledby="customerModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Select Customer Group</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="form-group">
                                <select id="modalSelectCustomerGroup" class="custom-select custom-select-lg">
                                    <option selected> Select Group </option>
                                    @foreach ($customerGroups as $groups)
                                        <option group-id="{{ $groups->id }}">{{ $groups->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button id="btnSaveNow" type="button" class="btn btn-primary btn-lg">Save Now</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="createCustomerGroupModal" tabindex="-1" role="dialog"
                aria-labelledby="createCustomerGroupModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <form method="POST" action="{{ route('vendor.addon.addcustomergroup') }}">
                            <div class="modal-header">

                                    @csrf
                                    <h5 class="modal-title" id="exampleModalLongTitle">Customer Group Name</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="form-group">
                                <input type="text" name="name" class="form-control form-control-lg"
                                    placeholder="Customer Group Name">
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg">Save Now</button>
                        </form>
                        </div>

                    </div>
                </div>
            </div>
        @endsection
</body>

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            console.log("osama");
            selectElement = document.querySelector('#selectCustomerGroup');
            selectElement.addEventListener('change', (event) => {
                selectedOption = event.target.value;
                console.log(`Selected option: ${selectedOption}`);


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
        });

        const selectedIds = [];
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('btnSaveNow').addEventListener('click', function() {

                let grpName = '';

                let mySelect = document.getElementById('modalSelectCustomerGroup');
                let selectedOption = mySelect.options[mySelect.selectedIndex];
                let grpID = selectedOption.getAttribute('group-id');

                // let selectedText = selectedOption.textContent;
                // let selectedValue = selectedOption.value;
                // grpName = selectedValue;
                // console.log(selectedIds);

                if (selectedIds.length > 0) {
                    if (mySelect.selectedIndex != 0) {
                        axios.post('/vendor-panel/addon/assignGroupToCustomers', {
                                customers: selectedIds,
                                groupID: grpID
                            })
                            .then(function(response) {
                                console.log('Success:', response.message);
                                location.reload();
                                // console.log('Success: Customer Group(s) assigned Successfully');
                            })
                            .catch(function(error) {
                                console.log('Error:', error.message);
                            });
                    } else {
                        alert('Please select a Customer Group to Update!');
                    }
                } else {
                    alert('Please select any Customer!');
                }

            });
        });


        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"][data-id]');
            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    if (checkbox.checked) {
                        selectedIds.push(checkbox.dataset
                            .id); // add data-id to array if checkbox is checked
                    } else {
                        const index = selectedIds.indexOf(checkbox.dataset.id);
                        if (index !== -1) {
                            selectedIds.splice(index,
                                1
                            ); // remove data-id from array if checkbox is unchecked
                        }
                    }

                    console.log(selectedIds); // log the updated array to the console
                });
            });
        });
    </script>
@endsection
