@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')

@section('admin-content')
<div class="page-heading pb-0 mb-0">
    <div class="page-title">
        <div class="row">
            <div class="col-9 col-md-7 col-lg-9 order-md-1 order-first">
                <h3 class="pt-4">Dashboard</h3>
            </div>
            <div class="col-3 col-md-5 col-lg-3 order-md-2 order-last">
                <div class="card float-end">
                    <div class="card-body py-4 px-5">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <img src="https://ui-avatars.com/api/?name={{Auth::user()->username}}" alt="{{Auth::user()->username}}">
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold">{{Auth::user()->name}}</h5>
                                <h6 class="text-muted mb-0">&commat;{{Auth::user()->username}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-content pt-0 mt-0">
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldDiscovery"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Travel Packages</h6>
                                    <h6 class="font-extrabold mb-0">{{$travel_package}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldBuy"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Transcations</h6>
                                    <h6 class="font-extrabold mb-0">{{$transaction}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="iconly-boldNotification"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Pending</h6>
                                    <h6 class="font-extrabold mb-0">{{$transaction_pending}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <i class="iconly-boldShield-Done"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Success</h6>
                                    <h6 class="font-extrabold mb-0">{{$transaction_success}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Transaction Chart this Year</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart-transactions"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('addons-style')
<link rel="stylesheet" href="{{asset('admin/vendors/iconly/bold.css')}}">
@endpush

@push('addons-script')
<script src="{{asset('admin/vendors/apexcharts/apexcharts.js')}}"></script>
{{-- <script src="{{asset('admin/js/pages/dashboard.js')}}"></script> --}}
<script>
var optionsTransactionChart = {
	annotations: {
		position: 'back'
	},
	dataLabels: {
		enabled:false
	},
	chart: {
		type: 'bar',
		height: 300
	},
	fill: {
		opacity:1
	},
	plotOptions: {
	},
	series: [{
		name: 'Transaction',
		data: [9,20,30,20,10,20,30,20,10,20,30,20]
	}],
	colors: '#435ebe',
	xaxis: {
		categories: ["Jan","Feb","Mar","Apr","May","Jun","Jul", "Aug","Sep","Oct","Nov","Dec"],
	},
}

var chartTransactions = new ApexCharts(document.querySelector("#chart-transactions"), optionsTransactionChart);

chartTransactions.render();
</script>
@endpush