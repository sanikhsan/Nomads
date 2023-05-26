@extends('customer.layouts.app')
@section('title', 'Upload Bukti Transfer')

@section('customer-content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-4">
                <h3>Upload Transfer Image</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('customer.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Upload Transfer Image</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card">
                    <form action="{{route('customer.transaction.update', $transaction)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h5 class="card-title">Konfirmasi Pesanan Paket Travel</h5>
                        </div>
                        @include('customer.components.alert')
                        <div class="card-content">
                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <label class="input-group-text">Travel Package Name :</label>
                                    <input type="hidden" class="form-control" name="travel_packages_id" value="{{$transaction->travel_packages_id}}">
                                    <select class="form-select" name="travel_packages_id" disabled>
                                        <option value="{{$transaction->travel_packages_id}}" selected>{{$transaction->TrxTravel->title}}</option>
                                    </select>
                                </div>
                                <!-- File uploader with image preview -->
                                <input type="file" name="image" class="filepond-update" required data-max-file-size="5MB">
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary m-1">Save</button>
                                    <a href="{{route('customer.dashboard')}}" class="btn btn-light-secondary m-1">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('addons-style')
<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
@endpush

@push('addons-script')
<!-- filepond validation -->
<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>

<!-- image editor -->
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<!-- filepond -->
<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
<script>
    // register desired plugins...
    FilePond.registerPlugin(
        // validates the size of the file...
        FilePondPluginFileValidateSize,
        // validates the file type...
        FilePondPluginFileValidateType,
        // preview the image file type...
        FilePondPluginImagePreview,
    );

    // Filepond: Image Preview

    FilePond.create(document.querySelector('.filepond-update'), {
        server: {
            process: '{{route('customer.transaction.upload')}}',
            revert: '{{route('customer.transaction.delete')}}',
            headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        },
        acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
        allowImagePreview: true,
        // allowImageFilter: false,
        // allowImageExifOrientation: false,
        // allowImageCrop: false,
        // fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
        //     // Do custom type detection here and return with promise
        //     resolve(type);
        // })
    });
</script>
@endpush