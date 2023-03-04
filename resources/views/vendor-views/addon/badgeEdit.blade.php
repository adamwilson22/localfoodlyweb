@extends('layouts.vendor.app')

@section('title', 'Update badge')

@push('css_or_js')
@endpush

@section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title"><i class="tio-edit"></i> {{ __('Badge') }}
                        {{ __('messages.update') }}</h1>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="row gx-2 gx-lg-3">
            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                <form action="{{ route('vendor.badge.update', [$badge['id']]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="input-label" for="exampleFormControlInput1">{{ __('messages.image') }}</label>
                        <input type="file" name="badge_image" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="input-label" for="exampleFormControlInput1">{{ __('messages.name') }}</label>
                        <input type="text" name="name" class="form-control"
                            placeholder="{{ __('messages.new_badge') }}" value="{{ $badge['name'] }}" required
                            maxlength="191">
                    </div>

                    <button type="submit" class="btn btn-primary">{{ __('messages.update') }}</button>
                </form>
            </div>
            <!-- End Table -->
        </div>
    </div>

@endsection

@push('script_2')

@endpush
