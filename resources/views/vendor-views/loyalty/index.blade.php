@extends('layouts.vendor.app')

@section('title', __('Loyalty Program'))
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@push('css_or_js')
    <title>Packages</title>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
    <style>
        .pkgcard .package {
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid #D8D8D8;
            border-radius: 6px;
        }

        .pkgcard .package h2 {
            margin-top: 0;
            font-size: 30px;
            color: #333333;
        }

        .pkgcard .addprod {
            border: none;
            background: transparent;
            padding: 0;
            display: flex;
            align-items: center;
            margin: 20px 0px;
            text-align: left;
            line-height: 1.3
        }

        .pkgcard .addprod img {
            width: 44px;
            margin-right: 6px;
        }

        .pkgcard .addprod p {
            margin: 0;
            color: #6C6C6C;
            font-weight: 300;
            text-decoration: underline;
        }

        .proditem {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .proditem img {
            height: 50px;
            min-width: 50px;
            object-fit: cover;
            border-radius: 4px;
            margin-right: 10px;
        }
    </style>
@endpush

@section('content')

    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm">
                    <h1 class="page-header-title">
                        Loyalty Program
                    </h1>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="card pkgcard">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="package bronze">
                            <h2>Bronze</h2>
                                <div class="form-group">
                                    <label for="bronzeOption">Points</label>
                                    <select class="form-control" id="bronzeOption" name="bronzeOption">
                                        <option value="0">Select Points</option>
                                        @for ($i = 30; $i < 150; $i += 30)
                                            <option value="{{ $i }}">{{ $i }} Points</option>
                                        @endfor
                                    </select>
                                    <div class="modal fade" id="bronzeModal" tabindex="-1" role="dialog"
                                        aria-labelledby="bronzeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="bronzeModalLabel">Products</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table" id="modal-gridDataBronzeTable">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>Product ID</th>
                                                                <th>Product Name</th>
                                                                <th>Price</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="modal-gridDataBronze">
                                                            <!-- Data will be dynamically populated here -->
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary"
                                                        onclick="getSelectedProducts()" data-dismiss="modal">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button data-heading="bronze" type="button" class="addprod" data-toggle="modal"
                                            data-target="#bronzeModal" onclick="loadGridData()">
                                            <img class="img-fluid" src="{{ asset('public/assets/admin/img/pluss.png') }}"
                                                alt="">
                                            <p>Add upto <br> 3 Products</p>
                                        </button>
                                    </div>
                                    <div id="bronze">
                                    @foreach($bronzeProducts as $product)
                                        <div class="mb-3" id="bronze-{{ $product->id }}" data-id="{{ $product->id }}">
                                            <div class="proditem">
                                                <img id="bronze-section-img" class="img-fluid"
                                                    src="{{ $product->image }}" alt="">
                                                <div>
                                                    <h4 id="bronze-section-ProductName">{{ $product->name }}</h4>
                                                    <p id="bronze-section-description">{{ $product->description }}</p>
                                                </div>
                                            </div>
                                            <a href="javascript:;" id="prodID" data-productid="{{ $product->id }}" class="removeprod">Remove Product</a>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                                <!-- More form elements specific to the bronze package -->
                                <button type="submit" class="btn btn-primary" onclick="saveProductsData()">Submit</button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="package silver">
                            <h2>Silver</h2>
                            <form>
                                <!-- Silver Package Form Elements -->
                                <div class="form-group">
                                    <label for="SilverOption">Select Points</label>
                                    <select class="form-control" id="SilverOption" name="SilverOption">
                                        <option value="0">Select Points</option>
                                        @for ($i = 180; $i < 350; $i += 50)
                                            <option value="{{ $i }}">{{ $i }} Points</option>
                                        @endfor
                                    </select>
                                    <!-- Silver Modal -->
                                    <div class="modal fade" id="silverModal" tabindex="-1" role="dialog"
                                        aria-labelledby="silverModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="silverModalLabel">Products</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table" id="modal-gridDataSilverTable">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>Product ID</th>
                                                                <th>Product Name</th>
                                                                <th>Price</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="modal-gridDataSilver">
                                                            <!-- Data will be dynamically populated here -->
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary" onclick="">Save
                                                        changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Silver Modal -->
                                    <!-- Button to open modal -->
                                    <button type="button" data-heading="silver" class="addprod"
                                        data-toggle="modal" data-target="#silverModal"
                                        onclick="loadGridDataForSilverModal()">
                                        <img class="img-fluid" src="{{ asset('public/assets/admin/img/pluss.png') }}"
                                            alt="">
                                        <p>Add upto <br> 3 Products</p>
                                    </button>
                                    <div class="mb-3">
                                        <div class="proditem">
                                            <img class="img-fluid"
                                                src="{{ asset('public/assets/admin/img/MaskGroup18.png') }}" alt="">
                                            <div>
                                                <h4>Pizza Margherita</h4>
                                                <p>Lorem ipsum dolor sit</p>
                                            </div>
                                        </div>
                                        <a href="javascript:;" class="removeprod">Remove Product</a>
                                    </div>
                                    <div class="mb-3">
                                        <div class="proditem">
                                            <img class="img-fluid"
                                                src="{{ asset('public/assets/admin/img/MaskGroup18.png') }}" alt="">
                                            <div>
                                                <h4>Pizza Margherita</h4>
                                                <p>Lorem ipsum dolor sit</p>
                                            </div>
                                        </div>
                                        <a href="javascript:;" class="removeprod">Remove Product</a>
                                    </div>
                                </div>
                                <!-- More form elements specific to the silver package -->
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="package gold">
                            <h2>Gold</h2>
                            <form>
                                <div class="form-group">
                                    <label for="goldOption">Select Points</label>
                                    <select class="form-control" id="goldOption" name="goldOption">
                                        <option value="0">Select Points</option>
                                        @for ($i = 30; $i < 150; $i += 30)
                                            <option value="{{ $i }}">{{ $i }} Points</option>
                                        @endfor
                                    </select>
                                    <!-- Gold Modal -->
                                    <div class="modal fade" id="goldModal" tabindex="-1" role="dialog"
                                        aria-labelledby="goldModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="goldModalLabel">Products</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table" id="modal-gridDataGoldTable">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>Product ID</th>
                                                                <th>Product Name</th>
                                                                <th>Price</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="modal-gridDataGold">
                                                            <!-- Data will be dynamically populated here -->
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary" onclick="">Save
                                                        changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Gold Modal -->
                                    <div>
                                        <button data-heading="gold" type="button" class="addprod"
                                            data-toggle="modal" data-target="#goldModal"
                                            onclick="loadGridDataForGoldModal()">
                                            <img class="img-fluid" src="{{ asset('public/assets/admin/img/pluss.png') }}"
                                                alt="">
                                            <p>Add upto <br> 3 Products</p>
                                        </button>
                                    </div>
                                    <div class="mb-3">
                                        <div class="proditem">
                                            <img class="img-fluid"
                                                src="{{ asset('public/assets/admin/img/MaskGroup18.png') }}" alt="">
                                            <div>
                                                {{-- <h4>{{ $products->image }}</h4> --}}
                                                <p>Lorem ipsum dolor sit</p>
                                            </div>
                                        </div>
                                        <a href="javascript:;" class="removeprod">Remove Product</a>
                                    </div>
                                    <div class="mb-3">
                                        <div class="proditem">
                                            <img class="img-fluid"
                                                src="{{ asset('public/assets/admin/img/MaskGroup18.png') }}" alt="">
                                            <div>
                                                <h4>Pizza Margherita</h4>
                                                <p>Lorem ipsum dolor sit</p>
                                            </div>
                                        </div>
                                        <a href="javascript:;" class="removeprod">Remove Product</a>
                                    </div>
                                    <div class="mb-3">
                                        <div class="proditem">
                                            <img class="img-fluid"
                                                src="{{ asset('public/assets/admin/img/MaskGroup18.png') }}" alt="">
                                            <div>
                                                <h4>Pizza Margherita</h4>
                                                <p>Lorem ipsum dolor sit</p>
                                            </div>
                                        </div>
                                        <a href="javascript:;" class="removeprod">Remove Product</a>
                                    </div>
                                </div>
                                <!-- More form elements specific to the bronze package -->
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    

    <script type="text/javascript">
        // Variables
        var selectedFoods = [];
        var dataHeadingValue = "";
        var selectedProductIDs = []; // Array to store selected product IDs
        var table;
        var csrfToken = "";
        var selectedPoints = '0';

        selectedFoods = <?php echo $checkBronzeCategoryProductExists->product_ids; ?>;
        // selectedFoods = selectedProductIDs;

        // console.log('selectedProductIDs : ' + selectedProductIDs);
        // console.log('selectedFoods : ' + selectedProductIDs);

        $("button[data-heading]").click(function() {
            csrfToken = $("meta[name='csrf-token']").attr("content");
            dataHeadingValue = $(this).data("heading");
            console.log(dataHeadingValue);
        });
        

        $('#bronzeOption').change(function() {
            selectedPoints = $(this).val();
            console.log(selectedPoints);
        });

        function saveProductsData() {
            console.log('saveProductsData executed!!!');

            if (selectedPoints === '0' || selectedFoods.length == 0) {
                alert('Please select loyalty points and products!');
                console.log('Abort!');
                return; 
            }
            else{
                console.log('AJAX Called!');
                csrfToken = "";
                csrfToken = $("meta[name='csrf-token']").attr("content");
                $.ajax({
                    url: '{{ route('vendor.loyalty.save-product-data') }}',
                    method: "POST",
                    data: {
                        productIDs: selectedFoods,
                        loyaltyCategory: dataHeadingValue,
                        categoryPoints: selectedPoints
                    },
                    headers: {
                        "X-CSRF-TOKEN": csrfToken
                    },
                    success: function(response) {
                        console.log("AJAX request successful");
                        console.log(response);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log("AJAX request error");
                        console.log(jqXHR);
                        console.log(textStatus);
                        console.log(errorThrown);
                    }
                });
            }
        }

        function getSelectedProducts() {
            console.log('############# getSelectedProducts Started #############');

            console.log('selectedProductIDs: ' + selectedProductIDs);
            console.log('selectedFoods: ' + selectedFoods);

            $.ajax({
                url: '{{ route('vendor.loyalty.get-selected-product-data') }}',
                method: "GET",
                data: {
                    productIDs: selectedProductIDs,
                },
                headers: {
                    "X-CSRF-TOKEN": csrfToken
                },
                success: function(response) {
                // console.log(response);
                    // Update HTML values using the received response
                    var foodList = "";
                    response.forEach(function(item) {
                        selectedFoods.push(item.id.toString());
                        console.log('selectedFoods Length : ' + selectedFoods.length);
                        
                        // check the count of the existing foods in the div
                        console.log('item: ' + item.id);
                        var existingFoodCount = $('#bronze');
                        console.log('existingFoodCount : ' + existingFoodCount);

                        if (existingFoodCount.length < 2) {
                            foodList += '<div class="mb-3" id="bronze-' + item.id + '" data-id="' + item.id + '">'
                                foodList += '<div class="proditem">'
                                    foodList += '<img id="bronze-section-img" class="img-fluid"'
                                        foodList += 'src="' + item.image + '" alt="">'
                                        foodList += '<div>'
                                            foodList += '<h4 id="bronze-section-ProductName">' + item.name + '</h4>'
                                            foodList += '<p id="bronze-section-description">' + item.description + '</p>'
                                        foodList += '</div>'
                                    foodList += '</div>'
                                foodList += '<a href="javascript:;" id="prodID" data-productid="'+ item.id +'" class="removeprod">Remove Product</a>'
                            foodList += '</div>'
                        }
                    });

                    
                    // console.log('Food List : ' + foodList);
                    
                        if (foodList.length > 0) {
                            // console.log('HTML append function works!' + foodList);
                            $('#bronze').append(foodList);
                        }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log("AJAX request error");
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
            console.log('############# getSelectedProducts Ended #############');
        }
        
        $(document).on('click', '.removeprod', function() {
            console.log('############# Remove Product Started #############');
            console.log(selectedFoods);

            var productId = $(this).data('productid').toString();

            // Remove the item from selectedFoods and selectedProductIDs arrays
            selectedFoods = selectedFoods.filter(function(item) {
                return item !== productId;
            });

            // Remove the product from the DOM
            $('[data-id="' + productId + '"]').remove();

            console.log('selectedFoods: ' + selectedFoods);

            console.log('############# Remove Product Ended #############');
        });



        

        // ******* For Bronze Modal *******
        function loadGridData() {
            var html = '';
            console.log('Bronze Modal');
            console.log('selectedFoods : ' + selectedFoods);

            if(selectedFoods.length < 3){
                $.ajax({
                    url: '{{ route('vendor.loyalty.fetch-data') }}',
                    method: 'GET',
                    success: function(response) {
                        
                        html = "";
                        var gridData = response.filter(function(item) {
                            return !selectedFoods.includes(item.id.toString());
                        });
                        
                        for (var i = 0; i < gridData.length; i++) {
                            html += '<tr>';
                            html +=
                                '<td><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input rowCheckbox" id="' +
                                gridData[i].id + '"><label class="custom-control-label" for="' + gridData[i].id +
                                '"></label></div></td>';
                            html += '<td>' + gridData[i].id + '</td>';
                            html += '<td>' + gridData[i].name + '</td>';
                            html += '<td>' + gridData[i].price + '</td>';
                            html += '</tr>';
                        }

                        // Initialize DataTables only if it's not already initialized
                        if (!$.fn.DataTable.isDataTable('#modal-gridDataBronzeTable')) {
                            $('#modal-gridDataBronze').html(html);
                            table = $('#modal-gridDataBronzeTable').DataTable({
                                paging: true, // Enable pagination
                                lengthChange: false, // Hide page length options
                                searching: true, // Enable search
                                info: false, // Hide information text
                            });
                        } else {
                            $('#bronzeModal').modal('show');

                            $('#modal-gridDataBronzeTable').DataTable().destroy(); // Destroy the existing DataTable instance
                            table = $('#modal-gridDataBronzeTable').DataTable({
                                paging: true, // Enable pagination
                                lengthChange: false, // Hide page length options
                                searching: true, // Enable search
                                info: false, // Hide information text
                            });
                            $('#modal-gridDataBronze').html(html);
                        }

                        // Event listener for row checkboxes
                        $(document).on('change', '.rowCheckbox', function() {
                            updateSelectedProductIDs();
                        });

                        function updateSelectedProductIDs() {
                            selectedProductIDs = [];
                            var selectedCheckboxes = [];
                            
                            selectedCheckboxes = $('.rowCheckbox:checked', table.rows().nodes());
                            var selectedFoodsCount = selectedFoods.length;

                            console.log('selectedCheckboxes: ' + selectedCheckboxes.length);

                            if (selectedFoodsCount < 3) {
                                var remainingFoods = 3 - selectedFoodsCount;
                                console.log('remainingFoods: ' + remainingFoods);
                                
                                if (selectedCheckboxes.length > remainingFoods) {
                                    selectedCheckboxes.slice(remainingFoods).prop('checked', false);
                                    selectedCheckboxes = $('.rowCheckbox:checked', table.rows().nodes());
                                }
                            }

                            selectedCheckboxes.each(function() {
                                selectedProductIDs.push($(this).attr('id'));
                            });
                            
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("Failure!")
                        console.log(error);
                    }
                });
            }
            else{
                alert('Already added 3 Foods, Remove some to replace!');
                $('[data-target="#bronzeModal"]').removeAttr('data-toggle');
                return false;
            }
        }

        // ******* For Bronze Modal *******

        // ******* For Silver Modal *******
        function loadGridDataForSilverModal() {
            console.log('Silver Modal');

            $.ajax({
                url: '{{ route('vendor.loyalty.fetch-data') }}',
                method: 'GET',
                success: function(response) {
                    var gridData = response;
                    var html = '';
                    for (var i = 0; i < gridData.length; i++) {
                        html += '<tr>';
                        html +=
                            '<td><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input rowCheckbox" id="' +
                            gridData[i].id + '"><label class="custom-control-label" for="' + gridData[i].id +
                            '"></label></div></td>';
                        html += '<td>' + gridData[i].id + '</td>';
                        html += '<td>' + gridData[i].name + '</td>';
                        html += '<td>' + gridData[i].price + '</td>';
                        html += '</tr>';
                    }

                    // Initialize DataTables only if it's not already initialized
                    if (!$.fn.DataTable.isDataTable('#modal-gridDataSilverTable')) {
                        $('#modal-gridDataSilver').html(html);
                        table = $('#modal-gridDataSilverTable').DataTable({
                            paging: true, // Enable pagination
                            lengthChange: false, // Hide page length options
                            searching: true, // Enable search
                            info: false, // Hide information text
                        });
                    } else {
                        $('#modal-gridDataSilverTable').DataTable()
                            .destroy(); // Destroy the existing DataTable instance
                        $('#modal-gridDataSilver').html(html);
                        table = $('#modal-gridDataSilverTable').DataTable({
                            paging: true, // Enable pagination
                            lengthChange: false, // Hide page length options
                            searching: true, // Enable search
                            info: false, // Hide information text
                        });
                    }

                    // Event listener for select all checkbox
                    // $('#selectAllCheckbox').on('change', function() {
                    //     $('.rowCheckbox', table.rows().nodes()).prop('checked', $(this).prop(
                    //         'checked'));
                    //     updateSelectedProductIDs();
                    // });

                    // Event listener for row checkboxes
                    $(document).on('change', '.rowCheckbox', function() {
                        updateSelectedProductIDs();
                    });

                    // Update selected product IDs array
                    function updateSelectedProductIDs() {
                        selectedProductIDs = [];

                        var selectedCheckboxes = $('.rowCheckbox:checked', table.rows().nodes());
                        if (selectedCheckboxes.length > 3) {
                            selectedCheckboxes.slice(3).prop('checked', false);
                            selectedCheckboxes = $('.rowCheckbox:checked', table.rows().nodes());
                        }
                        selectedCheckboxes.each(function() {
                            selectedProductIDs.push($(this).attr('id'));
                        });
                        console.log('selectedProductIDs: ' + selectedProductIDs);
                    }
                },
                error: function(xhr, status, error) {
                    console.log("Failure!")
                    console.log(error);
                }
            });
        }
        // ******* For Silver Modal *******

        // ******* For Gold Modal *******
        function loadGridDataForGoldModal() {
            console.log('Gold Modal');
            $.ajax({
                url: '{{ route('vendor.loyalty.fetch-data') }}',
                method: 'GET',
                success: function(response) {
                    var gridData = response;
                    var html = '';
                    for (var i = 0; i < gridData.length; i++) {
                        html += '<tr>';
                        html +=
                            '<td><div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input rowCheckbox" id="' +
                            gridData[i].id + '"><label class="custom-control-label" for="' + gridData[i].id +
                            '"></label></div></td>';
                        html += '<td>' + gridData[i].id + '</td>';
                        html += '<td>' + gridData[i].name + '</td>';
                        html += '<td>' + gridData[i].price + '</td>';
                        html += '</tr>';
                    }

                    // Initialize DataTables only if it's not already initialized
                    if (!$.fn.DataTable.isDataTable('#modal-gridDataGoldTable')) {
                        $('#modal-gridDataGold').html(html);
                        table = $('#modal-gridDataGoldTable').DataTable({
                            paging: true, // Enable pagination
                            lengthChange: false, // Hide page length options
                            searching: true, // Enable search
                            info: false, // Hide information text
                        });
                    } else {
                        $('#modal-gridDataGoldTable').DataTable()
                            .destroy(); // Destroy the existing DataTable instance
                        $('#modal-gridDataGold').html(html);
                        table = $('#modal-gridDataGoldTable').DataTable({
                            paging: true, // Enable pagination
                            lengthChange: false, // Hide page length options
                            searching: true, // Enable search
                            info: false, // Hide information text
                        });
                    }

                    // Event listener for select all checkbox
                    $('#selectAllCheckbox').on('change', function() {
                        $('.rowCheckbox', table.rows().nodes()).prop('checked', $(this).prop(
                            'checked'));
                        updateSelectedProductIDs();
                    });

                    // Event listener for row checkboxes
                    $(document).on('change', '.rowCheckbox', function() {
                        updateSelectedProductIDs();
                    });

                    // Update selected product IDs array
                    function updateSelectedProductIDs() {
                        // selectedProductIDs = [];

                        var selectedCheckboxes = $('.rowCheckbox:checked', table.rows().nodes());
                        if (selectedCheckboxes.length > 3) {
                            selectedCheckboxes.slice(3).prop('checked', false);
                            selectedCheckboxes = $('.rowCheckbox:checked', table.rows().nodes());
                        }
                        selectedCheckboxes.each(function() {
                            selectedFoods.push($(this).attr('id'));
                        });
                        console.log(selectedFoods);
                    }
                },
                error: function(xhr, status, error) {
                    console.log("Failure!")
                    console.log(error);
                }
            });
        }
        // ******* For Gold Modal *******
    </script>
@endsection
