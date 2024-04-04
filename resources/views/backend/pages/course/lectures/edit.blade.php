@extends('backend.layouts.layout')
@section('content')

<div id="main">
  @if(Session::has('success'))
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
                <h4 class="card-title"> Edit Subject </h4>
              </div>
              <div class="card-content">
                <div class="card-body">

                  <form class="form form-vertical" action="{{ route('lecture-update', $lecture->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <div class="row">
                          <div class=" mb-3">
                            <div class=" mb-3">
                                <label class=" mb-3">Select Course</label>
                                <select class="form-select" name="course_id" id="floatingSelect"
                                    aria-label="Floating label select example" required>
                                    <option value="">---Select Category Here--</option>
                                    @foreach($course as $course)
                                    <option value="{{ $course->id }}"
                                        @if ($course->id == $lecture->course_id) selected @endif>{{ $course->title }}</option>
                                    @endforeach
                                </select>
                                @error('course_id')
                                    <div class="text-danger text-sm">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                        </div>
                            <div class="col-12">
                              <div class="form-group">
                                  <label for="tittle">Tittle</label>
                                  <input type="text" class="form-control" name="title" placeholder="Tittle" value="{{ $lecture->title }}" />
                                  @error('title')
                                  <div class="text-danger text-sm"><small>{{ $message }}</small></div>
                                  @enderror
                              </div>
                          </div>
                          <div class="col-12">
                              <div class="form-group">
                                  <label for="tittle">Lecture Link</label>
                                  <input type="text" class="form-control" name="video_link" placeholder="Lecture Link" value="{{ $lecture->video_link }}" />
                                  @error('video_link')
                                  <div class="text-danger text-sm"><small>{{ $message }}</small></div>
                                  @enderror
                              </div>
                          </div>

                          <div class="col-12">
                            <div class="form-group">
                                <label class="form-label">Description</label>

                                    <textarea class="form-control descriptionid1" placeholder="Enter Description"
                                      row="3" name="description">{{ $lecture->description }}</textarea>
                            </div>
                        </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" name="submit" class="btn btn-primary me-1 mb-1">
                                    Update Lecture
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

<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

<!-- Initialize CKEditor -->
<script>
    CKEDITOR.replace('editor', {
        // Your CKEditor configuration options for 'course_description', if any
    });

    CKEDITOR.replace('learn_editor', {
        // Your CKEditor configuration options for 'learn_description', if any
    });

    CKEDITOR.replace('certification_editor', {
        // Your CKEditor configuration options for 'certification', if any
    });

    // Update form submission to include CKEditor content
    document.querySelector('form').addEventListener('submit', function() {
        var courseDescriptionContent = CKEDITOR.instances.editor.getData();
        document.getElementById('hidden-editor-input').value = courseDescriptionContent;

        var learnDescriptionContent = CKEDITOR.instances.learn_editor.getData();
        document.getElementById('hidden-learn-editor-input').value = learnDescriptionContent;

        var certificationContent = CKEDITOR.instances.certification_editor.getData();
        document.getElementById('hidden-certification-editor-input').value = certificationContent;
    });
</script>
@endsection
