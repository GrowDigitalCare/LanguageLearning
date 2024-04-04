@extends('frontend.layouts.layout')
@section("title")
<head>
<title>Instructor {{ $instructor->name }} | BrainBattleAcademy</title>
<meta name="description" content="Instructor Page" />
<meta name="keywords" content="BrainBattleAcademy" />
</head>
@endsection
@section('content')
@if(Session::has('success'))
<div class="alert alert-success">
    {{ Session::get('success') }}
    @php
        Session::forget('success');
    @endphp
</div>
@endif
<div class="breadcrumbarea">

    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb__content__wraper" data-aos="fade-up">
                    <div class="breadcrumb__title">
                        <h2 class="heading">instructor page</h2>
                    </div>
                    <div class="breadcrumb__inner">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Blog page</li>
                        </ul>
                    </div>
                </div>



            </div>
        </div>
    </div>

    <div class="shape__icon__2">
        <img loading="lazy"  class=" shape__icon__img shape__icon__img__1" src="{{asset('assets')}}/img/herobanner/herobanner__1.png" alt="photo">
        <img loading="lazy"  class=" shape__icon__img shape__icon__img__2" src="{{asset('assets')}}/img/herobanner/herobanner__2.png" alt="photo">
        <img loading="lazy"  class=" shape__icon__img shape__icon__img__3" src="{{asset('assets')}}/img/herobanner/herobanner__3.png" alt="photo">
        <img loading="lazy"  class=" shape__icon__img shape__icon__img__4" src="{{asset('assets')}}/img/herobanner/herobanner__5.png" alt="photo">
    </div>

</div>
<!-- breadcrumbarea__section__end-->


<!-- intructor__teacher__start -->
<div class="instructor sp_top_100 sp_bottom_100">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="instructor__sidebar" data-tilt>
                    <div class="instructor__sidebar__img" data-aos="fade-up">
                        <img loading="lazy"  src="{{asset('/uploads/Instructor/'.$instructor->profile_picture)}}" alt="team">
                        <div class="instructor__sidebar__small__img">
                            <img loading="lazy"  src="{{asset('assets')}}/img/about/about_4.png" alt="img">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="instructor__inner__wraper">
                    <div class="instructor__list">
                        <ul>
                            <li data-aos="fade-up">
                                <div class="instructor__heading">
                                    <h3>{{ $instructor->name }}</h3>
                                    <p>{{ $instructor->skills }}</p>
                                </div>
                            </li>
                            <li data-aos="fade-up">
                                <div class="instructor__review">
                                    <span>Review:</span>
                                    <div class="instructor__star">
                                        <i class="icofont-star"></i>
                                        <i class="icofont-star"></i>
                                        <i class="icofont-star"></i>
                                        <i class="icofont-star"></i>
                                        <i class="icofont-star"></i>
                                        <span>(44)</span>
                                    </div>
                                </div>
                            </li>

                            <li data-aos="fade-up">
                                <div class="instructor__follow">
                                    <span>Follow Us:</span>
                                    <div class="instructor__icon">
                                        <ul>
                                            <?php
                                                        $url = urlencode("http://brainbattleacademy.com/instructordetail/$instructor->slug");
                                                        ?>
                                            <li>
                                                <a target="_blank"
                                                            href="https://www.facebook.com/sharer.php?u={{ $url }}"><i class="icofont-facebook"></i></a>
                                            </li>
                
                                            <li>
                                                <a target="_blank"
                                           href="https://api.whatsapp.com/send?phone=&text=<?php urlencode('hi hello'); ?> {{ $url }}"
                                                            target="_blank"><i class="icofont-whatsapp"></i></a>
                                            </li>
                                            <li>
                                                <a target="_blank"
                                                href="https://www.linkedin.com/sharing/share-offsite/?url={{ $url }}"><i class="icofont-linkedin"></i></a>
                                            </li>
                                            <li>
                                                <a target="_blank"
                                                            href="https://twitter.com/share?url={{ $url }}"><i class="icofont-twitter"></i></a>
                                            </li>
                                        
                                        </ul>
                                    </div>
                                </div>
                            </li>

                            <li data-aos="fade-up">


                                <div class="instructor__button">
                                    <a class="default__button" href="#">Follow</a>
                                </div>

                            </li>
                        </ul>
                    </div>
                    <div class="instructor__content__wraper" data-aos="fade-up">
                        <h6>Short Bio</h6>
                        <p>{!! html_entity_decode($instructor->bio ) !!}</p>
                    </div>
                    <div class="online__course__wrap">
                        <div class="instructor__heading__2" data-aos="fade-up">
                            <h3>Online Course</h3>
                        </div>

                        <div class="row instructor__slider__active row__custom__class" data-aos="fade-up">
                          @foreach ($related as $course)
                              
                         
                            <div class="col-xl-6 column__custom__class">
                                <div class="gridarea__wraper">
                                    <div class="gridarea__img">
                                        <a href="{{ route('course_detail', $course->slug) }}"><img loading="lazy" 
                                            src="{{ asset('/uploads/course/' . $course->image) }}" alt="grid"></a>
                                            <div class="gridarea__small__button">
                                                <div class="grid__badge">{{$course->level}}</div>
                                            </div>
                                            <div class="gridarea__small__icon">
                                                <a href="#"><i class="icofont-heart-alt"></i></a>
                                            </div>
    
                                        </div>
                                        <div class="gridarea__content">
                                            <div class="gridarea__list">
                                                <ul>
                                                    <li>
                                                        <i class="icofont-money"></i>   {{ $course->price }}
                                                    </li>
                                                    <li>
                                                        <i class="icofont-clock-time"></i> {{ $course->course_duration }}
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="gridarea__heading">
                                                <h3><a href="{{ route('course_detail', $course->slug) }}">{{$course->title}}</a></h3>
                                            </div>
                                            <div class="gridarea__price">
                                             <p>
                                                <?php
                                                $course1 = strip_tags($course->description);
                                                $course2 = Str::limit($course1,80);
                                              
                                               ?>
                                              
                                                 
                                              {!! html_entity_decode($course2) !!} 
                                             </p>
                                                 {{-- <del>/ $67.00</del> --}}
                                                {{-- <span> <del class="del__2">Free</del></span> --}}
    
                                            </div>
                                        <div class="gridarea__bottom">

                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection