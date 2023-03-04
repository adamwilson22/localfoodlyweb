@extends('layouts.vendor.app')

@section('title', __('Add Badges'))

@push('css_or_js')
@endpush

@section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title"><i class="tio-add-circle-outlined"></i> {{ __('messages.add') }}
                        {{ __('messages.new') }} {{ __('Badge') }}</h1>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="row gx-2 gx-lg-3">
            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                <form action="{{ route('vendor.badge.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="input-label" for="exampleFormControlInput1">{{ __('messages.image') }}</label>
                        <input type="file" name="badge_image" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="input-label" for="exampleFormControlInput1">{{ __('messages.name') }}</label>
                        <input type="text" name="name" class="form-control"
                            placeholder="{{ __('messages.new_badge') }}" value="{{ old('name') }}" required
                            maxlength="191">
                    </div>

                    <button type="submit" class="btn btn-primary">{{ __('messages.submit') }}</button>
                </form>
            </div>

            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                <hr>
                <div class="card">
                    <div class="card-header">
                        <h5>{{ __('Badge') }} {{ __('messages.list') }}<span class="badge badge-soft-dark ml-2"
                                id="itemCount">{{ $badges->total() }}</span></h5>
                    </div>
                    <!-- Table -->
                    <div class="table-responsive datatable-custom">
                        <table id="columnSearchDatatable"
                            class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                            data-hs-datatables-options='{
                                 "order": [],
                                 "orderCellsTop": true,
                                 "paging":false
                               }'>
                            <thead class="thead-light">
                                <tr>
                                    <th>{{ __('messages.#') }}</th>
                                    <th style="width: 50%">{{ __('messages.name') }}</th>
                                    <th style="width: 10%">{{ __('messages.action') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($badges as $key => $badge)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <span class="d-block font-size-sm text-body">
                                                {{ Str::limit($badge['name'], 20, '...') }}
                                            </span>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-white"
                                                href="{{ route('vendor.badge.edit', [$badge['id']]) }}"
                                                title="{{ __('messages.edit') }} {{ __('messages.badge') }}"><i
                                                    class="tio-edit"></i></a>
                                            <a class="btn btn-sm btn-white" href="javascript:"
                                                onclick="form_alert('badge-{{ $badge['id'] }}','Want to delete this badge ?')"
                                                title="{{ __('messages.delete') }} {{ __('messages.badge') }}"><i
                                                    class="tio-delete-outlined"></i></a>
                                            <form action="{{ route('vendor.badge.delete', [$badge['id']]) }}"
                                                method="post" id="badge-{{ $badge['id'] }}">
                                                @csrf @method('delete')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <table>
                            <tfoot>
                                {!! $badges->links() !!}
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End Table -->
        </div>
    </div>

@endsection

@push('script_2')

@endpush
