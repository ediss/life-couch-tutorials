@extends('layout.app')

@section('title')
Početna
@endsection

@section('scroll-to')
#courses
@endsection

@section('content')
<section class="w3l-services-2" id="courses">
	<!-- /content-6-section -->
	<div class="services-2-mian py-5">
		<div class="container py-lg-5 col-10 offset-1">
			<div class="row title-content">
				<div class="col-lg-4 title-left">
					<h3 class="hny-title">Učite bilo gde!</h3>
				</div>
				<div class="col-lg-8 title-info">
					<p><b>U doba interneta, edukacija je svima dostupna. Jednim klikom do nove veštine!
						</b></p>
				</div>
			</div>
			<div class="welcome-grids row">
				@php $delay = 0; @endphp

				@foreach ($courses as $course)
				@php $delay = $delay +50 @endphp

				<div class="col-lg-4 col-md-6 course-grid" data-aos="fade-right" data-aos-offset="0"
					data-aos-delay="{{ $delay }}" data-aos-duration="50">
					<div class="course-grid-inf box-shadow">

						<input type="hidden" id="route" value="{{ route('contact') }}">
						<a class="popup-with-zoom-anim play-view text-center position-absolute" href="{{route('single-course', $course->slug)}}#course-content">
							<span class="video-play-icon">
								<span class="fa fa-play"></span>
							</span>
						</a>
						<a href="{{route('single-course', $course->slug)}}#course-content" >
							<img src="{{ $course->cover_img !=null ? $course->cover_img : 'assets/images/banners/main-banner2.jpg' }}" class="img-fluid" alt="">
						</a>
						<div class="course-content">
							<div class="course-info mb-5">
								<h6><a class="course-instructor" href="{{route('about')}}#about-me"> Maja Vučković</a></h6>
								<a href="{{route('single-course', $course->slug)}}#course-content" class="course-titlegulp-wrapper" >
									<h3 class="course-title">{{ $course->name }}</h3>
								</a>
							</div>

							<a href="{{route('single-course', $course->slug)}}#course-content" ><button
									class="price-course btn font-weight-bold w-100">SAZNAJ
									VIŠE</button></a>

						</div>
						<div class="course-info">

							<i class="fa fa-calendar" aria-hidden="true"></i>
							@if(\Carbon\Carbon::now() <= $course->course_application_to)
								Prijava do: {{ date('d-M-Y', strtotime($course->course_application_to)) }}
								<br>
								<i class="fa fa-hourglass-half" aria-hidden="true"></i>

								Još: {{\Carbon\Carbon::now()->diffInDays($course->course_application_to)}} dana
							@else
								Prijava je istekla
							@endif
						</div>
					</div>

				</div>
				@endforeach

			</div>

			<!-- /pagination-->
			<div class="row">
				<div class="col-12">
					<div class="button-4-pink col-md-4 offset-md-4 mt-4">
						<div class="eff-4-pink"></div>
						<a href="{{ route('all-courses') }}#all-courses"> Svi kursevi</a>
					</div>
				</div>
			</div>
			
			<!-- //pagination-->
		</div>
	</div>
</section>
<!-- //content-6-section -->



<section class="w3l-features-1" data-aos="zoom-out2" data-aos-offset="100" data-aos-delay="100" data-aos-duration="300"
	id="about">
	<!-- /features-1-->
	<div class="features-1-mian py-5">
		<div class="video-66-info">
			<div class="container-fluid">
				<div class="video-grids-info row">
					<div class="video-gd-right col-lg-7">
						<div class="video-inner history-info text-center">
							<!--popup-->
							<a href="#small-dialog"
								class="popup-with-zoom-anim play-view text-center position-absolute">
								<span class="video-play-icon">
									<span class="fa fa-play"></span>
								</span>
							</a>

							<!-- dialog itself, mfp-hide class is required to make dialog hidden -->
							<div id="small-dialog" class="zoom-anim-dialog mfp-hide">
								<iframe src="https://player.vimeo.com/video/444928412" width="100%" height="auto" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
							</div>
							<!--//popup-->
						</div>
					</div>
					<div class="video-gd-left col-lg-5 p-4">
						<div class="p-xl-4 p-0 video-wrap">
							<h3 class="hny-title text-left">
								Maja Vučković</h3>
							<p>Dobro došli na moju stranicu namenjenu onlajn treninzima!</p>
							<p class="mt-4">
								Ja sam <b>Maja Vučković, doktor medicine, akreditovani psihoterapeut i lajf kouč.</b> Iza sebe imam godine radnog staža u psihoterapeutskoj i lekarskoj praksi, u marketingu i prodaji, u edukacijama i treninzima.
							</p>
							<p>
								Godinama se moj život odvijao na relaciji Niš-Beograd, a od skoro živim i u Kijevu. Na sreću, zahvaljujući tehnologiji, uprkos nestalnom mestu boravka, mogu da imam stalne klijente: radim uglavnom onlajn, preko bilo koje aplikacije sa opcijom video-poziva.
							</p>

							<p>
								<b>Osnivač sam i predsednik udruženja „Life Leaf“ </b>koje se bavi psihološkom pomoći ljudima sa smanjenim učešćem u socijalnom životu, zbog bolesti, invaliditeta i slično.
							</p>
							<div class="button-4-pink">
								<div class="eff-4-pink"></div>
								<a href="{{ route('about') }}#about-me"> Vidi više</a>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	</div>
</section>
<section class="w3l-features-1 box-shadow add-banner" id="contact">
	<div class="container contact-form">
		<div class="contact-image">
			<i class="fa fa-paper-plane fa-5x"></i>
			<!-- <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact" /> -->
			<div class="m-5">
                @include('flash-message')
            </div>
		</div>
		<form action="{{ route('contact') }}" method="POST">

			@csrf
			<h3>Kontaktirajte Me!</h3>
			<div class="row">
				<div class="col-12 col-md-6">
					<div class="form-group">
						<input type="text" name="txtName" class="form-control" placeholder="Ime i Prezime *" value="" />
					</div>
					<div class="form-group">
						<input type="text" name="txtEmail" class="form-control" placeholder="E-mail adresa*" value="" />
					</div>


				</div>
				<div class="col-12 col-md-6">
					<div class="form-group">
						<textarea name="txtMsg" class="form-control" placeholder="Vaša Poruka *"
							style="width: 100%; height: 95px;"></textarea>
					</div>

				</div>
				<div class="col-12 text-center mt-3">
					<div class="form-group">
						<input type="submit" name="btnSubmit" class="btnContact" value="Pošalji" />
					</div>
				</div>
			</div>
		</form>
	</div>
</section>
@endsection

@section('footer-scripts')

<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script>
  $(document).ready(function () {
    $('.popup-with-zoom-anim').magnificPopup({
      type: 'inline',

      fixedContentPos: false,
      fixedBgPos: true,

      overflowY: 'auto',

      closeBtnInside: true,
      preloader: false,

      midClick: true,
      removalDelay: 300,
      mainClass: 'my-mfp-zoom-in'
    });

    $('.popup-with-move-anim').magnificPopup({
      type: 'inline',

      fixedContentPos: false,
      fixedBgPos: true,

      overflowY: 'auto',

      closeBtnInside: true,
      preloader: false,

      midClick: true,
      removalDelay: 300,
      mainClass: 'my-mfp-slide-bottom'
    });
  });
</script>

	
@endsection
