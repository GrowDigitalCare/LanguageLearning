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
                <h4 class="card-title">Edit Course  </h4>
              </div>
              <div class="card-content">
                <div class="card-body">

                  <form class="form form-vertical" action="{{ route('course-update', $course->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="tittle">Select Language</label>
                                    <fieldset class="form-group">
                                        <select class="form-select" id="basicSelect" name="language_id">
                                            @foreach($language as $language)
                                                <option value="{{ $language->id }}" @if($course->language_id == $language->id) selected @endif>
                                                    {{ $language->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="tittle">Course Topic Title</label>
                                    <input type="text" class="form-control"
                                    value="{{ $course->title }}" name="title"
                                     placeholder="Course Topic Title" value="{{ old('title') }}" />
                                    @error('title')
                                    <div class="text-danger text-sm"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>

                          <div class="col-12">
                            <div class="form-group">
                                <label for="tittle">Course Duration</label>
                                <input type="text" class="form-control" name="course_duration"
                                 placeholder="Course Duration Name"  value="{{ $course->course_duration }}" />
                                @error('course_duration')
                                <div class="text-danger text-sm"><small>{{ $message }}</small></div>
                                @enderror
                            </div>
                        </div>






                      <div class="col-12">
                        <div class="form-group">

                            <label for="image">Image</label>
                    <input type="file" class="form-control"  name="image" >
                    <img style="height:50px; width:50px;" src="{{asset('/uploads/course/'.$course->image)}}" alt="">


                        </div>
                    </div>

                    <div class="col-12">
                      <div class="form-group">
                          <label for="level"> Level</label>
                          <fieldset class="form-group">
                              <select class="form-select" id="level" name="level">
                                  <option value="Basic" @if($course->level == 'Basic') selected @endif>
                                      Basic
                                  </option>
                                  <option value="Intermediate" @if($course->level == 'Intermediate') selected @endif>
                                      Intermediate
                                  </option>
                                  <option value="Expert" @if($course->level == 'Expert') selected @endif>
                                      Expert
                                  </option>
                              </select>
                          </fieldset>
                      </div>
                  </div>


                  <div class="col-12">
                    <div class="form-group">
                        <label for="tittle"> Price</label>
                        <input type="number" class="form-control" name="price" value="{{ $course->price }}"
                         />
                        @error('price')
                        <div class="text-danger text-sm"><small>{{ $message }}</small></div>
                        @enderror
                    </div>
                </div>




                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea class="form-control descriptionid"
                        placeholder="Enter Description"  row="3"
                        name="description">{{ $course->description}}</textarea>

                    </div>
                </div>


                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" name="submit" class="btn btn-primary me-1 mb-1">
                                    Update  Course
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

@endsection
