@extends('admin.layouts.app')

@section('title', 'Daftar Rekening')

@section('admin-content')

<div class="page-heading">
    <div class="page-title">
        <div class="row mb-4">
            <div class="col-6 col-md-6 order-md-1 order-first">
                <h3>Daftar Rekening</h3>
            </div>
            <div class="col-6 col-md-6 order-md-2 order-last">
                @if ($rekenings->count() > 2)
                <nav class="breadcrumb-header float-end">
                    <button href="{{route('admin.travels.create')}}" class="btn btn-primary" disabled> Tambah Rekening </button>
                </nav>
                @else
                <nav class="breadcrumb-header float-end">
                    <a href="{{route('admin.rekening.create')}}" class="btn btn-primary"> Tambah Rekening</a>
                </nav>
                @endif
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Daftar Rekening untuk Pembayaran Customer</h5>
            </div>
            @include('admin.components.alert')
            @if ($rekenings->count() > 2)
            <div class="alert alert-info alert-dismissible fade show m-3" role="alert">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
              </svg>
              <strong> Perhatian!</strong> Maksimal Hanya 3 (Tiga) Nomor Rekening! Silahkan Hapus atau Edit Rekening yang ada!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="card-body">
                <table class="table table-striped" id="RekeningList">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Rekening</th>
                            <th>Nomor Rekening</th>
                            <th>Nama Bank</th>
                            <th colspan="2" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rekenings as $rekening)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$rekening->nama_rekening}}</td>
                            <td>{{$rekening->nomor_rekening}}</td>
                            <td>{{$rekening->nama_bank}}</td>
                            <td>
                                <a href="{{route('admin.rekening.edit', $rekening)}}" class="btn btn-success float-end px-4">Edit</a>
                            </td>
                            <td>
                                <form action="{{route('admin.rekening.destroy', $rekening)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
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
<link rel="stylesheet" href="{{asset('admin/vendors/sweetalert2/sweetalert2.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/vendors/simple-datatables/style.css')}}">
@endpush

@push('addons-script')
<script src="{{asset('admin/js/extensions/sweetalert2.js')}}"></script>
<script src="{{asset('admin/vendors/sweetalert2/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('admin/vendors/simple-datatables/simple-datatables.js')}}"></script>
<script>
    // Simple Datatable
    let RekeningList = document.querySelector('#RekeningList');
    let dataTable = new simpleDatatables.DataTable(RekeningList);
</script>

@if (session('success'))
<script>
    Swal.fire(
    'Great!',
    'New Rekening successfully Added!',
    'success'
    )
</script>
@endif
@endpush