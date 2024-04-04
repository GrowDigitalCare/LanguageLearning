
@extends('frontend.layouts.layout')
@section("title")

<head>
        
    <title>{{ $courseDetails->course->title }} | BrainBattleAcademy</title>
    <meta name="description" content="{{html_entity_decode($courseDetails->course_description ) }}" />
   
    <meta name="keywords" content="{{ $courseDetails->course->title}}" />
    <meta property="og:image"
        content="http://brainbattleacademy.com/uploads/coursedetail/{{ $courseDetails->image }}" />
    <meta property="og:url" content="http://brainbattleacademy.com/course_detail/{{ $courseDetails->slug }}}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $courseDetails->course->title }}">
    <meta property="og:site_name" content="Digital Banking Zone">
    <script src="https://www.youtube.com/iframe_api"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   
</head>
@endsection
@section("content")


<div class="breadcrumbarea breadcrumbarea--3">

    <div class="container">
        <div class="row">
            <div class="col-xl-12">


                <div class="breadcrumb__content__wraper" data-aos="fade-up">
                    <div class="breadcrumb__inner text-start">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Course-Details 3</li>
                        </ul>
                    </div>
                </div>

                <div class="course__details__top--2">

                    <div class="course__button__wraper" data-aos="fade-up">
                        <div class="course__button">
                            <a href="#">{{ $courseDetails->course->level }}</a>
                            <a class="course__2" href="#">{{ $courseDetails->course->price ?? 'N/A' }}</a>
                        </div>
                    </div>
                    <div class="course__details__heading" data-aos="fade-up">
                        <h3>{{ $courseDetails->course->title }}</h3>
                    </div>
                    <div class="course__details__price" data-aos="fade-up">
                        <ul>
                            <li>
                                <div class="course__details__date">
                                    <i class="icofont-book-alt"></i> {{ $courseDetails->lectures->count() }} Lectures
                                </div>

                            </li>
                            <li>
                                <div class="course__star">
                                    <i class="icofont-star"></i>
                                    <i class="icofont-star"></i>
                                    <i class="icofont-star"></i>
                                    <i class="icofont-star"></i>
                                    <i class="icofont-star"></i>
                                    <span>(44)</span>
                                </div>
                            </li>
                            <li>
                                <div class="course__date">
                                    <p>Last Update:<span> Sep 29, 2024</span></p>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="blogarae__img__2 course__details__img__2" data-aos="fade-up">
                        <img loading="lazy"  src="{{ asset('/uploads/coursedetail/' . $courseDetails->image) }}" alt="blog">

                        <div class="registerarea__content course__details__video">
                            <div class="registerarea__video">
                                {{-- <div class="video__pop__btn">
                                    <a class="video-btn" href="https://www.youtube.com/watch?v=vHdclsdkp28"> 
                                        <img loading="lazy"  src="{{asset('assets')}}/img/icon/video.png" alt=""></a>
                                </div> --}}


                            </div>
                        </div>
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

<div class="blogarea__2 sp_top_100 sp_bottom_100">
    <div class="container">
        <div class="row">

            <div class="col-xl-8 col-lg-8">


                <div class="blog__details__content__wraper">

                    <div class="course__details__tab__wrapper" data-aos="fade-up">
                        <div class="row">
                            <div class="col-xl-12">
                                <ul class="nav  course__tap__wrap" id="myTab" role="tablist">

                                    <li class="nav-item" role="presentation">
                                        <button class="single__tab__link" data-bs-toggle="tab" data-bs-target="#projects__two" type="button"><i class="icofont-book-alt"></i>Curriculum</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="single__tab__link" data-bs-toggle="tab" data-bs-target="#projects__one" type="button"><i class="icofont-paper"></i>Description</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="single__tab__link active" data-bs-toggle="tab" data-bs-target="#projects__three" type="button"><i class="icofont-star"></i>Reviews</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="single__tab__link" data-bs-toggle="tab" data-bs-target="#projects__four" type="button"><i class="icofont-teacher"></i>Instructor</button>
                                    </li>


                                </ul>
                            </div>
                        </div>
                        <div class="tab-content tab__content__wrapper" id="myTabContent">
                            <div class="tab-pane fade " id="projects__two" role="tabpanel" aria-labelledby="projects__two">

                                <div class="accordion content__cirriculum__wrap" id="accordionExample">
                                 
                                    @if ($courseDetails->lectures)
                                    @forelse($courseDetails->lectures as $index => $lecture)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading{{ $index }}">
                                            <button class="accordion-button"
                                             type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}"
                                              aria-expanded="true" aria-controls="collapse{{ $index }}">
                                                {{ $lecture->title }} 
                                                {{-- <span>02hr 35min</span> --}}
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $index }}" class="accordion-collapse collapse show"
                                         aria-labelledby="heading{{ $index }}" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">


                                                <div class="scc__wrap">
                                                    <div class="scc__info">
                                                        <i class="icofont-video-alt"></i>
                                                        <h5> <span>Video :</span> {{ $lecture->title }}.</h5>
                                                    </div>
                                                    <div class="scc__meta">
                                                        {{-- <span class="time"> <i class="icofont-clock-time"></i> 22 minutes</span> --}}
                                                        <a href="{{ route('lesson.video', ['slug' => $lecture->slug]) }}"><span class="question"><i class="icofont-eye"></i> Preview</span></a>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                                        <p>No lectures available.</p>
                                                    @endforelse
                                                @else
                                                    <p>No lectures available.</p>
                                                @endif

                                </div>

                            </div>

                            <div class="tab-pane fade" id="projects__one" role="tabpanel" aria-labelledby="projects__one">
                                <div class="experence__heading">
                                    <h5> Course Description</h5>
                                </div>
                                <div class="experence__description">
                                    <p class="description__1">{!! html_entity_decode($courseDetails->course_description) !!}
                                    </p>

                                  
                                </div>
                                <div class="experence__heading">
                                    <h5> What You’ll Learn From This Course</h5>
                                </div>
                                <div class="experence__description">
                                    <p class="description__1">{!! html_entity_decode($courseDetails->what_you_will_learn) !!}
                                    </p>

                                  
                                </div>
                                <div class="experence__heading">
                                    <h5> Certification</h5>
                                </div>
                                <div class="experence__description">
                                    <p class="description__1">{!! html_entity_decode($courseDetails->certification_description) !!}
                                    </p>

                                  
                                </div>
                            </div>



                            <div class="tab-pane fade active show" id="projects__three" role="tabpanel" aria-labelledby="projects__three">

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="review__box">
                                            <div class="review__number">5.0</div>
                                            <div class="review__icon">
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                                <i class="icofont-star"></i>
                                            </div>
                                            <span>(17 Reviews)</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col--30">
                                        <div class="review__wrapper">

                                            <div class="single__progress__bar">
                                                <div class="rating__text">
                                                    5 <i class="icofont-star"></i>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="rating-value">10</span>
                                            </div>

                                            <div class="single__progress__bar">
                                                <div class="rating__text">
                                                    4 <i class="icofont-star"></i>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="rating-value">5</span>
                                            </div>

                                            <div class="single__progress__bar">
                                                <div class="rating__text">
                                                    3 <i class="icofont-star"></i>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="rating-value">3</span>
                                            </div>

                                            <div class="single__progress__bar">
                                                <div class="rating__text">
                                                    2 <i class="icofont-star"></i>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="rating-value">2</span>
                                            </div>

                                            <div class="single__progress__bar">
                                                <div class="rating__text">
                                                    1 <i class="icofont-star"></i>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="rating-value">1</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="property__facts__feature property__facts__feature__2 ">
                                    <h4>Customer Reviews</h4>



                                    <ul class="property__comment">
                                        <li class="property__comment__list">
                                            <div class="property__comment__img">
                                                <img loading="lazy"  src="{{asset('assets')}}/img/teacher/teacher__2.png" alt="Image">
                                            </div>
                                            <div class="property__comment__comment">
                                                <h6><a href="#">Adam Smit</a></h6>
                                                <div class="property__sidebar__icon">
                                                    <ul>
                                                        <li><i class="icofont-star"></i></li>
                                                        <li><i class="icofont-star"></i></li>
                                                        <li><i class="icofont-star"></i></li>
                                                        <li><i class="icofont-star"></i></li>
                                                        <li><i class="icofont-star"></i></li>
                                                    </ul>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, omnis fugit corporis iste magnam ratione.</p>
                                                <span class="property__comment__reply__btn">September 2, 2024</span>
                                            </div>

                                        </li>
                                        <li class="property__comment__list">
                                            <div class="property__comment__img">
                                                <img loading="lazy"  src="{{asset('assets')}}/img/teacher/teacher__1.png" alt="Image">
                                            </div>
                                            <div class="property__comment__comment">
                                                <h6><a href="#">Adam Smit</a></h6>
                                                <div class="property__sidebar__icon">
                                                    <ul>
                                                        <li><i class="icofont-star"></i></li>
                                                        <li><i class="icofont-star"></i></li>
                                                        <li><i class="icofont-star"></i></li>
                                                        <li><i class="icofont-star"></i></li>
                                                        <li><i class="icofont-star"></i></li>
                                                    </ul>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, omnis fugit corporis iste magnam ratione.</p>
                                                <span class="property__comment__reply__btn">September 2, 2024</span>
                                            </div>

                                        </li>
                                        <li class="property__comment__list">
                                            <div class="property__comment__img">
                                                <img loading="lazy"  src="{{asset('assets')}}/img/teacher/teacher__3.png" alt="Image">
                                            </div>
                                            <div class="property__comment__comment">
                                                <h6><a href="#">Adam Smit</a></h6>
                                                <div class="property__sidebar__icon">
                                                    <ul>
                                                        <li><i class="icofont-star"></i></li>
                                                        <li><i class="icofont-star"></i></li>
                                                        <li><i class="icofont-star"></i></li>
                                                        <li><i class="icofont-star"></i></li>
                                                        <li><i class="icofont-star"></i></li>
                                                    </ul>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, omnis fugit corporis iste magnam ratione.</p>
                                                <span class="property__comment__reply__btn">September 2, 2024</span>
                                            </div>

                                        </li>
                                    </ul>

                                </div>

                                <form action="#" class="add__a__review__wrapper">
                                    <h4>Add a Review</h4>
                                    <div class="add__a__review">
                                        <h6>Your Ratings:</h6>
                                        <div class="property__sidebar__icon">
                                            <ul>
                                                <li><i class="icofont-star"></i></li>
                                                <li><i class="icofont-star"></i></li>
                                                <li><i class="icofont-star"></i></li>
                                                <li><i class="icofont-star"></i></li>
                                                <li><i class="icofont-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="add__a__review__input">
                                        <textarea placeholder="Type your comments...."></textarea>
                                    </div>
                                    <div class="add__a__review__input">
                                        <input type="text" placeholder="Type your name....">
                                    </div>
                                    <div class="add__a__review__input">
                                        <input type="email" placeholder="Type your email....">
                                    </div>
                                    <div class="add__a__review__input">
                                        <input type="text" name="website" placeholder="Type your website....">
                                    </div>
                                    <label class="mb-0"><input type="checkbox" name="agree"> Save my name, email, and website in this browser for the next time I comment.</label>
                                    <div class="add__a__review__button">
                                        <button class="default__button" type="submit">Submit</button>
                                    </div>
                                </form>

                            </div>

                            <div class="tab-pane fade" id="projects__four" role="tabpanel" aria-labelledby="projects__four">
                                <div class="blogsidebar__content__wraper__2 tab__instructor">
                                    <div class="blogsidebar__content__inner__2">
                                        <div class="blogsidebar__img__2">
                                            <img loading="lazy"  src="{{ asset('/uploads/Instructor/' . $courseDetails->instructor->profile_picture) }}" alt="blog">
                                        </div>

                                        <div class="tab__instructor__inner">
                                            <div class="blogsidebar__name__2">
                                                <h5>
                                                    <a href="/instructordetail/{{ $courseDetails->instructor->name }}/{{ $courseDetails->instructor->id }}">{{ $courseDetails->instructor->name }}</a>

                                                </h5>
                                                <p>{{ $courseDetails->instructor->skills }}</p>
                                            </div>
                                            <div class="blog__sidebar__text__2">
                                                <p>{!! html_entity_decode($courseDetails->instructor->bio) !!}</p> </div>
                                            {{-- <div class="blogsidbar__icon__2">
                                                <ul>
                                                    <li>
                                                        <a href="#"><i class="icofont-facebook"></i></a>
                                                    </li>

                                                    <li>
                                                        <a href="#"><i class="icofont-youtube-play"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#"><i class="icofont-instagram"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#"><i class="icofont-twitter"></i></a>
                                                    </li>
                                                </ul>

                                            </div> --}}
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

          

                

                    <div class="online__course__wrap">
                        <div class="instructor__heading__2" data-aos="fade-up">
                            <h3>Author More Courses</h3>
                            <a href="course.html">More Courses...</a>
                        </div>

                        <div class="row instructor__slider__active row__custom__class" data-aos="fade-up">
                            @forelse ($relatedCourses as $relatedCourse)
                                
                           
                            <div class="col-xl-6 column__custom__class">
                                <div class="gridarea__wraper">
                                    <div class="gridarea__img">
                                        <a href="{{ route('course_detail', $relatedCourse->course->slug) }}">
                                            <img loading="lazy"  src="{{ asset('/uploads/course/' . $relatedCourse->course->image) }}" alt="grid"></a>
                                        <div class="gridarea__small__button">
                                            <div class="grid__badge">{{ $relatedCourse->course->level }}</div>
                                        </div>
                                        <div class="gridarea__small__icon">
                                            <a href="#"><i class="icofont-heart-alt"></i></a>
                                        </div>

                                    </div>
                                    <div class="gridarea__content">
                                        <div class="gridarea__list">
                                            <ul>
                                                <li>
                                                    <i class="icofont-money"></i>   {{ $relatedCourse->course->price }}
                                                </li>
                                                <li>
                                                    <i class="icofont-clock-time"></i> {{ $relatedCourse->course->course_duration }}
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="gridarea__heading">
                                            <h3><a href="{{ route('course_detail', $relatedCourse->course->slug) }}">{{ $relatedCourse->course->title }}</a></h3>
                                        </div>
                                        <div class="gridarea__price">
                                            <?php
                                            $course1 = strip_tags($relatedCourse->course->description);
                                            $course2 = Str::limit($course1,80);
                                          
                                           ?>
                                          
                                             
                                          {!! html_entity_decode($course2) !!} 

                                        </div>
                                        <div class="gridarea__bottom">

                                            

                                         
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            @endforelse
                        </div>
                    </div>





                </div>
            </div>


            <div class="col-xl-4 col-lg-4">
                <div class="course__details__sidebar--2">
                    <div class="event__sidebar__wraper" data-aos="fade-up">


                        <!-- <div class="blogarae__img__2 course__details__img__2" data-aos="fade-up">
                            <img loading="lazy"  src="{{asset('assets')}}/img/blog/blog_7.png" alt="blog">

                            <div class="registerarea__content course__details__video">
                                <div class="registerarea__video">
                                    <div class="video__pop__btn">
                                        <a class="video-btn" href="https://www.youtube.com/watch?v=vHdclsdkp28"> <img loading="lazy"  src="{{asset('assets')}}/img/icon/video.png" alt=""></a>
                                    </div>


                                </div>
                            </div>
                        </div> -->

                        <div class="event__price__wraper">

                            <div class="event__price">
                                {{-- {{ $courseDetails->course->title }} --}}
                                 {{-- <del>/ $67.00</del> --}}
                            </div>
                            <div class="event__Price__button">
                                {{-- <a href="#">68% OFF</a> --}}
                            </div>
                        </div>

                        <div class="course__summery__button">
                            <a class="default__button" href="#">{{ $courseDetails->course->price }}</a>
                            <a class="default__button default__button--2" href="#">Buy Now</a>
                            {{-- <span>
                                <i class="icofont-ui-rotation"></i>
                                45-Days Money-Back Guarantee
                            </span> --}}
                        </div>

                        <div class="course__summery__lists">
                            <ul>
                                <li>
                                    <div class="course__summery__item">
                                        <span class="sb_label">Instructor:</span><span class="sb_content">
                                            <a href="instructor-details.html">  {{ $courseDetails->instructor->name }}</a></span>
                                    </div>
                                </li>

                                <li>
                                    <div class="course__summery__item">
                                        <span class="sb_label">Course
                                            Duration</span><span class="sb_content">{{ $courseDetails->course->course_duration }}</span>
                                    </div>
                                </li>

                                {{-- <li>
                                    <div class="course__summery__item">
                                        <span class="sb_label">Lectures</span><span class="sb_content">{{ $lectureCount }}</span>
                                    </div>
                                </li> --}}

                                <li>
                                    <div class="course__summery__item">
                                        <span class="sb_label">Enrolled</span><span class="sb_content">100</span>
                                    </div>
                                </li>

                                <li>
                                    <div class="course__summery__item">
                                        <span class="sb_label">Lectures</span><span class="sb_content">{{ $lectureCount }}</span>
                                    </div>
                                </li>

                                <li>
                                    <div class="course__summery__item">
                                        <span class="sb_label">Skill Level</span><span class="sb_content">{{ $courseDetails->course->level }}</span>
                                    </div>
                                </li>

                                <li>
                                    <div class="course__summery__item">
                                        <span class="sb_label">Language</span><span class="sb_content">{{ $courseDetails->language->name }}</span>
                                    </div>
                                </li>

                                <li>
                                    <div class="course__summery__item">
                                        <span class="sb_label">Quiz</span><span class="sb_content">Yes</span>
                                    </div>
                                </li>

                                <li>
                                    <div class="course__summery__item">
                                        <span class="sb_label">Certificate</span><span class="sb_content">Yes</span>
                                    </div>
                                </li>

                            </ul>
                        </div>
                        <div class="course__summery__button">
                            <p>More inquery about course.</p>
                            <a class="default__button default__button--3" href="tel:+4733378901"><i class="icofont-phone"></i> +47 333 78 901</a>
                        </div>


                    </div>


                    <div class="blogsidebar__content__wraper__2" data-aos="fade-up">

                        <h4 class="sidebar__title">Share This On</h4>
                        <div class="follow__icon">
                            <ul>
                                <?php
                                $url = urlencode("http://brainbattleacademy.com/course_detail/$courseDetails->slug");
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

            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection