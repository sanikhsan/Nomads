@extends('admin.layouts.app')

@section('title', 'Travel Packages')

@section('admin-content')

<div class="page-heading">
    <div class="page-title">
        <div class="row mb-4">
            <div class="col-6 col-md-6 order-md-1 order-first">
                <h3>Travel Packages</h3>
            </div>
            <div class="col-6 col-md-6 order-md-2 order-last">
                <nav class="breadcrumb-header float-end">
                    <a href="{{route('admin.travels.create')}}" class="btn btn-primary"> Add New Travel</a>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Travel Packages List</h5>
            </div>
            @include('admin.components.alert')
            <div class="card-body">
                <table class="table table-striped" id="TravelPackage">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Title</th>
                            <th>Location</th>
                            <th>Departure Data</th>
                            <th>Type</th>
                            <th colspan="2" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($travels as $travel)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$travel->title}}</td>
                            <td>{{$travel->location}}</td>
                            <td>{{$travel->departured_date}}</td>
                            <td>{{$travel->type}}</td>
                            <td>
                                <a href="{{route('admin.travels.edit', $travel)}}" class="btn btn-success float-end px-4">Edit</a>
                            </td>
                            <td>
                                <form action="{{route('admin.travels.destroy', $travel)}}" method="POST">
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
    let TravelPackage = document.querySelector('#TravelPackage');
    let dataTable = new simpleDatatables.DataTable(TravelPackage);
</script>

@if (session('success'))
<script>
    Swal.fire(
    'Success!',
    'New Travel Package has been Created!',
    'success'
    )
</script>
@endif
@endpush