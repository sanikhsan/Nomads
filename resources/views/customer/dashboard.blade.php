@extends('customer.layouts.app')

@section('title', 'Customer Dashboard')

@section('customer-content')
<div class="page-heading">
    <div class="page-title">
        <div class="row mb-4">
            <div class="col-6 col-md-6 order-md-1 order-first">
                <h3>Customer Dashboard</h3>
            </div>
            <div class="col-6 col-md-6 order-md-2 order-last">
                <nav class="breadcrumb-header float-end">
                    <a href="{{url('/')}}" class="btn btn-primary"> Go Travel </a>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Transaction List</h5>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="TravelPackage">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Travel Name</th>
                            <th>Customer Name</th>
                            <th>Additional Visa</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transactions as $transaction)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$transaction->TrxTravel->title}}</td>
                            <td>{{$transaction->TrxUser->name}}</td>
                            <td>$ {{$transaction->additional_visa}},00</td>
                            <td>$ {{$transaction->transaction_total}},00</td>
                            <td>{{$transaction->transaction_status}}</td>
                            @if ($transaction->transaction_status == 'CANCELED')
                            <td class="text-center">
                                <button type="submit" class="btn btn-secondary px-3" disabled>CANCELED</button>
                            </td>
                            @elseif ($transaction->transaction_status == 'FAILED')
                            <td class="text-center">
                                <button type="submit" class="btn btn-success px-4" disabled>FAILED</button>
                            </td>
                            @elseif ($transaction->transaction_status == 'PAID')
                            <td class="text-center">
                                <a href="{{route('customer.order', $transaction)}}" class="btn btn-info">Reupload Transfer</a>
                            </td>
                            @elseif ($transaction->transaction_status == 'CONFIMED')
                            <td class="text-center">
                                <button type="submit" class="btn btn-info px-4" disabled>CONFIRMED</button>
                            </td>
                            @else
                            <td class="text-center">
                                <a href="{{route('customer.order', $transaction)}}" class="btn btn-info">Upload Transfer</a>
                                <button type="submit" class="btn btn-danger px-4">BATALKAN</button>
                            </td>
                            @endif
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="p-3 text-center">
                                <h4>Oops! There is no Data to Show.</h4>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
@endsection


@push('addons-style')
<link rel="stylesheet" href="{{asset('admin/vendors/simple-datatables/style.css')}}">
@endpush

@push('addons-script')
<script src="{{asset('admin/vendors/simple-datatables/simple-datatables.js')}}"></script>
<script>
    // Simple Datatable
    let TravelPackage = document.querySelector('#TravelPackage');
    let dataTable = new simpleDatatables.DataTable(TravelPackage);
</script>
@endpush