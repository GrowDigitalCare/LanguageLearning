@extends('frontend.layouts.layout')
@section('title')

    <head>
        <title>Flip Cards | BrainBattleAcademy</title>
        <meta name="description" content="Flip Cards Page" />
        <meta name="keywords" content="BrainBattleAcademy" />
    </head>
@endsection
@section('content')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <style>


  .card {
    height: 300px;
    width: 300px;
    perspective: 1000px;
    background: linear-gradient(to bottom right, #5F2DED, #6c42e0);
    border-radius: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    cursor: pointer;
    position: relative;
    overflow: hidden;
  }

  .card-inner {
    position: relative;
    width: 100%;
    height: 100%;
    transform-style: preserve-3d;
    transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    transform-origin: center;
  }

  .card.flip .card-inner {
    transform: rotateY(180deg);
  }

  .card-front,
  .card-back {
    border-radius: 20px;
    position: absolute;
    width: 100%;
    height: 100%;
    backface-visibility: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
    padding: 20px;
    box-sizing: border-box;
  }

  .card-front {
    background-color: rgba(242, 242, 242, 0.8);
    transform-style: preserve-3d;
    z-index: 2;
  }

  .card-back  {
    background-color: whitesmoke;
    color: #5F2DED;
    transform: rotateY(180deg);
  }
  .card-front  {
    background-color: whitesmoke;
    color: #5F2DED;
  
  }

  .card-back  .card-front .card-body {
    text-align: center;
  }

  .card-back  .card-front .card-title {
    margin-bottom: 10px;
    font-size: 20px;
  }

  .card-back  .card-front .card-text {
    font-size: 16px;
  }
  </style>
 <div class="breadcrumbarea">

    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb__content__wraper" data-aos="fade-up">
                    <div class="breadcrumb__title">
                        <h2 class="heading">Contact Page</h2>
                    </div>
                    <div class="breadcrumb__inner">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Contact page</li>
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
<div class="contact__section sp_top_100 sp_bottom_50" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
  <div class="card">
    <div class="card-inner">
      <div class="card-front">
        <div class="card-body">
            <h4 class="card-title">Consider</h4>
            <p class="card-text">  <i class="material-icons">volume_up</i>
            </p>
          </div>
        {{-- <img class="card-img-top" src="https://imgur.com/wbmIb6G.jpg" alt="Card image" style="width: 100%;height: 100%;border-radius: 20px;"> --}}
      </div>
      <div class="card-back">
        <div class="card-body">
          <h4 class="card-title">Description</h4>
          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
      </div>
    </div>
  </div>
            </div>
        </div>
    </div>
    <br>
  <script>$(document).ready(function() {
    $(".card").click(function() {
      $(this).toggleClass("flip");
    });
  });
  </script>

@endsection