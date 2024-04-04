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
        <img loading="lazy"  class=" shape__icon__img shape__icon__img__1" src="img/herobanner/herobanner__1.png" alt="photo">
        <img loading="lazy"  class=" shape__icon__img shape__icon__img__2" src="img/herobanner/herobanner__2.png" alt="photo">
        <img loading="lazy"  class=" shape__icon__img shape__icon__img__3" src="img/herobanner/herobanner__3.png" alt="photo">
        <img loading="lazy"  class=" shape__icon__img shape__icon__img__4" src="img/herobanner/herobanner__5.png" alt="photo">
    </div>

</div>
<div class="blogarea__2 sp_top_100 sp_bottom_100">
    <div class="container">
        <div class="row">
            <div class="col-xl-12" data-aos="fade-up">
                <div class="section__title__2 text-center teamarea__margin">
                    <div class="section__small__title">
                        <span>News & Blog</span>
                    </div>
                    <div class="section__title__heading__2 section__title__heading__3 heading__fontsize__2">
                        <h2>Latest News & Blogs</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12" data-aos="fade-up">
                <div class="single__blog__wraper">
                    <div class="single__blog__img">
                        <img loading="lazy"  src="{{asset('assets')}}/img/blog/blog_5.png" alt="blog">
                        <div class="single__blog__button">
                            <a class="default__button" href="#">Story</a>
                        </div>
                    </div>
                    <div class="single__blog__content">
                        <p>13 january 2024</p>
                        <h4> <a href="#">Facebook design is dedicated to what's new in design </a></h4>
                        <div class="single__blog__bottom__button">
                            <a href="#">Read More
                    <i class="icofont-long-arrow-right"></i>
                   </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12" data-aos="fade-up">
                <div class="single__blog__wraper">
                    <div class="single__blog__img">
                        <img loading="lazy"  src="{{asset('assets')}}/img/blog/blog_24.png" alt="blog">
                        <div class="single__blog__button">
                            <a class="default__button" href="#">Story</a>
                        </div>
                    </div>
                    <div class="single__blog__content">
                        <p>13 january 2024</p>
                        <h4> <a href="#">Facebook design is dedicated to what's new in design </a></h4>
                        <div class="single__blog__bottom__button">
                            <a href="#">Read More
                    <i class="icofont-long-arrow-right"></i>
                   </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12" data-aos="fade-up">
                <div class="single__blog__wraper">
                    <div class="single__blog__img">
                        <img loading="lazy"  src="{{asset('assets')}}/img/blog/blog_25.png" alt="blog">
                        <div class="single__blog__button">
                            <a class="default__button" href="#">Story</a>
                        </div>
                    </div>
                    <div class="single__blog__content">
                        <p>13 january 2024</p>
                        <h4> <a href="#">Facebook design is dedicated to what's new in design </a></h4>
                        <div class="single__blog__bottom__button">
                            <a href="#">Read More
                    <i class="icofont-long-arrow-right"></i>
                   </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12" data-aos="fade-up">
                <div class="blogarea__bottom__button">
                    <a class="default__button" href="#">MORE BLOG</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection