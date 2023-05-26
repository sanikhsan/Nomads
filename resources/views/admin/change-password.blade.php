@extends('admin.layouts.app')
@section('title', 'Update Password')

@section('admin-content')
<div class="page-heading">
    <div class="page-title">
        <div class="row mb-4">
            <div class="col-12 col-md-12 order-md-1 order-first">
                <h3>Admin Password Configuration</h3>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Admin Update Password</h5>
            </div>
            @include('admin.components.alert')
            <div class="card-body">
                <form action="{{route('admin.password.update')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label class="form-label">Current Password</label>
                      <input type="password" class="form-control" name="current_password" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" required>
                    </div>
                    <button type="submit" class="btn btn-primary float-end">SAVE</button>
                  </form>
            </div>
        </div>
    </section>
</div>
@endsection