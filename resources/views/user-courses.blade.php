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

                            <a href="{{route('single-course', ['id' => $course->id])}}#course-content" class="popup-with-zoom-anim play-view text-center position-absolute" href="{{route('single-course', ['id' => $course->id])}}#course-content">
                                <span class="video-play-icon">
                                    <span class="fa fa-play"></span>
                                </span>
                            </a>
                            <a href="{{route('single-course', ['id' => $course->id])}}#course-content"
                                ><img src="assets/images/p1.jpg" class="img-fluid" alt="">
                            </a>
                            <div class="course-content">
                                <div class="course-info">
                                    <h6><a class="course-instructor" href="{{route('about')}}#about-me"> Maja Vučković</a></h6>
                                    <a href="{{route('single-course', ['id' => $course->id])}}#course-content" class="course-titlegulp-wrapper">
                                        
                                        <h3 class="course-title">{{ $course->courses->name }}</h3>
                                    </a>
                                </div>

                                <a href="{{route('single-course', ['id' => $course->id])}}#course-content">
                                    <button class="price-course btn font-weight-bold w-100">Gledaj Kurs</button>
                                </a>

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