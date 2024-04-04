@extends('backend.layouts.layout')
@section('content')
    <div id="main">
        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="container ">
            <div class="page-heading">
                <section id="basic-vertical-layouts">
                    <div class="row match-height">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"> Category  Form</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">

                                        <form class="form form-vertical" action="{{ route('categories-store') }}"
                                            method="POST" enctype="multipart/form-data" >
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="tittle"> Category Title </label>
                                                            <input type="text" class="form-control" name="title"
                                                                placeholder="Category Title " value="{{ old('title') }}" />
                                                            @error('title')
                                                                <div class="text-danger text-sm">
                                                                    <small>{{ $message }}</small></div>
                                                            @enderror
                                                        </div>
                                                    </div>



                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="location">Location</label>
                                                            <input type="text" class="form-control" name="location"
                                                                placeholder="Location" value="{{ old('location') }}" />
                                                            @error('location')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="match_time">Match Time</label>
                                                            <input type="text" class="form-control" name="match_time"
                                                                placeholder="Match Time" value="{{ old('match_time') }}" />
                                                            @error('match_time')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="image">Image</label>
                                                            <input type="file" class="form-control" name="image"
                                                                placeholder="Image" value="{{ old('image') }}" />
                                                            @error('image')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="video">Video</label>
                                                            <input type="file" class="form-control" name="video" placeholder="Video" />
                                                            @error('video')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit" name="submit"
                                                            class="btn btn-primary me-1 mb-1">
                                                            Add  Category
                                                        </button>
                                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                                            Reset
                                                        </button>
                                                    </div>
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
        </div>




    </div>
@endsection
