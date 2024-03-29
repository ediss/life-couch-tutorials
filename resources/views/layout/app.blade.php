<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!doctype html>
<html lang="sr">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>@yield('title') - Maja Vučković</title>
	<!-- Template CSS -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset("assets/css/style-starter.css")}}">
	<!-- Template CSS -->
	<link href="//fonts.googleapis.com/css?family=Muli:300,300i,400,500,600,700,800,900&display=swap" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,500,700,900&display=swap" rel="stylesheet">



	<!-- Template CSS -->
	<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
	<script src="https://kit.fontawesome.com/fcb04e2a3d.js" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="{{ asset("assets/css/form-apply.css")}}">

	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta name="description" content="@yield('meta-desc')">
	{{-- <meta property="og:image" content="{{ url('assets/images/banners/background.png') }}" /> --}}

	@yield('meta-img')

	<link rel="canonical" href="{{ url()->current() }}">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-T8Q32RSM6E"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
  		function gtag(){dataLayer.push(arguments);}
  			gtag('js', new Date());
  			gtag('config', 'G-T8Q32RSM6E');
	</script>

	<!-- Facebook Pixel Code -->
<script>
	!function(f,b,e,v,n,t,s)
	{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];
	s.parentNode.insertBefore(t,s)}(window, document,'script',
	'https://connect.facebook.net/en_US/fbevents.js');
	fbq('init', '742403509442405');
	fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none"
	src="https://www.facebook.com/tr?id=742403509442405&ev=PageView&noscript=1"
	/></noscript>
	<!-- End Facebook Pixel Code -->

</head>

<body>


	<div id="preloader">
		<div id="status"></div>
	</div>

	<!--w3l-banner-slider-main-->
	<!--w3l-banner-slider-main-->
	<section class="w3l-banner-slider-main w3l-inner-page-main">
		<div class="mouse-scroll down-arrow d-none d-lg-block">

			<a href="@yield('scroll-to')" class="fas fa-angle-double-down fa-5x "></a>

		</div>

		<div class="breadcrumb-infhny">
			<header class="top-headerhny" id="topheader">
				<!--/nav-->
				<nav class="navbar navbar-expand-lg navbar-light fill">
					<div class="container-fluid">

						<div class="col-2 d-lg-none">
							<button class="navbar-toggler" type="button" data-toggle="collapse"
								data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
								aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>
						</div>

						@if(Auth::user())
						<div class="col-6 d-lg-none text-center">
							<a class="nav-link ml-0 p-0 text-violet font-weight-bold"
								href="{{ route('user.courses') }}#courses">Moji Kursevi</a>

						</div>
						<div class="col-4 d-lg-none text-right">
							<a class="nav-link ml-0 text-violet font-weight-bold"
								href="{{ route("custom.logout") }}">Logout</a>
						</div>
						@else

						<div class="col-8 d-lg-none text-right">
							<a class="nav-link text-violet font-weight-bold" data-toggle="modal"
								data-target="#loginModal" href="#">Login</a>
						</div>
						@endif


						<div class="collapse navbar-collapse" id="navbarSupportedContent">

							<ul class="navbar-nav mx-lg-auto ml-auto">
								<li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
									<a class="nav-link nav-link-click" href="{{url('/')}}">Početna</a>
								</li>
								<li class="nav-item {{ request()->is('kursevi*') ? 'active' : '' }}">
									<a class="nav-link nav-link-click" href="{{ route('all-courses') }}#all-courses">Kursevi</a>
								</li>
								<li class="nav-item {{ request()->is('O-meni*') ? 'active' : '' }}">
									<a class="nav-link nav-link-click" href="{{route('about')}}#about-me">O meni</a>
								</li>


								<li class="nav-item {{ request()->is('Kontakt*') ? 'active' : '' }}">
									<a class="nav-link nav-link-click" href="{{route('contact')}}#contact">Kontakt</a>
								</li>



								<li class="nav-item login-link d-none d-lg-block">

									@if(Auth::user())
									<div class="dropdown">
										<button class="dropbtn">{{ Auth::user()->name }}</button>
										<div class="dropdown-content">
											<a class="nav-link ml-0" href="{{ route("custom.logout") }}">Logout</a>
											<a class="nav-link ml-0" href="{{ route('user.courses') }}#courses">Moji
												Kursevi</a>

										</div>
									</div>

									@else
									<a class="nav-link " data-toggle="modal" data-target="#loginModal"
										href="#">Login</a>
									@endif

								</li>
							</ul>

						</div>

					</div>
				</nav>
				<!--//nav-->
			</header>

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
					<p style="line-height: 1.7rem"> <b class="text-white"> Stay tuned </b> &#128521; </p>
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
						<a class="fb-ic" target="_blank" href="https://www.facebook.com/lifeleafgreen">
							<i class="fa fa-facebook-f fa-lg white-text mr-4 fa-2x"> </i>
						</a>

						<!--Instagram-->
						<a class="ins-ic" target="_blank" href="https://www.instagram.com/maja_lifeleaf/">
							<i class="fa fa-instagram fa-lg white-text mr-4 fa-2x"> </i>
						</a>

						<!-- Youtube +-->

						<a target="_blank" href="https://www.youtube.com/channel/UCf6c8WhzvISVJQs466ajQ7Q">
							<i class="fab fa-youtube fa-2x mr-4"></i>
						</a>

						<!-- BLOG-->
						<a target="_blank" href="https://life-leaf.com/blog">
							<i class="fab fa-blogger-b fa-2x mr-4"></i>
						</a>


						<!-- Twitter -->
						<a class="tw-ic" target="_blank" href="https://twitter.com/sunhorizons">
							<i class="fa fa-twitter fa-lg white-text mr-4 fa-2x"> </i>
						</a>


						<a target="_blank" href="https://www.linkedin.com/in/maja-vuckovic-3b63b015/">
							<i class="fab fa-linkedin fa-2x mr-4"></i>
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
					<h5 class="modal-title" id="exampleModalLabel">Login</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" action="{{ route('custom.login.submit') }}">
						@csrf
						<input type="hidden" id="device_id_login" name="device_id">
						<div class="form-group row">
							<label for="email" class="col-md-4 col-form-label">{{ __('E-Mail Adresa') }}</label>

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
							<label for="password" class="col-md-4 col-form-label">{{ __('Lozinka') }}</label>

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
										{{ __('Zapamti me') }}
									</label>
								</div>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-12">
								@if (Route::has('password.request'))
								<a class="btn-link text-dark" href="{{ route('password.request') }}">
									{{ __('Zaboravili ste lozinku?') }}
								</a>
								@endif
							</div>
						</div>



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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fingerprintjs2/2.1.0/fingerprint2.min.js"></script>


	{{-- <script src="{{ asset("assets/js/jquery-3.5.1.min.js")}}"></script> --}}

	{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fingerprintjs2/1.8.2/fingerprint2.min.js"></script> --}}

	{{-- <script src="{{ asset("assets/js/bootstrap.min.js") }}"></script> --}}
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
		integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
	</script>


	<script>
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

	{{-- <script>
		var hash= '';
	if (window.requestIdleCallback) {
		requestIdleCallback(function () {
			new Fingerprint2().get(function(result, components){
				hash = result;
			   	$("#device_id_login").val(result);
				   console.log(components) // an array of components: {key: ..., value: ...}

				   console.log(result) // an array of components: {key: ..., value: ...}


			});

		})
	} else {
		setTimeout(function () {
			new Fingerprint2().get(function (result, components) {
			  console.log(components) // an array of components: {key: ..., value: ...}

			})
		}, 500)
	}

	</script> --}}

	<script>
		// if (window.requestIdleCallback) {
    	// 	requestIdleCallback(function () {
		// 		var options = {
    	// 			excludes: {
		// 				userAgent: true,
		// 				sessionStorage: true,
		// 				localStorage: true,
		// 				indexedDb: true,
		// 				addBevior: true,
		// 				openDatabase: true,
		// 				doNotTrack: true,
		// 				plugins: true,
		// 				canvas:true,
		// 				webgl:true,
		// 				adBlock:true,
		// 				fonts:true,
		// 				audio:true,
		// 				enumerateDevices: true,
		// 				webdriver:true,
		// 				webglVendorAndRenderer:true,
		// 				hasLiedLanguages:true,
		// 				hasLiedResolution:true,
		// 				hasLiedOs:true,
		// 				hasLiedBrowser:true,
		// 				touchSupport:true,
		// 				fontsFlash:true,
		// 				addBehavior:true
		// 			}
		// 		}
		// 		Fingerprint2.get(options, function (components) {
		// 	  		console.log(components) // an array of components: {key: ..., value: ...}

		// 			var values = components.map(function (component) { return component.value })
		// 			var murmur = Fingerprint2.x64hash128(values.join(''), 31)
		// 			hash = murmur;
		// 	   		$("#device_id_login").val(murmur);
		// 			console.log(murmur); //before options :9188e47be875c8d629553cd5d3b2c8d9; AFTER OPTIONS 63cc4ec5833f0ede976d11b8c0333474

		// 			//		online 880ed18a44c9abe5528122588b0cbe69
		// 			//		d99db7186fbd2e0da6c1037707663150
		// 			//		online dc03447fdfbbb5c7ea4dd64e381a9930
        // 		})
    	// 	})
		// } else {
    	// 	setTimeout(function () {
        // 		Fingerprint2.get(function (components) {
        //   			console.log(components) // an array of components: {key: ..., value: ...}
        // 		})
    	// 	}, 500)
		// }
	</script>


	@yield('footer-scripts')

	<script>
		$(document).ready(function(){
			$(".nav-link-click").click(function(){
        		$("#navbarSupportedContent").removeClass("show");
    		});
		});
	</script>
</body>

</html>