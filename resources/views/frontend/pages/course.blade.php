@extends('frontend.layouts.layout')
@section("title")

<head>
    <title>Privacy Policy | Grow Digital Care</title>
    <meta name="description" content="Privacy Policy" />
    <meta name="keywords" content="Growdigitalcare" />
</head>
@endsection
@section("content")

<div class="breadcrumbarea">

    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb__content__wraper" data-aos="fade-up">
                    <div class="breadcrumb__title">
                        <h2 class="heading">Courses Grid</h2>
                    </div>
                    <div class="breadcrumb__inner">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Courses List</li>
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

<!-- course__section__start   -->
<div class="coursearea sp_top_100 sp_bottom_100">
    <div class="container">

        <div class="row">
          

            <div class="col-xl-12">

                <div class="tab-content tab__content__wrapper" id="myTabContent">


                    <div class="tab-pane fade  active show" id="projects__one" role="tabpanel" aria-labelledby="projects__one">

                        <div class="row">

                            @foreach ($course as $course)
                                
                       
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12" data-aos="fade-up">
                                <div class="gridarea__wraper gridarea__wraper__2">
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

            <div class="main__pagination__wrapper" data-aos="fade-up">
                <ul class="main__page__pagination">
                    <li><a class="disable" href="#"><i class="icofont-double-left"></i></a></li>
                    <li><a class="active" href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#"><i class="icofont-double-right"></i></a></li>
                </ul>
            </div>


        </div>

    </div>
</div>
<!-- course__section__end   -->

@endsection