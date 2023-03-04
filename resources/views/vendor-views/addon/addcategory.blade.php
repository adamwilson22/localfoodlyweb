@extends('layouts.vendor.app')

@section('title', __('Add Category'))

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
                            Add Category
                        </h1>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->

            <div class="product-form">
                <form action="{{ route('vendor.addon.create_category') }}" method="POST" enctype="multipart/form-data">
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
                                        <label class="input-label" for="">Category Name *</label>
                                        <input type="text" class="form-control form-control-lg" name="name"
                                            placeholder="Name" required="required">
                                    </div>
                                    <div class=" form-group">

                                            <label class="input-label" for="">Category Photo *</label>
                                            <input type="file" name="image" required="required" id="inputGroupFile01" />
                                    </div>

                                    <div class=" form-group">
                                        <label class="input-label" for="">Status</label>
                                        <select name="status" id="label" class="custom-select custom-select-lg" required="required">
                                            <!-- <option value="">Please select status from dropdown</option> -->
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                            
                                        </select>
                                    </div>
                                    <Button type="submit" class="btn btn-primary btn-lg">Save Now</Button>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5 ">
                            <div class="uploadimgs">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="inputgroup">
                                            {{-- <div class="input-group-prepend">
                                                <i class="icon-plus"><i class="path1"></i><i class="path2"></i><i
                                                        class="path3"></i></i>
                                            </div> --}}
                                            {{-- <div class="custom-file">
                                                <input type="file" name="images[]" id="inputGroupFile01" multiple />
                                                <label class="custom-file-label" for="inputGroupFile01">Upload
                                                    Images/Video <p>Select file</p></label>
                                            </div> --}}
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
