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

                                    <form class="form form-vertical" method="post"
                                          action="{{ route('test-update', $test->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="languageid">Select language</label>
                                                        <select class="form-select" id="languageid" name="languageid">
                                                            @foreach ($languages as $f)
                                                                <option value="{{ $f->id }}"
                                                                    @if($f->id == $test->languageid) selected @endif>{{ $f->name }}</option>
                                                            @endforeach
                                                        </select>
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
                                                        <textarea name="description" class="form-control descriptionid1" id=""
                                                                  cols="3" rows="3"
                                                                  required>{{ $test->description }}</textarea>
                                                        @error('description')
                                                        <div class="text-danger text-sm"><small>{{ $message }}</small>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                {{-- <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="time_dur">Test Duration</label>
                                                        <input type="text" class="form-control" value="{{ $test->time_dur }}"
                                                               name="time_dur" placeholder="Test Duration"/>
                                                        @error('time_dur')
                                                        <div class="text-danger text-sm"><small>{{ $message }}</small>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div> --}}

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

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="level">Difficulty Level</label>
                                                        <fieldset class="form-group">
                                                            <select class="form-select" id="level" name="level">
                                                                <option value="beginner" @if($test->level == 'beginner') selected @endif>
                                                                    Beginner
                                                                </option>
                                                                <option value="intermediate" @if($test->level == 'intermediate') selected @endif>
                                                                    Intermediate
                                                                </option>
                                                                <option value="expert" @if($test->level == 'expert') selected @endif>
                                                                    Expert
                                                                </option>
                                                            </select>
                                                        </fieldset>
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
            $('#department_id').change(function () {
                var departmentId = $(this).val();
    
                // Make an AJAX request to get subjects based on the selected department
                $.ajax({
                    type: 'GET',
                    url: '/get-subjects/' + departmentId, // Create a route for this URL in your web.php
                    success: function (data) {
                        // Clear existing options
                        $('#subject_id').empty();
    
                        // Add a default option
                        $('#subject_id').append('<option value="">Select Subject</option>');
    
                        // Add new options based on the response
                        $.each(data, function (key, value) {
                            $('#subject_id').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endsection
