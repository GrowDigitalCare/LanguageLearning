@extends('frontend.layouts.layout')
@section('title')

    <head>
        <title>Terms and Condition | Grow Digital Care</title>
        <meta name="description" content="Terms and Condition" />
        <meta name="keywords" content="Growdigitalcare" />
    </head>
@endsection
@section('content')
@if (Session::has('success'))
<div class="alert alert-success">
    {{ Session::get('success') }}
    @php
        Session::forget('success');
    @endphp
</div>
@endif
@if (Session::has('error'))
<div class="alert alert-danger">
    {{ Session::get('error') }}
    @php
        Session::forget('error');
    @endphp
</div>
@endif
   <!-- breadcrumbarea__section__start -->
   <div class="breadcrumbarea" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb__content__wraper">
                    <div class="breadcrumb__title">
                        <h2 class="heading">Lesson</h2>
                    </div>
                    <div class="breadcrumb__inner">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li> Course Materials</li>
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
<!-- breadcrumbarea__section__end-->


<!-- tution__section__start -->
<div class="tution sp_bottom_100 sp_top_100">
<div class="container-fluid full__width__padding">

<div class="row">
  
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" data-aos="fade-up">
       

                <div class="dashboard__table table-responsive">
                    <h3>Quiz Result</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Quiz</th>
                                <th>Qus</th>
                                <th>TM</th>
                                <th>CA</th>
                                <th>Result</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>
                                    <p>December 26, 2024</p>
                                    <span>Write a on yourself using the 5</span>
                                    <p>Student: <a href="#">John Due</a></p>
                                </th>
                                <td>
                                    <p>4</p>
                                </td>
                                <td>
                                    <p>8</p>
                                </td>
                                <td>
                                    <p>4</p>
                                </td>
                                <td>
                                    <span class="dashboard__td">Pass</span>
                                </td>
                                <td>
                                    <div class="dashboard__button__group">
                                    <a class="dashboard__small__btn__2" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> Edit</a>
                                    <a class="dashboard__small__btn__2 dashboard__small__btn__3" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Delete</a>
                                </div>
                            </td>
                            </tr>

                            <tr class="dashboard__table__row">
                                <th>
                                    <p>December 26, 2024</p>
                                    <span>Write a on yourself using the 5</span>
                                    <p>Student: <a href="#">John Due</a></p>
                                </th>
                                <td>
                                    <p>4</p>
                                </td>
                                <td>
                                    <p>8</p>
                                </td>
                                <td>
                                    <p>4</p>
                                </td>
                                <td>
                                    <span class="dashboard__td">Pass</span>
                                </td>
                                <td>
                                    <div class="dashboard__button__group">
                                    <a class="dashboard__small__btn__2" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> Edit</a>
                                    <a class="dashboard__small__btn__2  dashboard__small__btn__3" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Delete</a>
                                </div>
                            </td>
                            </tr>

                            <tr>
                                <th>
                                    <p>December 26, 2024</p>
                                    <span>Write a on yourself using the 5</span>
                                    <p>Student: <a href="#">John Due</a></p>
                                </th>
                                <td>
                                    <p>4</p>
                                </td>
                                <td>
                                    <p>8</p>
                                </td>
                                <td>
                                    <p>4</p>
                                </td>
                                <td>
                                    <span class="dashboard__td">Pass</span>
                                </td>
                                <td>
                                    <div class="dashboard__button__group">
                                    <a class="dashboard__small__btn__2" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> Edit</a>
                                    <a class="dashboard__small__btn__2  dashboard__small__btn__3" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Delete</a>
                                </div>
                            </td>
                            </tr>

                            <tr class="dashboard__table__row">
                                <th>
                                    <p>December 26, 2024</p>
                                    <span>Write a on yourself using the 5</span>
                                    <p>Student: <a href="#">John Due</a></p>
                                </th>
                                <td>
                                    <p>4</p>
                                </td>
                                <td>
                                    <p>8</p>
                                </td>
                                <td>
                                    <p>4</p>
                                </td>
                                <td>
                                    <span class="dashboard__td">Pass</span>
                                </td>
                                <td>
                                    <div class="dashboard__button__group">
                                    <a class="dashboard__small__btn__2" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> Edit</a>
                                    <a class="dashboard__small__btn__2  dashboard__small__btn__3" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Delete</a>
                                </div>
                            </td>
                            </tr>
                         
                        </tbody>
                    </table>
                </div>


        </div>
    </div>

</div>
</div>
</div>

@endsection