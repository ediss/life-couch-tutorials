@extends('layout.app')
@section('title')
Online Kursevi - Edukacija
@endsection

@section('meta-desc')
U doba interneta, edukacija je svima dostupna. Jednim klikom do nove veštine! Online Kursevi & Edukacija
@endsection

@section('breadcrumb-item')
Kursevi
@endsection
@section('banner-title')
    Kursevi
@endsection
@section('scroll-to')
#all-courses
@endsection

@section('content')
<div id="all-courses">

    <section class="w3l-services-2" id="courses">
        <!-- /content-6-section -->
        <div class="services-2-mian py-5">
            <div class="container py-lg-5 col-10 offset-1">
                <div class="row title-content">
                    <div class="col-12 title-left">
                        <h1 class="hny-title">U doba interneta, edukacija je svima dostupna. Jednim klikom do nove veštine! <br> Online Kursevi & Edukacija</h1>
                    </div>
                </div>
                <div class="welcome-grids row">
                    @php $delay = 0; @endphp
                    @foreach ($courses as $course)
                        @php $delay = $delay +100 @endphp
                    <div class="col-lg-4 col-md-6 course-grid" data-aos="fade-right" data-aos-offset="200"
                        data-aos-delay="{{$delay}}" data-aos-duration="400">
                        <div class="course-grid-inf box-shadow">
{{--
                            <a href="{{route('single-course', $course->slug)}}#course-content" class="popup-with-zoom-anim play-view text-center position-absolute" >
                                <span class="video-play-icon">
                                    <span class="fa fa-play"></span>
                                </span>
                            </a> --}}
                            <a href="{{route('single-course', $course->slug)}}#course-content" ><img src="{{ $course->cover_img !=null ? $course->cover_img : 'assets/images/banners/main-banner2.jpg' }}" class="img-fluid" alt=""></a>
                        <div class="course-content">
							<div class="course-info mb-5">
								<h6><a class="course-instructor" href="{{route('about')}}#about-me"> Maja Vučković</a></h6>
								<a href="#" class="course-titlegulp-wrapper">
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
                {{-- <div class="pagination p1" data-aos="zoom-in" data-aos-offset="100" data-aos-delay="300"
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
                </div> --}}
                <!-- //pagination-->
            </div>
        </div>
    </section>
</div>
@endsection