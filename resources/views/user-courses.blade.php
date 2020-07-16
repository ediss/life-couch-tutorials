@extends('layout.app')
@section('title')
Kursevi
@endsection

@section('breadcrumb-item')
@endsection
@section('banner-title')
Moji Kursevi

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
                    @foreach ($user_courses as $course)
                        @php $delay = $delay +100 @endphp
                    <div class="col-lg-4 col-md-6 course-grid" data-aos="fade-right" data-aos-offset="200"
                        data-aos-delay="{{$delay}}" data-aos-duration="400">
                        <div class="course-grid-inf box-shadow">

                            <a href="#"  class="popup-with-zoom-anim play-view text-center position-absolute" onclick=goToCourse({{$course->id}})>
                                <span class="video-play-icon">
                                    <span class="fa fa-play"></span>
                                </span>
                            </a>
                            <a href="#" onclick=goToCourse({{$course->id}})><img src="assets/images/p1.jpg" class="img-fluid" alt=""></a>
                            <div class="course-content">
                                <div class="course-info">
                                    <h6><a class="course-instructor" href="#"> Maja Vučković</a></h6>
                                    <a href="#" class="course-titlegulp-wrapper">
                                        
                                        <h3 class="course-title">{{ $course->courses->name }}</h3>
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
                                <a href="#" onclick=goToCourse({{$course->id}})><button class="price-course btn font-weight-bold w-100">SAZNAJ
                                        VIŠE</button></a>

                            </div>
                        </div>

                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
</div>
@endsection