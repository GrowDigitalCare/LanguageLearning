@extends('backend.layouts.layout')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/flatpickr.min.js"></script>

<div id="main">
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    <div class="container">
        <div class="page-heading">
            <section id="basic-vertical-layouts">
                <div class="row match-height">
                    <div class="col-md-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tests Form</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form id="test-form" class="form form-vertical" action="{{ route('test-store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="course_id">Select Course</label>
                                                        <select class="form-select" id="course_id" name="course_id">
                                                            <option>Please Select</option>
                                                            @foreach ($courses as $course)
                                                                <option value="{{ $course->id }}">{{ $course->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="lecture_id">Select Lecture</label>
                                                        <select class="form-select" id="lecture_id" name="lecture_id">
                                                            <option value="">Select Lecture</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="title">Title</label>
                                                        <input type="text" class="form-control" name="title"
                                                            placeholder="Title" value="{{ old('title') }}" />
                                                        @error('title')
                                                            <div class="text-danger text-sm">
                                                                <small>{{ $message }}</small>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Description</label>
                                                        <textarea class="form-control descriptionid1" placeholder="Enter Description"
                                                            rows="3" name="description"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="time_dur">Test Duration</label>
                                                        <div class="input-group">
                                                            <input type="text" id="time" class="form-control" name="time_dur"
                                                                placeholder="Test Duration (minutes)" value="{{ old('time_dur') }}"
                                                                min="0">
                                                            <span class="input-group-text">Minutes</span>
                                                        </div>
                                                        @error('time_dur')
                                                            <div class="text-danger text-sm">
                                                                <small>{{ $message }}</small>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="total_marks">Total Marks</label>
                                                        <input type="text" class="form-control" name="total_marks"
                                                            placeholder="Total Marks" value="{{ old('total_marks') }}" />
                                                        @error('total_marks')
                                                            <div class="text-danger text-sm">
                                                                <small>{{ $message }}</small>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="total_mcq">Total Mcqs</label>
                                                        <input type="text" class="form-control" name="total_mcq"
                                                            placeholder="Total Mcqs" value="{{ old('total_mcq') }}" />
                                                        @error('total_mcq')
                                                            <div class="text-danger text-sm">
                                                                <small>{{ $message }}</small>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="pass_marks">Passing Mark</label>
                                                        <input type="text" class="form-control" name="pass_marks"
                                                            placeholder="Passing Mark" value="{{ old('pass_marks') }}" />
                                                        @error('pass_marks')
                                                            <div class="text-danger text-sm">
                                                                <small>{{ $message }}</small>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" name="submit" class="btn btn-primary me-1 mb-1">
                                                        Add Test
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

<script src="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
<link href="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet" />

<!-- Include CKEditor script -->
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

<script>
    $(document).ready(function () {
        $('#course_id').change(function () {
            var courseId = $(this).val();

            $.ajax({
                type: 'GET',
                url: '/getlecture/' + courseId,
                success: function (data) {
                    $('#lecture_id').empty().append('<option value="">Select Lecture</option>');
                    $.each(data, function (key, value) {
                        $('#lecture_id').append('<option value="' + key + '">' + value + '</option>');
                    });
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
    });

    var timepicker = new TimePicker('time', {
        lang: 'en',
        theme: 'dark'
    });
    timepicker.on('change', function (evt) {
        var value = (evt.hour || '00') + ':' + (evt.minute || '00');
        evt.element.value = value;
    });
</script>

@endsection
