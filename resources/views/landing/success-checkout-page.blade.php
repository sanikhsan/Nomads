@extends('landing.layouts.app')
@section('title', 'Checkout Success')

@section('landing-section')
<div class="section-success d-flex align-items-center">
    <div class="col text-center">
      <img src="{{ asset('landing/images/ic_mail.png') }}" alt="" />
      <h1>Yay! Success</h1>
      <p>
        We’ve sent you email for trip instruction
        <br />
        please read it as well
      </p>
      <a href="{{ route('landing') }}" class="btn btn-home-page mt-3 px-5">
        Home Page
      </a>
    </div>
</div>
@endsection