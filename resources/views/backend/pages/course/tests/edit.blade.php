@extends('backend.layouts.layout')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/flatpickr.min.js"></script>
<div id="main">
    @if(Session::has('success'))
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

    <!-- Edit an existing test form -->
    <div class="container ">
        <div class="page-heading">
            <section id="basic-vertical-layouts">
                <div class="row match-height">
                    <div class="col-md-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Test</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">

                                    <form class="form form-vertical your-form-id" method="post"
                                          action="{{ route('test-update', $test->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="course_id">Select Department</label>
                                                        <select class="form-select" id="course_id" name="course_id">
                                                            @foreach ($courses as $courses)
                                                                <option value="{{ $courses->id }}"
                                                                    @if($courses->id == $test->course_id) selected @endif>{{ $courses->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>



                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="lecture_id">Select Lecture</label>
                                                        <fieldset class="form-group">
                                                            <select class="form-select" id="lecture_id" name="lecture_id">
                                                                @foreach($lectures as $lectures)
                                                                    <option value="{{ $lectures->id }}"
                                                                            @if($lectures->id == $test->lecture_id) selected @endif>{{ $lectures->title }}</option>
                                                                @endforeach
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="title">Title</label>
                                                        <input type="text" class="form-control" value="{{ $test->title }}"
                                                               name="title" placeholder="Title" />
                                                        @error('title')
                                                        <div class="text-danger text-sm"><small>{{ $message }}</small>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Description</label>
                                                        <textarea class="form-control descriptionid1" placeholder="Enter Description"  row="3" name="description">{{ $test->description }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="time_dur">Test Duration</label>
                                                        <input type="text" id="time" class="form-control" value="{{ $test->time_dur }}"
                                                               name="time_dur" placeholder="Test Duration"/>
                                                        @error('time_dur')
                                                        <div class="text-danger text-sm"><small>{{ $message }}</small>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="total_marks">Total Marks</label>
                                                        <input type="text" class="form-control"
                                                               value="{{ $test->total_marks }}" name="total_marks"
                                                               placeholder="Total Marks"/>
                                                        @error('total_marks')
                                                        <div class="text-danger text-sm"><small>{{ $message }}</small>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="total_mcq">Total Mcqs</label>
                                                        <input type="text" class="form-control" name="total_mcq"
                                                               value="{{ $test->total_mcq }}" placeholder="Total Mcqs"/>
                                                        @error('total_mcq')
                                                        <div class="text-danger text-sm"><small>{{ $message }}</small>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="pass_marks">Passing Mark</label>
                                                        <input type="text" class="form-control" name="pass_marks"
                                                               value="{{ $test->pass_marks }}" placeholder="Passing Mark"/>
                                                        @error('pass_marks')
                                                        <div class="text-danger text-sm"><small>{{ $message }}</small>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>



                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" name="submit"
                                                            class="btn btn-primary me-1 mb-1">
                                                        Update Test
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
<script src="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
<link href="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>

<script>
    var timepicker = new TimePicker('time', {
      lang: 'en',
      theme: 'dark'
    });
    timepicker.on('change', function(evt) {

      var value = (evt.hour || '00') + ':' + (evt.minute || '00');
      evt.element.value = value;

    });
    </script>
      <!-- Include CKEditor script -->
<!-- Include CKEditor script -->
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

<!-- Initialize CKEditor -->
<script>
    CKEDITOR.replace('editor', {
        // Your CKEditor configuration options for 'description', if any
    });

    CKEDITOR.replace('meta_description_editor', {
        // Your CKEditor configuration options for 'meta_description', if any
    });

    // Update form submission to include CKEditor content
    document.querySelector('form').addEventListener('submit', function() {
        var editorContent = CKEDITOR.instances.editor.getData();
        document.getElementById('hidden-editor-input').value = editorContent;

        var metaDescriptionContent = CKEDITOR.instances.meta_description_editor.getData();
        document.getElementById('hidden_meta_description_input').value = metaDescriptionContent;
    });
</script>

    <script>
        flatpickr("#time_dur", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
        });

        $(document).ready(function () {
            // Add an ID to your form for easy targeting
            $('#test-form').submit(function () {
                var minutes = $('#time_dur').val();
                // Store the total time in a hidden input field
                $('<input>').attr({
                    type: 'hidden',
                    id: 'total-time',
                    name: 'total_time',
                    value: minutes
                }).appendTo('#test-form');
            });
        });
    </script>


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

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
