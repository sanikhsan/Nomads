@extends('landing.layouts.app')
@section('title', '- Checkout Success')

@section('landing-section')
<div class="section-success d-flex align-items-center">
    <div class="col text-center">
      <img src="{{ asset('landing/images/ic_mail.png') }}" alt="" />
      <h1>Yay! Success</h1>
      <p>
        Berhasil melakukan Checkout!
        <br />
        Silahkan menuju dashboard dan lakukan Pembayaran, Terima Kasih!
      </p>
      <a href="{{ route('customer.dashboard') }}" class="btn btn-home-page mt-3 px-5">
        Dashboard Page
      </a>
    </div>
</div>
@endsection