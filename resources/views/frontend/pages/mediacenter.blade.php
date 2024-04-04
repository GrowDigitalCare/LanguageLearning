@extends('frontend.layouts.layout')
@section("title")

<head>
    <title>Media Center | BrainBattleAcademy</title>
    <meta name="description" content="Media Center Page" />
    <meta name="keywords" content="BrainBattleAcademy" />
</head>
@endsection
@section("content")
<div class="breadcrumbarea">

    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb__content__wraper" data-aos="fade-up">
                    <div class="breadcrumb__title">
                        <h2 class="heading">Media Center</h2>
                    </div>
                    <div class="breadcrumb__inner">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>Media Center</li>
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
<div class="blogarea__2 sp_top_100 sp_bottom_100">
    <div class="container">
   
        <div class="row">
            @foreach ($mediacenter as $media)
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12" data-aos="fade-up">
                <div class="single__blog__wraper">
                    <div class="single__blog__img">
                        @if($media->videourl!="null")
                        <iframe src="{{$media->videourl}}" style="width: 350px;height: 250px;" frameborder="0"></iframe>
                        @elseif($media->image!="null")
                        <a href="/mediacenterdetail/{{$media->slug}}">
                      
                        <img loading="lazy"  src="{{ asset('/uploads/mediacenter/' . $media->image) }}" alt="blog">
                        @endif 
                    </div>
                    <div class="single__blog__content">
                        <p>{{ $media->title }}</p>
                        <h6> <a href="#">  <?php
                            $media1 = strip_tags($media->description);
                            $media2 = Str::limit($media1,80);
                          
                           ?>
                          
                             
                          {!! html_entity_decode($media2) !!} </a></h6>
                        <div class="single__blog__bottom__button">
                            <a href="/mediacenterdetail/{{$media->slug}}">Read More
                    <i class="icofont-long-arrow-right"></i>
                   </a>
                        </div>
                    </div>
                </div>
            </div>
@endforeach
           
        </div>
    </div>
</div>
@endsection