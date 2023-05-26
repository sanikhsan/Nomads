@extends('customer.layouts.app')

@section('title', 'Customer Dashboard')

@section('customer-content')
<div class="page-heading">
    <div class="page-title">
        <div class="row mb-4">
            <div class="col-12 col-md-12 order-md-1 order-first">
                <h3>Customer Profile Configuration</h3>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Customer Data</h5>
            </div>
            @include('customer.components.alert')
            <div class="card-body">
                <form action="{{route('customer.profile.update')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label class="form-label">Full Name</label>
                      <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" required>
                      <input type="hidden" class="form-control" name="id" value="{{Auth::user()->id}}" required readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" value="{{Auth::user()->username}}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}" required>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Nationality</label>
                            <input type="text" class="form-control" max="3" name="nationality" value="{{Auth::user()->nationality}}" required>
                        </div>
                        <div class="col mb-3">
                            <label class="form-label">Visa</label>
                            <select class="form-control" name="is_visa" required>
                                <option selected value="" disabled>Choose...</option>
                                <option value="1">VISA</option>
                                <option value="0">N/A</option>
                            </select>
                        </div>
                        <div class="col mb-3">
                            <label class="form-label">DOE Passport</label>
                            <input type="date" class="form-control" name="doe_passport" value="{{Auth::user()->doe_passport}}" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-end">SAVE</button>
                  </form>
            </div>
        </div>

    </section>
</div>
@endsection