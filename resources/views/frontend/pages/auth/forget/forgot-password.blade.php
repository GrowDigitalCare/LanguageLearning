@extends('frontend.layouts.layout')
@section('title')

    <head>
        <title>Request Otp | BrainBattleAcademy</title>
        <meta name="description" content="Login Page" />
        <meta name="keywords" content="BrainBattleAcademy" />
    </head>
@endsection
@section('content')
<br><br><br>
  <!-- page wrap -->
	<div class="section section--content">
		<div class="section__content">
			<!-- form -->
			<form action="#" class="form form--content">
				<div class="form__logo-wrap">
					<a href="index.html" class="form__logo">
						<img src="img/logo.svg" alt="">
					</a>
					<span class="form__tagline">Play to earn <br>HTML Template</span>
				</div>

				<div class="form__group">
					<input type="text" class="form__input" placeholder="Email">
				</div>

				<div class="form__group form__group--checkbox">
					<input id="remember" name="remember" type="checkbox">
					<label for="remember">I agree to the <a href="privacy.html">Privacy Policy</a></label>
				</div>
				
				<button class="form__btn" type="button">Send</button>

				<span class="form__text form__text--center">We will send a password to your Email</span>
			</form>
			<!-- end form -->
		</div>

		<!-- bg animation -->
		<div id="canvas2" class="section__canvas"></div>
		<!-- end bg animation -->
	</div>
	<!-- end page wrap -->

    <!-- ==========Login Section Section Starts Here========== -->
    {{-- <div class="login-section padding-top padding-bottom">
        <div class="container">
            <div class="account-wrapper">
                @if (Session::has('message'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('message') }}
                </div>
            @endif
                <h3 class="title">Send Verification Mail</h3>
                
                <form class="account-form" action="{{ route('forget.password.post') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="email" id="email_address" class="form-control" name="email"
                        placeholder="Enter Your  Email" required>
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                    </div>
                              
                
                    <div class="form-group">
                        <button class="d-block custom-button"><span>Submit Now</span></button>
                    </div>
                </form>
              
            </div>
        </div>
    </div> --}}
    <!-- ==========Login Section Section Ends Here========== -->



    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

    <script>
        $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>
@endsection
