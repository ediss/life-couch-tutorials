@extends('layout.app')

@section('title')
Početna
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
						<a class="popup-with-zoom-anim play-view text-center position-absolute" onclick=goToCourse({{$course->id}})>
							<span class="video-play-icon">
								<span class="fa fa-play"></span>
							</span>
						</a>
						<a href="#" onclick=goToCourse({{$course->id}})>
							<img src="{{ $course->cover_img !=null ? $course->cover_img : 'assets/images/banners/main-banner2.jpg' }}" class="img-fluid" alt="">
						</a>
						<div class="course-content">
							<div class="course-info mb-5">
								<h6><a class="course-instructor" href="{{route('about')}}#about-me"> Maja Vučković</a></h6>
								<a href="#" class="course-titlegulp-wrapper">
									<h3 class="course-title">{{ $course->name }}</h3>
								</a>
							</div>

							<a href="#" onclick=goToCourse({{$course->id}})><button
									class="price-course btn font-weight-bold w-100">SAZNAJ
									VIŠE</button></a>

						</div>
						<div class="course-info">

							<i class="fa fa-calendar" aria-hidden="true"></i> Prijava do:{{ date('d-M-Y', strtotime($course->course_application_to)) }}
							<i class="fa fa-hourglass-half ml-4" aria-hidden="true"></i> Još: {{\Carbon\Carbon::now()->diffInDays($course->course_application_to)}} dana

						</div>
					</div>

				</div>
				@endforeach

				<div class="col-lg-4 col-md-6 course-grid" data-aos="fade-right" data-aos-offset="0"
					data-aos-delay="200" data-aos-duration="200">
					<div class="course-grid-inf box-shadow">

						<a href="course.html" class="popup-with-zoom-anim play-view text-center position-absolute">
							<span class="video-play-icon">
								<span class="fa fa-play"></span>
							</span>
						</a>
						<a href="course.html"><img src="assets/images/banners/main-banner2.jpg" class="img-fluid" alt=""></a>
						<div class="course-content">
							<div class="course-info">
								<h6><a class="course-instructor" href="#"> Maja Vučković</a></h6>
								<a href="#" class="course-titlegulp-wrapper">
									<h3 class="course-title">Design Thinking &#8211; Design Research and Analysis
									</h3>
								</a>
							</div>
							<div class="course-divider mb-5">
								<div class="course-meta grid"><span class="course-students" title=""><span
											class="fa fa-user" aria-hidden="true"></span> 46</span>
									<span class="course-reviews" title=""><span class="fa fa-thumbs-o-up"
											aria-hidden="true"></span> 14</span>

								</div>
								<!-- <button class="price-course btn font-weight-bold">SAZNAJ VIŠE</button> -->
							</div>
							<a href="course.html"><button class="price-course btn font-weight-bold w-100">SAZNAJ
									VIŠE</button></a>

						</div>
					</div>

				</div>

				<div class="col-lg-4 col-md-6 course-grid" data-aos="fade-right" data-aos-offset="0"
					data-aos-delay="100" data-aos-duration="250">
					<div class="course-grid-inf box-shadow">

						<a href="course.html" class="popup-with-zoom-anim play-view text-center position-absolute">
							<span class="video-play-icon">
								<span class="fa fa-play"></span>
							</span>
						</a>
						<a href="course.html"><img src="assets/images/banners/main-banner2.jpg" class="img-fluid" alt=""></a>
						<div class="course-content">
							<div class="course-info">
								<h6><a class="course-instructor" href="#"> Maja Vučković</a></h6>
								<a href="#" class="course-titlegulp-wrapper">
									<h3 class="course-title">Design Thinking &#8211; Design Research and Analysis
									</h3>
								</a>
							</div>
							<div class="course-divider mb-5">
								<div class="course-meta grid"><span class="course-students" title=""><span
											class="fa fa-user" aria-hidden="true"></span> 46</span>
									<span class="course-reviews" title=""><span class="fa fa-thumbs-o-up"
											aria-hidden="true"></span> 14</span>

								</div>
								<!-- <button class="price-course btn font-weight-bold">SAZNAJ VIŠE</button> -->
							</div>
							<a href="course.html"><button class="price-course btn font-weight-bold w-100">SAZNAJ
									VIŠE</button></a>

						</div>
					</div>

				</div>
			</div>

			<!-- /pagination-->
			<div class="pagination p1" data-aos="zoom-in" data-aos-offset="100" data-aos-delay="300"
				data-aos-duration="400">
				<ul>
					<a href="#">
						<li> <span class="fa fa-angle-double-left" aria-hidden="true"></span></li>
					</a>
					<a class="is-active" href="#">
						<li>1</li>
					</a>
					<a href="#">
						<li>2</li>
					</a>
					<a href="#">
						<li>3</li>
					</a>
					<a href="#">
						<li>4</li>
					</a>
					<a href="#">
						<li>5</li>
					</a>
					<a href="#">
						<li>6</li>
					</a>
					<a href="#">
						<li><span class="fa fa-angle-double-right" aria-hidden="true"></span></li>
					</a>
				</ul>
			</div>
			<!-- //pagination-->
		</div>
	</div>
</section>
<!-- //content-6-section -->
<section class="w3l-features-1" data-aos="zoom-out2" data-aos-offset="100" data-aos-delay="100" data-aos-duration="600"
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
							<!-- <div id="small-dialog" class="zoom-anim-dialog mfp-hide">
								<iframe src="https://player.vimeo.com/video/279436396" frameborder="0" allow="autoplay; fullscreen" allowfullscreen=""></iframe>
							</div> -->
							<!--//popup-->
						</div>
					</div>
					<div class="video-gd-left col-lg-5 p-4">
						<div class="p-xl-4 p-0 video-wrap">
							<h3 class="hny-title text-left">
								Maja Vučković</h3>
							<p>Zdravo i hvala ti što si ovde!</p>
							<p>Ako tražiš podršku na svom putu ka ispunjenom životu, ličnom i profesionalnom, ako si
								na životnoj raskrsnici ili ti se sav teret ovoga sveta sručio na leđa, ako se osećaš
								kao da te vrtlog neraspoloženja i neuspeha vuče ka dnu sve više, da ti nedostaje
								usmerenje ili neko ko će da ti pomogne da sav taj haos u glavi pretočiš u jasne
								misli i uspešne akcije - nastavi sa čitanjem, na pravom si mestu. Zovem se Maja, ja
								sam doktor medicine, psihoterapeut i life coach, majka jednog tinejdžera i tetka
								jedne 6-godišnjakinje. Ovo su važne stvari u mom životu.</p>
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
		</div>
		<form method="post">
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
