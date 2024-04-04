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
                <h4 class="card-title">Edit Language </h4>
              </div>
              <div class="card-content">
                <div class="card-body">

                  <form class="form form-vertical" action="{{ route('language-update', $language->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <div class="row">

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="tittle">Name</label>
                                    <input type="text" class="form-control" value="{{ $language->name }}" name="name" placeholder="Course Langauge Name" value="{{ old('name') }}" />
                                    @error('name')
                                    <div class="text-danger text-sm"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            </div>


                          <div class="col-12">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control"  name="image" >
                                <img style="height:50px; width:50px;" src="{{asset('/uploads/language/'.$language->image)}}" alt="">

                            </div>
                        </div>

                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" name="submit" class="btn btn-primary me-1 mb-1">
                                    Update Course Language
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
