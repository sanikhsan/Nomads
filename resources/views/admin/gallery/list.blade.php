@extends('admin.layouts.app')

@section('title', 'List Gallery Packages')

@section('admin-content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-first mb-4">
                <h3>Travel Packages Galleries</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-last mb-4">
                <nav class="breadcrumb-header float-start float-lg-end">
                    <a href="{{route('admin.gallery.create')}}" class="btn btn-primary"> Add New Image</a>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Gallery List</h5>
            </div>
            @if (Session(null))
            <div class="alert alert-info alert-dismissible fade show m-3" role="alert">
                <strong> Catatan!</strong> Upload Gambar mode Landscape dengan ukuran yang sama agar tampilan rapih!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @include('admin.components.alert')
            <div class="card-body">
                <table class="table table-striped" id="GalleryList">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Travel Name</th>
                            <th class="text-center">Image</th>
                            <th colspan="2" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($galleries as $gallery)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$gallery->Travel->title}}</td>
                            <td class="text-center"><img width="250" src="{{Storage::url($gallery->image)}}" alt="{{Storage::url($gallery->image)}}"></td>
                            <td>
                                <a href="{{route('admin.gallery.edit', $gallery)}}" class="btn btn-success float-end px-4">Edit</a>
                            </td>
                            <td>
                                <form action="{{route('admin.gallery.destroy', $gallery)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="p-3 text-center">
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
<link rel="stylesheet" href="{{asset('admin/vendors/simple-datatables/style.css')}}">
@endpush

@push('addons-script')
<script src="{{asset('admin/vendors/simple-datatables/simple-datatables.js')}}"></script>
<script>
    // Simple Datatable
    let GalleryList = document.querySelector('#GalleryList');
    let dataTable = new simpleDatatables.DataTable(GalleryList);
</script>
@endpush