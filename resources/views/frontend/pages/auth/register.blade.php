@extends('frontend.layouts.layout')
@section('title')

    <head>
        <title>Register | </title>
        <meta name="description" content="Media Center Page" />
        <meta name="keywords" content="BrainBattleAcademy" />
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


	<section class="ttm-row contact-section clearfix">
		<div class="container">
			<div class="row"><!-- row -->
				<div class="col-lg-7 col-md-7 col-sm-9 m-auto">
					<!-- section title -->
					<div class="section-title with-desc text-center clearfix">
						<div class="title-header">
							<h5 class="ttm-textcolor-skincolor">Register</h5>
							<h2 class="title">DO YOU HAVE ANY QUESTIONS?</h2>
						</div>
						<div class="title-desc">Lorem Ipsum is simply dummy text of the printing and tdustry. Lorem Ipsum has been the industry’s standard dualley .</div>
					</div><!-- section title end -->
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<!-- contact form -->
					<form id="ttm-quote-form" class="row ttm-quote-form clearfix" method="post" action="#">
							<div class="col-md-6">
								<div class="text-center">
                                    <div class="form-group">
                                        <input type="file"  class="form__input"  placeholder="Profile Image" name="image" style="  padding: 15px;
                    ">
                                    </div>
                                    <div class="form-group">
                                        <input name="name" type="text" placeholder="Name*" required="required" class="form-control">
                                    </div>
								<div class="form-group">
									<input name="email" type="email" placeholder="Email Address*" required="required" class="form-control">
								</div>
								<div class="form-group">
									<input name="password" type="password" class="form-control" placeholder="Password*" required="required">
								</div>
                                <div class="form-group">
                                    <input name="phone" type="phone" placeholder="Phone Number*" required="required" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input name="address" type="text" placeholder="Address*" required="required" class="form-control">
                                </div>
								<div class="form-group">
									<button type="submit" id="submit" class="ttm-btn ttm-btn-size-md ttm-textcolor-white ttm-btn-bgcolor-skincolor" value="">
										Send Message
									</button>
								</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<div class="ttm-post-featured-wrapper ttm-featured-wrapper">
										<div class="ttm-post-featured">
											<img class="img-fluid" src="{{ asset('assets') }}/images//blog/01.jpg" alt="post-01">
										</div>
									</div>
								</div>
						
					</form>
					<!-- contact end-->
				</div>
			</div>
		</div>
	</section>
	<!-- page wrap -->

@endsection
