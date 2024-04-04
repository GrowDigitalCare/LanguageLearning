@extends('backend.layouts.layout')
@section('content')

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
    <div class="container ">
        <div class="page-heading">
            <section id="basic-vertical-layouts">
              <div class="row match-height">
                <div class="col-md-12 col-12">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title"> Edit Sercice Category </h4>
                    </div>
                    <div class="card-content">
                      <div class="card-body">
                        <form class="form form-vertical" action="{{ route('categories-update', $category->id) }}" method="POST" enctype="multipart/form-data">

                          @csrf
                          @method('PUT')
                          <div class="form-body">
                              <div class="row">
                                  <div class="col-12">
                                      <div class="form-group">
                                          <label for="title">Category <Title></Title></label>
                                          <input type="text" name="title" class="form-control" value="{{$category->title}}">

                                      </div>
                                  </div>

                                  <div class="col-12">
                                      <div class="form-group">
                                          <label class="form-label">Location</label>
                                          <input type="text" name="location" value="{{$category->location}}" class="form-control">

                                      </div>
                                  </div>
                                  <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Match Time</label>
                                        <input type="text" name="match_time" value="{{$category->match_time}}" class="form-control">

                                    </div>
                                </div>
                                  <div class="col-12">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input type="file" class="form-control" name="image">
                                            @if($category->image)
                                                <img style="height:50px; width:50px;" src="{{ $category->image }}" alt="">
                                            @else
                                                <span>No image available</span>
                                            @endif
                                        </div>
                                    </div>


                                  <div class="col-12">
                                    <div class="form-group">
                                        <label for="video">Video</label>
                                        <input type="file" class="form-control" name="video">
                                        @if($category->video)
                                            <video width="50" height="50" controls>
                                                <source src="{{ asset('/uploads/category/' . $category->video) }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        @else
                                            <span>No video available</span>
                                        @endif
                                    </div>
                                </div>


                                  <div class="col-12 d-flex justify-content-end">
                                      <button type="submit" name="submit" class="btn btn-primary me-1 mb-1">
                                         Update  Category
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
