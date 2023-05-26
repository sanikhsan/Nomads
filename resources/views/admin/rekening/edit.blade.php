@extends('admin.layouts.app')
@section('title', 'Edit Rekening')

@section('admin-content')
<div class="page-heading">
    <div class="page-title">
        <div class="row mb-4">
            <div class="col-12 col-md-12 order-md-1 order-first">
                <h3>Edit Rekening</h3>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Edit Data Rekening : {{$rekening->nama_rekening}}</h5>
            </div>
            @include('customer.components.alert')
            <div class="card-body">
                <form action="{{route('admin.rekening.update', $rekening)}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                      <label class="form-label">Nama Pemilik Rekening</label>
                      <input type="hidden" class="form-control" name="id" value="{{$rekening->id}}" required readonly>
                      <input type="text" class="form-control" name="nama_rekening" value="{{$rekening->nama_rekening}}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nomor Rekening</label>
                        <input type="number" class="form-control" name="nomor_rekening" value="{{$rekening->nomor_rekening}}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Bank</label>
                        <input type="text" class="form-control" name="nama_bank" value="{{$rekening->nama_bank}}" required>
                    </div>
                    <button type="submit" class="btn btn-primary float-end">SAVE</button>
                  </form>
            </div>
        </div>

    </section>
</div>
@endsection