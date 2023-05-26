@extends('admin.layouts.app')
@section('title', 'Add New Rekening')

@section('admin-content')
<div class="page-heading">
    <div class="page-title">
        <div class="row mb-4">
            <div class="col-12 col-md-12 order-md-1 order-first">
                <h3>Add New Rekening</h3>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Data Rekening</h5>
            </div>
            @include('customer.components.alert')
            <div class="card-body">
                <form action="{{route('admin.rekening.store')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label class="form-label">Nama Pemilik Rekening</label>
                      <input type="text" class="form-control" name="nama_rekening" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nomor Rekening</label>
                        <input type="number" class="form-control" name="nomor_rekening" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Bank</label>
                        <input type="text" class="form-control" name="nama_bank" required>
                    </div>
                    <button type="submit" class="btn btn-primary float-end">SAVE</button>
                  </form>
            </div>
        </div>

    </section>
</div>
@endsection