@extends('landing.layouts.app')
@section('title', '- Checkout Canceled')

@section('landing-section')
<div class="section-success d-flex align-items-center">
    <div class="col text-center">
      <img src="{{ asset('landing/images/ic_mail.png') }}" alt="" />
      <h1>Oops! Canceled</h1>
      <p>
        Your Transaction has been canceled
        <br />
        please comeback later.
      </p>
      <a href="{{ route('landing') }}" class="btn btn-home-page mt-3 px-5">
        Home Page
      </a>
    </div>
</div>
@endsection