<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!doctype html>
<html lang="zxx">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>@yield('title')</title>
	<!-- Template CSS -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset("assets/css/style-starter.css")}}">
	<!-- Template CSS -->
	<link href="//fonts.googleapis.com/css?family=Muli:300,300i,400,500,600,700,800,900&display=swap" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,500,700,900&display=swap" rel="stylesheet">
	<!-- Template CSS -->
	<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
	<meta name="csrf-token" content="{{ csrf_token() }}" />



</head>

<body>
	<input type="hidden" id="device_id" name="device_id">

	<div id="preloader">
		<div id="status"></div>
	</div>

	<!--w3l-banner-slider-main-->
	<!--w3l-banner-slider-main-->
	<section class="w3l-banner-slider-main w3l-inner-page-main">
		<div class="breadcrumb-infhny">
			<header class="top-headerhny" id="topheader">
				<!--/nav-->
				<nav class="navbar navbar-expand-lg navbar-light fill">
					<div class="container-fluid">

						<button class="navbar-toggler" id="test-btn" type="button" data-toggle="collapse"
							data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
							aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>

						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<div class="row">
								<div class="col-6 d-lg-none">
									<a class="nav-link ml-0 mt-4 text-violet font-weight-bold"
										href="{{ route('user.courses') }}">Moji Kursevi</a>

								</div>
								<div class="col-6 d-lg-none text-right">

									@if(Auth::user())
									<a class="nav-link ml-0 mt-4 text-violet font-weight-bold"
										href="{{ route("custom.logout") }}">Logout</a>

									@else
									<a class="nav-link mt-4 text-violet font-weight-bold" data-toggle="modal"
										data-target="#loginModal" href="#">Logovanje</a>
									@endif

								</div>
							</div>
							<ul class="navbar-nav mx-lg-auto ml-auto">
								<li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
									<a class="nav-link" href="{{url('/')}}">Početna</a>
								</li>
								<li class="nav-item {{ request()->is('courses*') ? 'active' : '' }}">
									<a class="nav-link" href="{{ route('all-courses') }}#all-courses">Kursevi</a>
								</li>
								<li class="nav-item {{ request()->is('About-me*') ? 'active' : '' }}">
									<a class="nav-link" href="{{route('about')}}#about-me">O meni</a>
								</li>


								<li class="nav-item {{ request()->is('contact*') ? 'active' : '' }}">
									<a class="nav-link" href="{{route('contact')}}#contact">Kontakt</a>
								</li>



								<li class="nav-item login-link d-none d-lg-block">

									@if(Auth::user())
									<div class="dropdown">
										<button class="dropbtn">{{ Auth::user()->name }}</button>
										<div class="dropdown-content">
											<a class="nav-link ml-0" href="{{ route("custom.logout") }}">Logout</a>
											<a class="nav-link ml-0" href="{{ route('user.courses') }}">Moji Kursevi</a>

										</div>
									</div>

									@else
									<a class="nav-link " data-toggle="modal" data-target="#loginModal"
										href="#">Logovanje</a>
									@endif

								</li>
							</ul>

						</div>
						<!-- <form action="#" method="post" class="d-flex searchhny-form">
                    <input type="search" placeholder="Search Here..." required="required">
                    <button type="submit"><span class="fa fa-search" aria-hidden="true"></span></button>
                </form> -->
					</div>
				</nav>
				<!--//nav-->
			</header>
			<!-- /breadcrumbs-->
			{{-- <div class="container">
				<nav aria-label="breadcrumb" class="breadcrumb-info">
					<h2 class="hny-title text-center">@yield('banner-title')</h2>
					@if(Request::url() != url("/"))
    				<ol class="breadcrumb mb-0">
						<li class="breadcrumb-item"><a href="{{url('/')}}">Početna</a></li>
			<li class="breadcrumb-item active" aria-current="page"><a
					href="{{ Request::url() }}">@yield('breadcrumb-item')</a></li>
			<li class="breadcrumb-item" aria-current="page">@yield('success')
			<li>
				</ol>
				@endif

				</nav>
		</div> --}}
		<!-- //breadcrumbs-->
		</div>
		<!--//banner-slider-->
	</section>


	@yield('content')

	<!-- Footer -->
	<footer class="page-footer font-small indigo">

		<!-- Footer Links -->
		<div class="container">

			<!-- Grid row-->
			<div class="row text-center d-flex justify-content-center pt-5 mb-3">

				<!-- Grid column -->
				<div class="col-md-2 mb-3">
					<h6 class="text-uppercase font-weight-bold">
						<a class="nav-link" href="{{url('/')}}">Početna</a>
					</h6>
				</div>
				<!-- Grid column -->

				<!-- Grid column -->
				<div class="col-md-2 mb-3">
					<h6 class="text-uppercase font-weight-bold">
						<a class="nav-link" href="{{ route('all-courses') }}#all-courses">Kursevi</a>

					</h6>
				</div>
				<!-- Grid column -->

				<!-- Grid column -->
				<div class="col-md-2 mb-3">
					<h6 class="text-uppercase font-weight-bold">
						<a class="nav-link" href="{{route('about')}}#about-me">O meni</a>

					</h6>
				</div>
				<!-- Grid column -->

				<!-- Grid column -->
				<div class="col-md-2 mb-3">
					<h6 class="text-uppercase font-weight-bold">
						<a class="nav-link" href="{{route('contact')}}#contact">Kontakt</a>

					</h6>
				</div>
				<!-- Grid column -->


				<!-- Grid column -->

			</div>
			<!-- Grid row-->
			<hr class="rgba-white-light" style="margin: 0 15%;">

			<!-- Grid row-->
			<div class="row d-flex text-center justify-content-center mb-md-0 mb-4">

				<!-- Grid column -->
				<div class="col-md-8 col-12 mt-5">
					<p style="line-height: 1.7rem"> <i> &rdquo; NEKI CITAT U 2 RECENICE &rdquo;</i> </p>
				</div>
				<!-- Grid column -->

			</div>
			<!-- Grid row-->
			<hr class="clearfix d-md-none rgba-white-light" style="margin: 10% 15% 5%;">

			<!-- Grid row-->
			<div class="row pb-3">

				<!-- Grid column -->
				<div class="col-md-12">

					<div class="mb-5 flex-center">

						<!-- Facebook -->
						<a class="fb-ic">
							<i class="fa fa-facebook-f fa-lg white-text mr-4 fa-2x"> </i>
						</a>
						<!-- Twitter -->
						<a class="tw-ic">
							<i class="fa fa-twitter fa-lg white-text mr-4 fa-2x"> </i>
						</a>
						<!-- Google +-->


						<!--Instagram-->
						<a class="ins-ic">
							<i class="fa fa-instagram fa-lg white-text mr-4 fa-2x"> </i>
						</a>
						<!--Pinterest-->


					</div>

				</div>
				<!-- Grid column -->

			</div>
			<!-- Grid row-->

		</div>
		<!-- Footer Links -->

		<!-- Copyright -->
		<div class="footer-copyright text-center py-3 text-white">
			<p>All rights reserved &copy; Life-Leaf</p>
		</div>
		<!-- Copyright -->

	</footer>
	<!-- Footer -->
	<section class="w3l-footer-16">

		<button onclick="topFunction()" id="movetop" title="Go to top">
			<span class="fa fa-angle-up"></span>
		</button>
	</section>

	<!-- Modal -->

	<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Logovanje</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" action="{{ route('custom.login.submit') }}">
						@csrf
						<input type="hidden" id="device_id_login" name="device_id">
						<div class="form-group row">
							<label for="email" class="col-md-4 col-form-label">{{ __('E-Mail Address') }}</label>

							<div class="col-12">
								<input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
									name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

								@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>

							<div class="col-12">
								<input id="password" type="password"
									class="form-control @error('password') is-invalid @enderror" name="password"
									required autocomplete="current-password">

								@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<div class="col-12">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" name="remember" id="remember"
										{{ old('remember') ? 'checked' : '' }}>

									<label class="form-check-label" for="remember">
										{{ __('Remember Me') }}
									</label>
								</div>
							</div>
						</div>
						@if (Route::has('password.request'))
						<a class="btn btn-link" href="{{ route('password.request') }}">
							{{ __('Forgot Your Password?') }}
						</a>
						@endif

						<div class="form-group row mb-0 text-center">

							<div class="col-4 offset-4">
								<button type="submit" class="btn btn-success btn-lg">
									{{ __('Login') }}
								</button>
							</div>


						</div>
					</form>
				</div>

			</div>
		</div>
	</div>


	<script src="{{ asset("assets/js/jquery-3.5.1.min.js")}}"></script>
	<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
	{{-- <script src ="https://cdnjs.cloudflare.com/ajax/libs/fingerprintjs2/2.1.0/fingerprint2.min.js"></script> --}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fingerprintjs2/1.8.2/fingerprint2.min.js"></script>

	{{-- <script src="{{ asset("assets/js/bootstrap.min.js") }}"></script> --}}
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
		integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
	</script>


	<script>
		// When the user scrolls down 20px from the top of the document, show the button
		window.onscroll = function () {
			scrollFunction()
		};

		function scrollFunction() {
			if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
				document.getElementById("movetop").style.display = "block";
				// document.getElementById("menu").style.display = "block";

			} else {
				document.getElementById("movetop").style.display = "none";
				// document.getElementById("menu").style.display = "none";
			}
		}

		// When the user clicks on the button, scroll to the top of the document
		function topFunction() {
			document.body.scrollTop = 0;
			document.documentElement.scrollTop = 0;
		}
	</script>
	<!-- //move top -->

	<script>
		AOS.init({
			offset: 400, // offset (in px) from the original trigger point
			delay: 0, // values from 0 to 3000, with step 50ms
			duration: 1000, // values from 0 to 3000, with step 50ms
			easing: 'ease', // default easing for AOS animations
		});
	</script>
	<!-- disable body scroll which navbar is in active -->
	<script>
		$(function () {
			$('.navbar-toggler').click(function () {
				$('body').toggleClass('noscroll');
			})
		});
	</script>
	<!--/filter-->
	<script>
		$(document).ready(function () {

			$(".filter-button").click(function () {
				var value = $(this).attr('data-filter');

				if (value == "all") {
					//$('.filter').removeClass('hidden');
					$('.filter').show('1000');
				} else {
					//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
					//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
					$(".filter").not('.' + value).hide('3000');
					$('.filter').filter('.' + value).show('3000');

				}
			});

		});
	</script>
	<!--//filter-->
	<!--pop-up-box-->


	<!--//pop-up-box-->

	<script>
		var hash= '';
	if (window.requestIdleCallback) {
		requestIdleCallback(function () {
			new Fingerprint2().get(function(result, components){

				console.log(components);
				hash = result;

			   	$("#device_id").val(result);
			   	$("#device_id_login").val(result);
			   	$("#device_id_subscription").val(result);
			});
		})
	} else {
		setTimeout(function () {
			new Fingerprint2().get(function (result, components) {
			  console.log(components) // an array of components: {key: ..., value: ...}
			})
		}, 500)
	}

	</script>

	<script>
		function goToCourse(id) {
		var course_id = id;
		var device_id = $("#device_id").val();
		var route = $("#route");

		// var route = "{{  route('single-course', ["+course_id+", "+device_id+"]) }}";



		// alert(route);

		$.ajaxSetup({
        	headers: {
            	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
			// url: route,
			url: "prepare-course/"+id+"/"+device_id,
            method: 'GET',
            contentType: false,
            processData: false,
            cache: false,
            data: {course_id: id, device_id: device_id},


            success: function(response){
                window.location.replace(response);
            },
            error: function (request, status, error) {
                alert(error);
                //alert("error! Contact us!");
            }
        });
	}


	$( '#topheader .navbar-nav a' ).on( 'click', function () {
	$( '#topheader .navbar-nav' ).find( 'li.active' ).removeClass( 'active' );
	$( this ).parent( 'li' ).addClass( 'active' );
});


		// makes sure the whole site is loaded

	$(window).on('load', function(){
		$("#status").fadeOut();
        // will fade out the whole DIV that covers the website.
    $("#preloader").delay(1000).fadeOut("slow");
	});


	</script>

	@yield('footer-scripts')
</body>

</html>