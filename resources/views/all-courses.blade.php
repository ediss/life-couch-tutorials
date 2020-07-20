@extends('layout.app')
@section('title')
Kursevi
@endsection

@section('breadcrumb-item')
Kursevi
@endsection
@section('banner-title')
    Kursevi
@endsection

@section('content')
<div id="all-courses">

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
                        @php $delay = $delay +100 @endphp
                    <div class="col-lg-4 col-md-6 course-grid" data-aos="fade-right" data-aos-offset="200"
                        data-aos-delay="{{$delay}}" data-aos-duration="400">
                        <div class="course-grid-inf box-shadow">
    
                            <a href="#"  class="popup-with-zoom-anim play-view text-center position-absolute" onclick=goToCourse({{$course->id}})>
                                <span class="video-play-icon">
                                    <span class="fa fa-play"></span>
                                </span>
                            </a>
                        <a href="#" onclick=goToCourse({{$course->id}})><img src="{{ $course->cover_img !=null ? $course->cover_img : 'assets/images/banners/main-banner2.jpg' }}" class="img-fluid" alt=""></a>
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
    
                    {{-- <div class="col-lg-4 col-md-6 course-grid" data-aos="fade-right" data-aos-offset="200"
                        data-aos-delay="100" data-aos-duration="400">
                        <div class="course-grid-inf box-shadow">
    
                            <a href="course.html" class="popup-with-zoom-anim play-view text-center position-absolute">
                                <span class="video-play-icon">
                                    <span class="fa fa-play"></span>
                                </span>
                            </a>
                            <a href="course.html"><img src="assets/images/p1.jpg" class="img-fluid" alt=""></a>
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
                    <div class="col-lg-4 col-md-6 course-grid" data-aos="fade-right" data-aos-offset="200"
                        data-aos-delay="200" data-aos-duration="400">
    
                        <div class="course-grid-inf box-shadow">
                            <a href="#" class="popup-with-zoom-anim play-view text-center position-absolute">
                                <span class="video-play-icon">
                                    <span class="fa fa-play"></span>
                                </span>
                            </a>
                            <a href="#"><img src="assets/images/p2.jpg" class="img-fluid" alt=""></a>
                            <div class="course-content">
                                <div class="course-info">
                                    <h6><a class="course-instructor" href="#"> Maja Vučković</a></h6>
                                    <a href="#" class="course-titlegulp-wrapper">
                                        <h3 class="course-title">Learn Digital Painting to Make Concept Art</h3>
                                    </a>
                                </div>
                                <div class="course-divider mb-5">
                                    <div class="course-meta grid"><span class="course-students" title=""><span
                                                class="fa fa-user" aria-hidden="true"></span> 36</span>
                                        <span class="course-reviews" title=""><span class="fa fa-thumbs-o-up"
                                                aria-hidden="true"></span> 24</span>
    
                                    </div>
                                    <!-- <button class="price-course btn font-weight-bold">SAZNAJ VIŠE</button> -->
                                </div>
                                <a href="course.html"><button class="price-course btn font-weight-bold w-100">SAZNAJ
                                        VIŠE</button></a>
                            </div>
                        </div>
    
                    </div>
                    <div class="col-lg-4 col-md-6 course-grid" data-aos="fade-right" data-aos-offset="200"
                        data-aos-delay="300" data-aos-duration="400">
                        <div class="course-grid-inf box-shadow">
                            <a href="#" class="popup-with-zoom-anim play-view text-center position-absolute">
                                <span class="video-play-icon">
                                    <span class="fa fa-play"></span>
                                </span>
                            </a>
                            <a href="#"><img src="assets/images/p3.jpg" class="img-fluid" alt=""></a>
                            <div class="course-content">
                                <div class="course-info">
                                    <h6><a class="course-instructor" href="#"> Maja Vučković</a></h6>
                                    <a href="#" class="course-titlegulp-wrapper">
                                        <h3 class="course-title">Interior Design & Development Course</h3>
                                    </a>
                                </div>
                                <div class="course-divider mb-5">
                                    <div class="course-meta grid"><span class="course-students" title=""><span
                                                class="fa fa-user" aria-hidden="true"></span> 56</span>
                                        <span class="course-reviews" title=""><span class="fa fa-thumbs-o-up"
                                                aria-hidden="true"></span> 44</span>
    
                                    </div>
                                    <!-- <button class="price-course btn font-weight-bold">SAZNAJ VIŠE</button> -->
                                </div>
                                <a href="course.html"><button class="price-course btn font-weight-bold w-100">SAZNAJ
                                        VIŠE</button></a>
                            </div>
                        </div>
    
                    </div>
                    <div class="col-lg-4 col-md-6 course-grid" data-aos="fade-right" data-aos-offset="200"
                        data-aos-delay="400" data-aos-duration="400">
                        <div class="course-grid-inf box-shadow">
                            <a href="#" class="popup-with-zoom-anim play-view text-center position-absolute">
                                <span class="video-play-icon">
                                    <span class="fa fa-play"></span>
                                </span>
                            </a>
                            <a href="#"><img src="assets/images/p4.jpg" class="img-fluid" alt=""></a>
                            <div class="course-content">
                                <div class="course-info">
                                    <h6><a class="course-instructor" href="#"> Maja Vučković</a></h6>
                                    <a href="#" class="course-titlegulp-wrapper">
                                        <h3 class="course-title">Mastering Web Developer Interview Code</h3>
                                    </a>
                                </div>
                                <div class="course-divider mb-5">
                                    <div class="course-meta grid"><span class="course-students" title=""><span
                                                class="fa fa-user" aria-hidden="true"></span> 46</span>
                                        <span class="course-reviews" title=""><span class="fa fa-thumbs-o-up"
                                                aria-hidden="true"></span> 44</span>
    
                                    </div>
                                    <!-- <button class="price-course btn font-weight-bold">SAZNAJ VIŠE</button> -->
                                </div>
                                <a href="course.html"><button class="price-course btn font-weight-bold w-100">SAZNAJ
                                        VIŠE</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 course-grid" data-aos="fade-right" data-aos-offset="200"
                        data-aos-delay="500" data-aos-duration="400">
                        <div class="course-grid-inf box-shadow">
                            <a href="#" class="popup-with-zoom-anim play-view text-center position-absolute">
                                <span class="video-play-icon">
                                    <span class="fa fa-play"></span>
                                </span>
                            </a>
                            <a href="#"><img src="assets/images/p8.jpg" class="img-fluid" alt=""></a>
                            <div class="course-content">
                                <div class="course-info">
                                    <h6><a class="course-instructor" href="#"> Maja Vučković</a></h6>
                                    <a href="#" class="course-titlegulp-wrapper">
                                        <h3 class="course-title">Photoshop For T-shirt Design: For Beginners</h3>
                                    </a>
                                </div>
                                <div class="course-divider mb-5">
                                    <div class="course-meta grid"><span class="course-students" title=""><span
                                                class="fa fa-user" aria-hidden="true"></span> 36</span>
                                        <span class="course-reviews" title=""><span class="fa fa-thumbs-o-up"
                                                aria-hidden="true"></span> 34</span>
    
                                    </div>
                                    <!-- <button class="price-course btn font-weight-bold">SAZNAJ VIŠE</button> -->
                                </div>
                                <a href="course.html"><button class="price-course btn font-weight-bold w-100">SAZNAJ
                                        VIŠE</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 course-grid" data-aos="fade-right" data-aos-offset="200"
                        data-aos-delay="600" data-aos-duration="400">
                        <div class="course-grid-inf box-shadow">
                            <a href="#" class="popup-with-zoom-anim play-view text-center position-absolute">
                                <span class="video-play-icon">
                                    <span class="fa fa-play"></span>
                                </span>
                            </a>
                            <a href="#"><img src="assets/images/p6.jpg" class="img-fluid" alt=""></a>
                            <div class="course-content">
                                <div class="course-info">
                                    <h6><a class="course-instructor" href="#"> Maja Vučković</a></h6>
                                    <a href="#" class="course-titlegulp-wrapper">
                                        <h3 class="course-title">Beginner to Expert Guide for Consignment</h3>
                                    </a>
                                </div>
                                <div class="course-divider mb-5">
                                    <div class="course-meta grid"><span class="course-students" title=""><span
                                                class="fa fa-user" aria-hidden="true"></span> 36</span>
                                        <span class="course-reviews" title=""><span class="fa fa-thumbs-o-up"
                                                aria-hidden="true"></span> 34</span>
    
                                    </div>
                                    <!-- <button class="price-course btn font-weight-bold">SAZNAJ VIŠE</button> -->
                                </div>
                                <a href="course.html"><button class="price-course btn font-weight-bold w-100">SAZNAJ
                                        VIŠE</button></a>
                            </div>
                        </div>
                    </div> --}}
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