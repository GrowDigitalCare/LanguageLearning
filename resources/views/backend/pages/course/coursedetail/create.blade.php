@extends('backend.layouts.layout')
@section('content')

    <div id="main">
        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Error!</strong> <br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container ">
            <div class="page-heading">
                <section id="basic-vertical-layouts">
                    <div class="row match-height">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Course Detail Form</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card">

                                        <form id="your-form-id" action="{{ route('coursedetail-store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                                        data-bs-target="#home" type="button" role="tab"
                                                        aria-controls="home" aria-selected="true">
                                                        Home
                                                    </button>
                                                </li>

                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="details-tab" data-bs-toggle="tab"
                                                        data-bs-target="#details" type="button" role="tab"
                                                        aria-controls="details" aria-selected="false">
                                                        DETAILS
                                                    </button>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade border p-3 show active" id="home"
                                                    role="tabpanel" aria-labelledby="home-tab">

                                                    <div class=" mb-3">
                                                        <div class=" mb-3">
                                                            <label class=" mb-3">Select Language</label>
                                                            <select class="form-select" name="language_id" id="floatingSelect"
                                                                aria-label="Floating label select example" required>
                                                                <option value="">---Select language Here--</option>
                                                                @foreach($language as $language)
                                                                <option value="{{ $language->id }}">{{ $language->name }}</option>
                                                            @endforeach
                                                            </select>
                                                            @error('language_id')
                                                                <div class="text-danger text-sm">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class=" mb-3">
                                                        <div class=" mb-3">
                                                            <label class=" mb-3">Select Course</label>
                                                            <select class="form-select" name="course_id" id="floatingSelect"
                                                                aria-label="Floating label select example" required>
                                                                <option value="">---Select Course Here--</option>
                                                                @foreach($course as $course)
                                                                <option value="{{ $course->id }}">{{ $course->title }}</option>
                                                            @endforeach
                                                            </select>
                                                            @error('course_id')
                                                                <div class="text-danger text-sm">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class=" mb-3">
                                                        <div class=" mb-3">
                                                            <label class=" mb-3">Select Instructor</label>
                                                            <select class="form-select" name="instructor_id" id="floatingSelect"
                                                                aria-label="Floating label select example" required>
                                                                <option value="">---Select instructor Here--</option>
                                                                @foreach($instructor as $instructor)
                                                                <option value="{{ $instructor->id }}">{{ $instructor->name }}</option>
                                                            @endforeach
                                                            </select>
                                                            @error('instructor_id')
                                                                <div class="text-danger text-sm">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Description</label>
                                                            <textarea class="form-control descriptionid1" placeholder="Enter Description"  row="3" name="course_description"></textarea>
                                                        </div>
                                                        @error('course_description')
                                                        <div class="text-danger text-sm"><small>{{ $message }}</small></div>
                                                    @enderror
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="form-label">What You Learn</label>
                                                            <textarea class="form-control descriptionid1" placeholder="What You Will Learn "  row="3" name="what_you_will_learn"></textarea>
                                                        </div>
                                                        @error('what_you_will_learn')
                                                        <div class="text-danger text-sm"><small>{{ $message }}</small></div>
                                                    @enderror
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Certification</label>
                                                            <textarea class="form-control descriptionid1" placeholder="Certificate "  row="3" name="certification_description"></textarea>
                                                        </div>
                                                        @error('certification_description')
                                                        <div class="text-danger text-sm"><small>{{ $message }}</small></div>
                                                    @enderror
                                                    </div>



                                                </div>

                                                <div class="tab-pane fade border p-3" id="details" role="tabpanel"
                                                    aria-labelledby="details-tab">



                                                    <div class="mb-3">
                                                        <label class="form-label">Upload Images</label>
                                                        <input type="file" multiple name="image" required>
                                                        @error('image')
                                                            <div class="text-danger text-sm">
                                                                <small>{{ $message }}</small>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" name="submit" class="btn btn-primary me-1 mb-1">
                                                    Add Course Detail
                                                </button>
                                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                                    Reset
                                                </button>
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
