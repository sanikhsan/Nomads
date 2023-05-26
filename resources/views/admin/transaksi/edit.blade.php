@extends('admin.layouts.app')
@section('title', 'Update Status Transaction')

@section('admin-content')
<div class="page-heading">
    <div class="page-title">
        <div class="row mb-4">
            <div class="col-6 col-md-6 order-md-1 order-first">
                <h3>Transaction Detail</h3>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Update Transaction Detail</h5>
            </div>
            @include('admin.components.alert')
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                      <tr>
                        <th class="w-25" scope="row">Travel Package</th>
                        <td>{{$transaction->trxtravel->title}}</td>
                      </tr>
                      <tr>
                        <th class="w-25" scope="row">Customer Name</th>
                        <td>{{$transaction->TrxUser->name}}</td>
                      </tr>
                      <tr>
                        <th class="w-25" scope="row">Status</th>
                        <td>{{$transaction->transaction_status}}</td>
                      </tr>
                    </tbody>
                </table>
                <div class="my-3">
                    <form action="{{route('admin.transaction.update', $transaction)}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <label for="update-transaction" class="form-label"><strong>Update Status Transaction</strong></label>
                        <select class="form-select" name="transaction_status" id="update-transaction" required>
                            <option selected value="" disabled>{{$transaction->transaction_status}}</option>
                            <option value="PENDING">PENDING</option>
                            <option value="FAILED">REJECT</option>
                            <option value="CONFIRMED">CONFIRM</option>
                        </select>
                        <button type="submit" class="btn btn-primary my-3 float-end">SAVE</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection