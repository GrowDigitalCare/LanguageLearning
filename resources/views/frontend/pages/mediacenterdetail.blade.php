@extends('frontend.layouts.layout')
@section("title")

<head>
    <title>{{ $mediacenter->title }}| BrainBattleAcademy</title>
    <meta name="title" content="{{ $mediacenter->meta_title }}" />
    <meta name="description" content="{{ html_entity_decode($mediacenter->meta_description) }}" />
    <meta name="keywords" content="{{ $mediacenter->meta_keyword }}" />
    <meta property="og:image" content="http://growdigitalcare.com/uploads/mediacenter/{{ $mediacenter->image }}" />
    <meta property="og:url" content="http://growdigitalcare.com/mediacenterdetail{{ $mediacenter->slug }}" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="{{ html_entity_decode($mediacenter->meta_description) }}" />
    <meta property="og:title" content="{{ $mediacenter->meta_title }}" />
    <meta property="og:site_name" content="Growdigitalcare">
</head>
@endsection
@section("content")
<div class="breadcrumbarea">

    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb__content__wraper" data-aos="fade-up">
                    <div class="breadcrumb__title">
                        <h2 class="heading">Media Center Detail</h2>
                    </div>
                    <div class="breadcrumb__inner">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>Media Center Detail</li>
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

<div class="blogarea__2 sp_top_100 sp_bottom_100">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="blog__details__content__wraper">
                    <div class="blog__details__img" data-aos="fade-up">
                        <img loading="lazy"
                        src="{{ asset('/uploads/mediacenter/' . $mediacenter->image) }}"
                        alt="{{ $mediacenter->title }}">
                    @if ($mediacenter->image != 'null' && $mediacenter->videourl != 'null')
                        <iframe src="{{ $mediacenter->videourl }}"
                            style="width: 100%;height:350px;" frameborder="0"></iframe>
                    @endif
                       
                    </div>
                    <div class="blog__details__content">
                       
                        <div class="blog__details__heading" data-aos="fade-up">
                            <h5>{{ $mediacenter->title }}</h5>
                        </div>
                        <p class="content__3" data-aos="fade-up">{!! html_entity_decode($mediacenter->description) !!}</p>
                     
                        
                     

                    </div>
           
                 



                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                @foreach ($related as $f)
                <div class="blogsidebar__content__wraper__2" data-aos="fade-up">
                    <div class="blogsidebar__content__inner__2">
                        <div class="blogsidebar__img__2">
                            <a href="/mediacenterdetail/{{ $f->slug }}">
                                <img loading="lazy" src="{{ asset('/uploads/mediacenter/' . $f->image) }}"
                                    style="width: 250px;height: 200px;"
                                    alt="{{ $f->title }}">
                            </a>
                            {{-- <img loading="lazy"  src="{{asset('assets')}}/img/blog/blog_10.png" alt="blog"> --}}
                        </div>
                        <div class="blogsidebar__name__2">
                            <h5>
                                <a href="/mediacenterdetail/{{ $f->slug }}"> {{ $f->title }}</a>

                            </h5>
                            {{-- <p>Blogger/Photographer</p> --}}
                        </div>
                        <div class="blog__sidebar__text__2">
                            <p>  <?php
                                $media1 = strip_tags($f->description);
                                $media2 = Str::limit($media1,80);
                              
                               ?>
                              
                                 
                              {!! html_entity_decode($media2) !!}</p>
                        </div>
          
                    </div>
                </div>
@endforeach
              

                <div class="blogsidebar__content__wraper__2" data-aos="fade-up">

                    <h4 class="sidebar__title">Share This On</h4>
                    <div class="follow__icon">
                        <ul>
                            <?php
                                        $url = urlencode("http://brainbattleacademy.com/mediacenterdetail/$mediacenter->slug");
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
@endsection