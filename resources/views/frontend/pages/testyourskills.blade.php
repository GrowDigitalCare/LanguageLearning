@extends('frontend.layouts.layout')
@section("title")

<head>
    <title>Languages Skill Test | BrainBattleAcademy</title>
    <meta name="description" content="Languages Skill Test Page" />
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
                        <h2 class="heading">Languages Skill Test</h2>
                    </div>
                    <div class="breadcrumb__inner">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li>Languages Skill Test</li>
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

<div class="populerarea sp_top_80 sp_bottom_50">
    <div class="container">
        <div class="row populerarea__wraper">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6" data-aos="fade-up">
                <div class="populerarea__heading heading__underline">
                    <div class="default__small__button">Language List</div>
                    <h2>Populer <span>Languages</span></h2>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6" data-aos="fade-up">
                <div class="populerarea__content">
                
                </div>
            </div>
            <div class="col-xl-5 col-lg-5 col-md-6 col-sm-6" data-aos="fade-up">
                <div class="populerarea__content">
                    <p>Forging relationships between multi to national governments and global NGOs begins.</p>
                </div>
            </div>

        </div>
        <div class="row">
            @foreach ($testyourskill as $language)


            
          
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6" data-aos="fade-up">
                <div class="single__service">
                    <div class="service__img">

                        <img src="{{ asset('/uploads/language/' . $language->image) }}" class="service__icon" alt="">



                        <div class="service__bg__img">
                            {{-- <svg class="service__icon__bg" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M63.3775 44.4535C54.8582 58.717 39.1005 53.2202 23.1736 47.5697C7.2467 41.9192 -5.18037 32.7111 3.33895 18.4477C11.8583 4.18418 31.6595 -2.79441 47.5803 2.85105C63.5011 8.49652 71.8609 30.2313 63.3488 44.4865L63.3775 44.4535Z" fill="#5F2DED" fill-opacity="0.05"/>
                            </svg> --}}
                        </div>
                    </div>
                    <div class="service__content">
                        <h3><a href="{{ route('language_test', ['slug' => $language->slug]) }}">{{ $language->name }}</a></h3>
                        <p>Business is succes</p>
                    </div>
                    <div class="service__small__img">
                        <svg class="icon__hover__img" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.5961 10.265L19 1.33069L10.0022 3.73285L1 6.1306L7.59393 12.6627L14.1879 19.1992L16.5961 10.265Z" stroke="#FFB31F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection