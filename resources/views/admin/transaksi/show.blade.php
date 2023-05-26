@extends('admin.layouts.app')
@section('title', 'Detail Transaction')

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
                <h5 class="card-title">Travel Transaction Detail</h5>
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
                        <th class="w-25" scope="row">Additional Visa</th>
                        <td>$ {{$transaction->additional_visa}},00</td>
                      </tr>
                      <tr>
                        <th class="w-25" scope="row">Transaction Total</th>
                        <td>$ {{$transaction->transaction_total}},00</td>
                      </tr>
                      <tr>
                        <th class="w-25" scope="row">Status</th>
                        <td>{{$transaction->transaction_status}}</td>
                      </tr>
                      <tr>
                        <th class="w-25" scope="row">Detail Transaksi</th>
                        <td>
                            <table class="table text-center">
                                <thead>
                                  <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Nationality</th>
                                    <th scope="col">VISA</th>
                                    <th scope="col">DOE Passport</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($transaction->TrxDetail as $detail )
                                  <tr>
                                    <td>{{$detail->username}}</td>
                                    <td>{{$detail->nationality}}</td>
                                    <td>{{$detail->is_visa ? 'Active' : 'N/A'}}</td>
                                    <td>{{\Carbon\Carbon::create($detail->doe_passport)->toFormattedDateString()}}</td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                        </td>
                      </tr>
                      <tr>
                        <th class="w-25" scope="row">Bukti Transfer</th>
                        <td class="text-center"><img src="{{Storage::url($transaction->transaction_image)}}" alt="Bukti Transfer"></td>
                      </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection