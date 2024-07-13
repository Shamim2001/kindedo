@extends('backend.layouts.app')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@push('css')
    <style>
        .single_item {
            width: 100%;
        }
    </style>
@endpush
@section('content')
    {{-- <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="card p-3">
                    <h2 class="card-title flex-grow-1 mb-3">Order Information</h2>
                    <div class="d-flex justify-content-between gap-4">
                        <x-info-card title="Today" count="{{ $order_info['daily']['count'] }}"
                            amount="{{ $order_info['daily']['amount'] }}" color="#2e4a14" />
                        <x-info-card title="This Week " count="{{ $order_info['weekly']['count'] }}"
                            amount="{{ $order_info['weekly']['amount'] }}" color="#b84daa" />
                        <x-info-card title="This Month" count="{{ $order_info['monthly']['count'] }}"
                            amount="{{ $order_info['monthly']['amount'] }}" color="#628924" />
                        <x-info-card title="This Year" count="{{ $order_info['yearly']['count'] }}"
                            amount="{{ $order_info['yearly']['amount'] }}" color="#913147" />
                        <x-info-card title="Till Now" count="{{ count($orders) }}" amount="{{ $orders->sum('total') }}"
                            color="#1a8d87" />
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card p-3">
                    <h2 class="card-title flex-grow-1 mb-3">Website Analytics</h2>
                    <div class="row">
                        <div class="col-xxl-3 col-sm-6">
                            <x-widget title="Total Revenue" icon="ti ti-wallet" :value="$orders->sum('total') / 100" currency="true" />
                        </div><!--end col-->
                        <div class="col-xxl-3 col-sm-6">
                            <x-widget title="Total Orders" icon="ti ti-building-store" :value="count($orders)"
                                bg="bg-warning-subtle text-warning " />

                        </div><!--end col-->
                        <div class="col-xxl-3 col-sm-6">
                            <x-widget title="Total Customer" icon="ti ti-users-group" :value="count($customers)"
                                bg="bg-success-subtle text-success" />
                        </div><!--end col-->
                        <div class="col-xxl-3 col-sm-6">
                            <x-widget title="Total Products" icon="ti ti-box-seam" :value="count($products)"
                                bg="bg-secondary-subtle text-secondary" />
                        </div><!--end col-->
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-4 col-lg-6">
                <x-recent-orders :orders="$orders->take(5)" />
            </div><!--end col-->
            <div class="col-xxl-4 col-lg-6">
                <x-recent-customers :customers="$customers->take(5)" />

            </div><!--end col-->
            <div class="col-xxl-4">
                <x-recent-top-products :products="$top_products" />
            </div><!--end col-->
        </div>
        <div class="row">
            <div class="col-xl-12">
                <x-chart-product-overview :data="$chart_data" />
            </div><!--end col-->
        </div>
    </div> --}}
@endsection

@push('js')
@endpush
