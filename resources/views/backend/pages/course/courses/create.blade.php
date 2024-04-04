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
                <h4 class="card-title">Course  Form</h4>
              </div>
              <div class="card-content">
                <div class="card-body">

                  <form id="your-form-id" class="form form-vertical" action="{{ route('course-store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                            <label for="tittle">Select Language </label>
                                    <fieldset class="form-group">
                                        <select class="form-select" id="basicSelect" name="language_id">
                                            @foreach($language as $language)
                                                <option value="{{ $language->id }}">{{ $language->name }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="tittle">Title</label>
                                    <input type="text" class="form-control" name="title"
                                     placeholder="SubCategory  Name" value="{{ old('title') }}" />
                                    @error('title')
                                    <div class="text-danger text-sm"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                  <label for="tittle">Course Duration</label>
                                  <input type="text" class="form-control" name="course_duration"
                                   placeholder="Course Duration Name" value="{{ old('course_duration') }}" />
                                  @error('course_duration')
                                  <div class="text-danger text-sm"><small>{{ $message }}</small></div>
                                  @enderror
                              </div>
                          </div>



                        <div class="col-12">
                          <div class="form-group">
                              <label for="image">Image</label>
                              <input type="file" class="form-control" name="image" placeholder="Image"
                               value="{{ old('image') }}" />
                              @error('image')
                              <small class="text-danger">{{ $message }}</small>
                              @enderror
                          </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group">
                            <label for="tittle">Difficulty Level</label>
                            <fieldset class="form-group">
                                <select class="form-select" id="basicSelect" name="level">
                                    <option value="Basic">Basic</option>
                                    <option value="Intermediate">Intermediate</option>
                                    <option value="Expert">Expert</option>
                                </select>
                            </fieldset>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="price"> Price</label>
                            <input type="number" class="form-control" name="price" value="{{ old('price') }}" />
                            @error('price')
                            <div class="text-danger text-sm"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                     </div>


                     <div class="col-12">
                        <div class="form-group">
                            <label class="form-label">Description</label>
                            <textarea class="form-control descriptionid1" placeholder="Enter Description"  row="3" name="description"></textarea>
                        </div>
                        @error('description')
                        <div class="text-danger text-sm"><small>{{ $message }}</small></div>
                    @enderror
                    </div>
              
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" name="submit" class="btn btn-primary me-1 mb-1">
                                    Add Course
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
        // Your CKEditor configuration options, if any
    });

    // Update form submission to include 'editor' CKEditor content
    document.getElementById('your-form-id').addEventListener('submit', function() {
        var editorContent = CKEDITOR.instances.editor.getData();
        document.getElementById('hidden-editor-input').value = editorContent;
    });


</script>

@endsection
