@extends('admin.layouts.app')
@section('title', 'Edit Travel Package')

@section('admin-content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-first mb-4">
                <h3>Edit Travel Package</h3>
            </div>
        </div>
    </div>
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Travel Information: {{$travel->title}}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{route('admin.travels.update', $travel)}}" method="POST" class="form">
                                @csrf
                                @method('patch')
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title" value="{{old('title') ?: $travel->title}}" required>
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
                                            <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" placeholder="Location" value="{{old('location') ?: $travel->location}}" required>
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
                                            <textarea class="form-control @error('about') is-invalid @enderror" name="about" placeholder="About" style="height: 100px" required>{{old('about') ?: $travel->about}}</textarea>
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
                                            <input type="text" name="featured_event" class="form-control @error('featured_event') is-invalid @enderror" placeholder="Featured Event" value="{{old('featured_event') ?: $travel->featured_event}}" required>
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
                                            <input type="text" name="language" class="form-control @error('language') is-invalid @enderror" placeholder="Language" value="{{old('language') ?: $travel->language}}" required>
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
                                            <input type="text" name="foods" class="form-control @error('foods') is-invalid @enderror" placeholder="Foods" value="{{old('foods') ?: $travel->foods}}" required>
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
                                            <input type="date" name="departured_date" class="form-control @error('departured_date') is-invalid @enderror" placeholder="Departure Date" value="{{old('departured_date') ?: $travel->departured_date}}" required>
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
                                            <input type="text" name="duration" class="form-control @error('duration') is-invalid @enderror" placeholder="Duration" value="{{old('duration') ?: $travel->duration}}" required>
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
                                            <input type="text" name="type" class="form-control @error('type') is-invalid @enderror" placeholder="Type" value="{{old('type') ?: $travel->type}}" required>
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
                                            <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Price" value="{{old('price') ?: $travel->price}}" required>
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
                                        <button type="submit" class="btn-lg btn-primary me-1 mb-1">Save</button>
                                        <button type="reset" class="btn-lg btn-light-secondary me-1 mb-1">Reset</button>
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