@extends('layouts.vendor.app')

@section('title', __('Categories'))

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
                            Categories
                        </h1>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->

            <div class="row">
                <div class="col-xl-4 col-lg-6">
                    <div class="inline-select d-none">
                        <label for="" class="">Sort by</label>
                        <select id="" class="custom-select custom-select-lg">
                            <option selected>Best Seller</option>
                            <option>...</option>
                        </select>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-6 mt-lg-0 mt-3 text-lg-right">
                    <a href="{{route('vendor.addon.addcategory')}} " class="btn btn-secondary btn-lg">Create Categories</a>
                    {{-- <a href="#" class="btn btn-primary btn-lg ml-sm-3 mt-lg-0 mt-2">Add More categories</a> --}}
                </div>
            </div>

            <div class="categories-cards mt-5">
                <input type='hidden' id='current_page' />
                <input type='hidden' id='show_per_page' />
                <div class="row" id="pagingBox">

                    @foreach ($categories as $key => $category)
                        <div class="col-lg-6">
                            @php( $class =  (($key+1) % 2 == 0) ? "sec-categ" : "first-categ")
                            <div class="card {{ $class }}">
                                <div class="card-body">
                                    <div class="content">
                                        <h4> <a href="{{route('vendor.addon.categories.edit')}}?id={{$category->id}}" >{{ $category->name }}</a> </h4>
                                    </div>
                                    <div class="categories-img">
                                        <img src="{{ asset('public/images/'.$category->image) }}" alt="">
                                        {{-- <img src="{{ asset('public/assets/admin/img/pizza.png') }}" alt=""> --}}
                                    </div>

                                </div>
                            </div>
                        </div>
                        
                    @endforeach
                </div>
            </div>
        </div>
            {{-- <div id='page_navigation'></div> --}}
        </div>

        </div>

    @endsection
</body>
