@extends('frontend.layouts.layout')
@section("title")

<head>
    <title>{{ $lecture->title }} | BrainBattleAcademy</title>
    <meta name="description" content="{{ $lecture->title }} Page" />
    <meta name="keywords" content="BrainBattleAcademy" />
</head>
@endsection
@section("content")
<div class="tution sp_bottom_100 sp_top_50">
    <div class="container-fluid full__width__padding">
        <div class="row">
            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12" data-aos="fade-up">

                <div class="accordion content__cirriculum__wrap" id="accordionExample">
                    @foreach($relatedLectures as $index => $relatedLecture)
                   
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading{{ $index }}">
                            <button class="accordion-button collapsed"
                             type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}"
                              aria-expanded="false" aria-controls="collapse{{ $index }}">
                               {{ $relatedLecture->title }}
                            </button>
                        </h2>
                        <div id="collapse{{ $index }}" class="accordion-collapse collapse"
                         aria-labelledby="heading{{ $index }}" data-bs-parent="#accordionExample">

                            <div class="accordion-body">

                                <div class="scc__wrap">
                                    <div class="scc__info">
                                        <i class="icofont-video-alt"></i>
                                        <h5> <a href="lesson-2.html"><span>Video : {{ $relatedLecture->title }}</span></a></h5>
                                    </div>
                                    <div class="scc__meta">
                                        {{-- <strong>7.00</strong> --}}
                                        <a href="{{ route('lesson.video', ['slug' => $relatedLecture->slug]) }}"><span class="question"><i class="icofont-eye"></i> Preview</span></a>
                                        
                                    </div>
                                </div>
                                <div class="scc__wrap">
                                    <div class="scc__info">
                                        <i class="icofont-file-text"></i>
                                       <p>{!! html_entity_decode($relatedLecture->description) !!}</p>
                                    </div>
                                </div>
                               
                            </div>

                        </div>
                    </div>
                   
                    @endforeach
         
                </div>
            </div>
            <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12" data-aos="fade-up">					
                <div class="lesson__content__main">
                    <div class="lesson__content__wrap">
                        <h3>Video Content lesson {{ $lecture->title }}</h3>
                        <span><a href="course-details.html">Close</a></span>
                    </div>
                    
                    <div class="plyr__video-embed rbtplayer">
                        <iframe src="{{ getYoutubeEmbedUrl($lecture->video_link) }}" allowfullscreen allow="autoplay" style="width: 100%;height: 500px"></iframe>
                    </div>
                </div>
            </div>
            </div>

        </div>
    </div>
</div>
@endsection