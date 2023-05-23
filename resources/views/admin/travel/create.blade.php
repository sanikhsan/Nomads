@extends('admin.layouts.app')
@section('title', 'Add Travel Package')

@section('admin-content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-first mb-4">
                <h3>Add new Travel Package</h3>
            </div>
        </div>
    </div>
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">New Travel Information</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{route('admin.travels.store')}}" method="POST" class="form">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title" value="{{old('title')}}" required>
                                            <label for="floatingInput">Title</label>
                                            @error('title')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" placeholder="Location" value="{{old('location')}}" required>
                                            <label for="floatingInput">Location</label>
                                            @error('location')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control @error('about') is-invalid @enderror" name="about" placeholder="About" style="height: 100px" required>{{old('about')}}</textarea>
                                            <label for="floatingTextarea">About</label>
                                            @error('about')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="featured_event" class="form-control @error('featured_event') is-invalid @enderror" placeholder="Featured Event" value="{{old('featured_event')}}" required>
                                            <label for="floatingInput">Featured Event</label>
                                            @error('featured_event')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="language" class="form-control @error('language') is-invalid @enderror" placeholder="Language" value="{{old('title')}}" required>
                                            <label for="floatingInput">Language</label>
                                            @error('language')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="foods" class="form-control @error('foods') is-invalid @enderror" placeholder="Foods" value="{{old('foods')}}" required>
                                            <label for="floatingInput">Foods</label>
                                            @error('foods')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-floating mb-3">
                                            <input type="date" name="departured_date" class="form-control @error('departured_date') is-invalid @enderror" placeholder="Departure Date" value="{{old('departured_date')}}" required>
                                            <label for="floatingInput">Departure Date</label>
                                            @error('departured_date')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="duration" class="form-control @error('duration') is-invalid @enderror" placeholder="Duration" value="{{old('duration')}}" required>
                                            <label for="floatingInput">Duration</label>
                                            @error('duration')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="type" class="form-control @error('type') is-invalid @enderror" placeholder="Type" value="{{old('type')}}" required>
                                            <label for="floatingInput">Type</label>
                                            @error('type')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-floating mb-3">
                                            <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Price" value="{{old('price')}}" required>
                                            <label for="floatingInput">Price</label>
                                            @error('price')
                                            <div class="invalid-feedback">
                                                <i class="bx bx-radio-circle"></i>
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary m-1">Save</button>
                                        <button type="reset" class="btn btn-light-secondary m-1">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection