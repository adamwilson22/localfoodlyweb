@extends('layouts.vendor.app')

@section('title', __('Edit Category'))

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
                        Edit Category
                    </h1>
                </div>
            </div>
        </div>
        <!-- End Page Header -->

        <div class="product-form">
            <form id="categoryForm" action="{{ route('vendor.addon.categories.update') }}" method="POST"
                enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-head">
                                    <a href="/vendor-panel/addon/categories"><i class="icon-arrow-left"></i></a>
                                    <div>
                                    </div>
                                </div>
                                <!-- Form Group -->
                                @csrf
                                <div class=" form-group">
                                    <input type="hidden" name="id" value={{ $category->id }}>
                                    <input type="hidden" name="old_image" value={{ $category->image }}>

                                    <label class="input-label" for="">Category Name *</label>
                                    <input type="text" value="{{ $category->name }}"
                                        class="form-control form-control-lg" name="name" placeholder="Name"
                                        required="required">
                                </div>
                                <div class=" form-group">

                                    <label class="input-label" for="">Category Photo *</label>
                                    <img id="imgprv" style="width:50px; height:50px; display:inline"
                                        src="{{ asset('public/images') .'/'. $category->image }}" alt="">

                                    <input type="file" name="image" id="inputGroupFile01"
                                        onchange="showPreview(event);" />
                                </div>

                                <div class=" form-group">
                                    <label class="input-label" for="">Status</label>
                                    <select name="status" id="label" class="custom-select custom-select-lg"
                                        required="required">
                                        <option value="">Please select status from dropdown</option>
                                        <option value="1" {{ $category->status == 1 ? 'selected="seleted"' : ''  }}>
                                            Active</option>
                                        <option value="0" {{ $category->status == 0 ? 'selected="seleted"' : ''  }}>
                                            Inactive</option>

                                    </select>
                                </div>
                                <Button type="submit" class="btn btn-primary btn-lg">Save</Button>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="col-lg-5 ">
                            <div class="uploadimgs">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="inputgroup">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                </div>
            </form>
            <button class="btn deleteRecord btn-danger" value="delete" id="btn-delete" data-id="{{ $category->id }}">
                Delete
            </button>
        </div>
    </div>
    @endsection

    @push('custom_js')
    <script>
    // function readURL(input) {
    //     if (input.files && input.files[0]) {
    //         var reader = new FileReader();
    //         reader.onload = function(e) {
    //             $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
    //             $('#imagePreview').hide();
    //             $('#imagePreview').fadeIn(650);
    //         }
    //         reader.readAsDataURL(input.files[0]);
    //     }
    // }
    // $("#imgprv").change(function() {
    //     readURL(this);
    // });

    function showPreview(event) {
        if (event.target.files.length > 0) {
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById("imgprv");
            preview.src = src;
            preview.style.display = "inline";
        }
    }

    $(".deleteRecord").click(function() {
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
        var state = jQuery('.deleteRecord').val();
        console.log(id);
        $.ajax({
            
            
            url: "{{ route('category.destroy',"+ id +") }}",
            type: 'DELETE',
            data: {
                "id": id,
                "_token": token,
            },
            success: function(data) {
                if (state == "delete") {
                    console.log("Category deleted!");
                } else {
                    console.log("Category delete failed!");
                }
                // jQuery('#categoryForm').trigger("reset");
                console.log("it Works");
            }
        });

    });
    </script>
    @endpush
</body>