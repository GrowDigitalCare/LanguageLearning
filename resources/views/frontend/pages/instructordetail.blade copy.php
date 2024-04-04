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
<div class="edu-breadcrumb-area breadcrumb-style-1 ptb--130 ptb_md--40 ptb_sm--40 bg-image">
    <div class="container eduvibe-animated-shape">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner text-start" style="margin-top: 25px">
                    <div class="page-title">
                        <h3 class="title">Instructor </h3>
                    </div>
                    <nav class="edu-breadcrumb-nav">
                        <ol class="edu-breadcrumb d-flex justify-content-start liststyle">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="separator"><i class="ri-arrow-drop-right-line"></i></li>
                            <li class="breadcrumb-item active" aria-current="page">Instructor</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="shape-dot-wrapper shape-wrapper d-xl-block d-none">
            <div class="shape-dot-wrapper shape-wrapper d-xl-block d-none">
                <div class="shape-image shape-image-1">
                    <img src="{{asset('website')}}/assets/images/shapes/shape-11-07.png" alt="Shape Thumb" />
                </div>
                <div class="shape-image shape-image-2">
                    <img src="{{asset('website')}}/assets/images/shapes/shape-01-02.png" alt="Shape Thumb" />
                </div>
                <div class="shape-image shape-image-3">
                    <img src="{{asset('website')}}/assets/images/shapes/shape-03.png" alt="Shape Thumb" />
                </div>
                <div class="shape-image shape-image-4">
                    <img src="{{asset('website')}}/assets/images/shapes/shape-13-12.png" alt="Shape Thumb" />
                </div>
                <div class="shape-image shape-image-5">
                    <img src="{{asset('website')}}/assets/images/shapes/shape-36.png" alt="Shape Thumb" />
                </div>
                <div class="shape-image shape-image-6">
                    <img src="{{asset('website')}}/assets/images/shapes/shape-05-07.png" alt="Shape Thumb" />
                </div>
            </div>
        </div>
    </div>
</div>

<div class="edu-instructor-profile-area edu-section-gap bg-color-white">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-4 pr--55">

                <div class="instructor-profile-left">
                    <div class="inner">
                        <div class="thumbnail">
                            <img src="{{asset('/uploads/Instructor/'.$instructor->profile_picture)}}" alt="About Images">
                        </div>
                        <div class="content">
                            <h5 class="title">{{ $instructor->name }}</h5>
                            <span class="subtitle">{{ $instructor->skills }}</span>
                            <div class="contact-with-info">
                                <p><span>Email:</span> <a href="#">{{ $instructor->email }}</a></p>
                                <p><span>Phone:</span> <a href="tel:+91 458 654 528">{{ $instructor->phone }}</a></p>
                            </div>
                            <div class="eduvibe-post-share">  
                                <?php
                                $url = urlencode("http://brainbattleacademy.com/instructordetail/$instructor->name/$instructor->id");
                                ?>
                                <a class="linkedin" target="_blank"
                                    href="https://www.linkedin.com/sharing/share-offsite/?url={{ $url }}"><i
                                        class="icon-linkedin"></i></a>
                                <a class="facebook" target="_blank"
                                    href="https://www.facebook.com/sharer.php?u={{ $url }}"><i
                                        class="icon-Fb"></i></a>
                                <a class="twitter" target="_blank"
                                    href="https://twitter.com/share?url={{ $url }}"><i
                                        class="icon-Twitter"></i></a>
                                <a class="whatsapp" href="#"><i class="icon-whatsapp"></i></a>
                                <a href="https://api.whatsapp.com/send?phone=&text=<?php urlencode('hi hello'); ?> {{ $url }}"
                                    target="_blank" title="Share on Whatsapp"
                                    class="btn btn--small btn--secondary btn--share">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" style="margin-left: -50px;margin-top: -6px;" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                        <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                                      </svg>
                                    {{-- <i class="fas fa-whatsapp-square" aria-hidden="true"></i> <span
                                        class="share-title sizeicon" aria-hidden="true"></span> --}}
                                </a>
                            </div>
                            <div class="contact-btn">
                                <a class="edu-btn" href="/">Contact Me<i class="icon-arrow-right-line-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="instructor-profile-right">
                    <div class="inner">
                        <div class="section-title text-start">
                            <span class="pre-title">About Me</span>
                            <h3 class="title">Hello, I’m {{ $instructor->name }}</h3>
                            <p class="description mt--40">{!! html_entity_decode($instructor->bio ) !!}</p>
                        </div>

                        {{-- <div class="edu-skill-style mt--65">
                            <div class="section-title text-start mb--30">
                                <span class="pre-title">Skillset</span>
                                <h3 class="title">Courses Progress</h3>
                            </div>
                            <div class="rbt-progress-style-1 row g-5">
                                <div class="col-lg-6">
                                    <div class="single-progress">
                                        <h6 class="title">Website Development</h6>
                                        <div class="progress">
                                            <div class="progress-bar wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay=".3s" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                            <span class="progress-number">90%</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="single-progress">
                                        <h6 class="title">Product Design</h6>
                                        <div class="progress">
                                            <div class="progress-bar wow fadeInLeft bar-color-2" data-wow-duration="0.5s" data-wow-delay=".3s" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                            <span class="progress-number">75%</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="single-progress">
                                        <h6 class="title">Digital Marketing</h6>
                                        <div class="progress">
                                            <div class="progress-bar wow fadeInLeft bar-color-3" data-wow-duration="0.5s" data-wow-delay=".3s" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                            <span class="progress-number">95%</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="single-progress">
                                        <h6 class="title">Live Support</h6>
                                        <div class="progress">
                                            <div class="progress-bar wow fadeInLeft bar-color-4" role="progressbar" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                            <span class="progress-number">45%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}


                        <div class="course-statistic-wrapper bg-color-primary ptb--50 mt--65 radius-small">
                            <div class="row align-items-center g-5">

                                <div class="col-lg-4 colmd-6 col-12 line-separator">
                                    <div class="course-statistic text-center">
                                        <div class="inner">
                                            <span class="total">4</span>
                                            <p>Course Author</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 colmd-6 col-12 line-separator">
                                    <div class="course-statistic text-center">
                                        <div class="inner">
                                            <span class="total">20</span>
                                            <p>Total Rating</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 colmd-6 col-12 line-separator">
                                    <div class="course-statistic text-center">
                                        <div class="inner">
                                            <span class="total">4.5</span>
                                            <p>Ave. Rating</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="edu-course-wrapper pt--65">
                            <div class="section-title text-start mb--20">
                                <span class="pre-title">Courses</span>
                                <h3 class="title">Course By : {{ $instructor->name }}</h3>
                            </div>
                            <div class="instructor-profile-courses course-activation course-activation-item-2 slick-gutter-15 edu-slick-button">
                               
                               @foreach ($related as $courses)
                               <div class="edu-card card-type-2 radius-small">
                                <div class="inner">
                                    <div class="thumbnail">
                                        <a href="{{ route('course_detail', $courses->slug) }}">
                                            <img style="width: 350px;height: 250px" src="{{ asset('/uploads/subcategory/'.$courses->image) }}" alt="{{ $courses->title }}">
                                        </a>
                                        <div class="top-position status-group left-top">
                                            <span class="eduvibe-status status-01 bg-primary-color">{{$courses->level}}</span>
                                        </div>
                                        <div class="wishlist-top-right">
                                            <button class="wishlist-btn"><i class="icon-Heart"></i></button>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <div class="price-list price-style-03">
                                            <div class="price current-price ">Rs{{$courses->selling_price}}</div>
                                            <div class="price  old-price">Rs.{{$courses->original_price}}</div>
                                        </div>
                                        <h6 class="title"><a href="{{ route('course_detail', $courses->slug) }}">{{$courses->title}}</a></h6>
                                       
                                        <div class="card-bottom">
                                            <div class="read-more-btn">
                                                <a class="btn-transparent" href="{{ route('course_detail', $courses->slug) }}">Enroll Now<i class="icon-arrow-right-line-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                               @endforeach
                                <!-- Start Single Card  -->
                               
                                <!-- End Single Card  -->

                            
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection