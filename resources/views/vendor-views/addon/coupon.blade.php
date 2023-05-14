@extends('layouts.vendor.app')

@section('title', __('Coupons'))

@push('css_or_js')
@endpush

<body class="">
    @section('content')
@php($restaurant_data = \App\CentralLogics\Helpers::get_restaurant_data())
    

@endsection

            


