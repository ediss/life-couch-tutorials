@extends('layout.app')

@section('title')
{{ $course->name }}
@endsection

@section('banner-title')
{{ $course->name }}
@endsection

@section('scroll-to')
#course-content
@endsection

@section('content')
<div id="course-content">
    <section class="w3l-wecome-content-6">
        <!-- /content-6-section -->
        <div class="ab-content-6-mian py-5">
            <div class="container-fluid py-lg-5">
                <div class="welcome-grids">

                    <div class="col-md-10 offset-md-1">
                        <h3 class="hny-title pb-5 pt-5">
                            {{$course->name}}
                        </h3>

                        <div style='padding:56.25% 0 0 0;position:relative;'><iframe src='https://vimeo.com/showcase/7568136/embed' allowfullscreen frameborder='0' style='position:absolute;top:0;left:0;width:100%;height:100%;'></iframe></div>

                        <div class="row">
                            <div class="col-md-10 offset-md-1">
                                @if(\Carbon\Carbon::now()->toDateString() > $course->course_available)

                                <div class="col-12">
                                    <div class="alert alert-danger text-center">
                                        Kurs je istekao
                                    </div>
                                </div>


                                <!-- <img src="assets/images/ab.jpg" class="img-fluid" alt="" /> -->
                                <div style='padding:56.25% 0 0 0;position:relative;'>
                                    <iframe src='{{ $course->intro_url }}' allowfullscreen frameborder='0'
                                        style='position:absolute;top:0;left:0;width:100%;height:100%;'>
                                    </iframe>
                                </div>



                                @else
                                <div style='padding:56.25% 0 0 0;position:relative;'>
                                    <iframe
                                        src='{{ (Auth::user() && count($user_assigned_to_course) > 0) ? $course->course_url : $course->intro_url  }}'
                                        allowfullscreen frameborder='0'
                                        style='position:absolute;top:0;left:0;width:100%;height:100%;'>
                                    </iframe>
                                </div>

                                <div class="mt-2">


                                    @if(\Carbon\Carbon::now()->toDateString() > $course->course_application_to)
                                    <a href="#" class="btn btn-success btn-lg w-100">Prijava za kurs je istekla!</a>
                                    @else
                                    @if(Auth::user())

                                    <form action="{{route('course.subscription', ['course_id' => $course->id])}}"
                                        method="POST">
                                        @csrf
                                        <input type="submit" class="btn btn-success btn-lg w-100" name=""
                                            value="Prijavi me">
                                    </form>
                                    @else
                                    <a href="{{route('course.subscription', ['course_id' => $course->id])}}#form-apply"
                                        class="btn btn-success btn-lg w-100">Prijavi me</a>
                                    @endif
                                    @endif
                                </div>
                                @endif
                            </div>



                        </div>

                       
                       


                        <div class="row mt-5">
                            <ul class="nav nav-tabs w-100" id="myTab" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link active" id="course-desc-tab" data-toggle="tab" href="#course-desc"
                                        role="tab" aria-controls="profile" aria-selected="false">
                                        <h3 class="hny-title">
                                            Opis
                                        </h3>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="course-program-tab" data-toggle="tab" href="#course-program"
                                        role="tab" aria-controls="contact" aria-selected="false">
                                        <h3 class="hny-title">
                                            Program
                                        </h3>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="course-content-tab" data-toggle="tab"
                                        href="#course-content2" role="tab" aria-controls="contact"
                                        aria-selected="false">
                                        <h3 class="hny-title">
                                            Sadržaj
                                        </h3>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="course-price-tab" data-toggle="tab"
                                        href="#course-price" role="tab" aria-controls="price"
                                        aria-selected="false">
                                        <h3 class="hny-title">
                                            Cenovnik
                                        </h3>
                                    </a>
                                </li>

                            </ul>
                        </div>

                        <div class="tab-content mt-5" id="myTabContent">
                            
                            <div class="tab-pane fade show active" id="course-desc" role="tabpanel"
                                aria-labelledby="course-desc-tab">

                                {!! $course->description !!}

                            </div>
                            <div class="tab-pane fade" id="course-program" role="tabpanel"
                                aria-labelledby="course-program-tab">
                                {!! $course->plan_and_program !!}

                            </div>

                            <div class="tab-pane fade" id="course-content2" role="tabpanel"
                                aria-labelledby="course-content-tab">
                                <div class="course-content">
                                    {!! $course->course_content !!}
                                </div>

                            </div>

                            <div class="tab-pane fade" id="course-price" role="tabpanel"
                                aria-labelledby="course-price-tab">
                                <div class="row mt-3">
                                    <div class="col-md-4 mb-4 mb-lg-0">
                                        <div class="card text-white btn-success mb-3 h-100">
                                            <div class="card-header text-center">
                                                <h3>Premium paket</h3>
                                            </div>
                                            <div class="card-body text-center">
                                                <h5 class="card-title">{{ $course_price->premium_package }} RSD</h5>
        
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4 mb-lg-0">
                                        <div class="card text-white btn-success mb-3 h-100">
                                            <div class="card-header text-center">
                                                <h3> Prijava do
                                                    {{ date('d-M-Y', strtotime($course_price->aplication_to)) }}</h3>
                                            </div>
                                            <div class="card-body text-center">
                                                <h5 class="card-title">{{ $course_price->aplication_to_and_payfull }} RSD</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4 mb-lg-0">
                                        <div class="card text-white btn-success mb-3 h-100">
                                            <div class="card-header text-center">
                                                <h3> U ratama. Broj rata: {{ $course_price->number_of_rate }}</h3>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title  text-center">{{ $course_price->price_in_rate }} RSD</h5>
        
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">

                                  
        
                                    <div class="col-md-4 mb-4 mb-lg-0">
                                        <div class="card text-white btn-success mb-3 h-100">
                                            <div class="card-header text-center">
                                                <h3> U celini</h3>
                                            </div>
                                            <div class="card-body text-center">
                                                <h5 class="card-title">{{ $course_price->payment_in_full }}
                                                    RSD</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4 mb-lg-0">
                                        <div class="card text-white btn-success mb-3 h-100">
                                            <div class="card-header text-center">
                                                <h3> Iz inostranstva </h3>
                                            </div>
                                            <div class="card-body text-center">
                                                <h5 class="card-title">{{ $course_price->payment_from_foreign_countries }}
                                                    &euro;
                                                </h5>
        
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4 mb-lg-0">
                                        <div class="card text-white btn-success mb-3 h-100">
                                            <div class="card-header text-center">
                                                <h3> Iz inostranstva (u ratama)</h3>
                                            </div>
                                            <div class="card-body text-center">
                                                <h5 class="card-title">
                                                    {{ $course_price->payment_from_foreign_countries_in_rate }}
                                                    &euro;
                                                </h5>
        
                                            </div>
                                        </div>
                                    </div>
        
                                </div>
                            </div>

                
                        </div>


                    </div>

                </div>

            </div>
        </div>
    </section>

    <section class="w3l-specification-6">
        <!-- /specification-6-->
        <div class="specification-content py-5">
            <div class="container-fluid py-lg-5">
                <div class="mission-grids-info row">
                    <div class="col-md-10 offset-md-1">
                        <div class="row">
                            <div class="mission-gd-left col-lg-7">
                                <div class="grids-inn-ab">
                                    <div class="sub-mission one-top">
                                        <div class="mission-sec-gd">
                                            <img src="{{ asset("assets/images/p1.jpg") }}" alt="" class="img-fluid" />
                                        </div>
                                        {{-- <div class="mission-sec-gd">
                                            <img src="{{ asset("assets/images/p2.jpg") }}" alt="" class="img-fluid" />
                                    </div> --}}

                                </div>
                                <div class="sub-mission">
                                    <div class="mission-sec-gd">
                                        <img src="{{ asset("assets/images/p2.jpg") }}" alt="" class="img-fluid" />
                                    </div>
                                    <div class="mission-sec-gd">
                                        <img src="{{ asset("assets/images/p4.jpg") }}" alt="" class="img-fluid" />
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="mission-gd-right col-lg-5 pl-lg-4">

                            <h3 class="hny-title">Kako je organizovan kurs</h3>
                            {!! $course->course_organisation !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="w3l-content-5">
        <!-- /content-6-section -->
        <div class="content-5-main">
            <div class="container">
                <div class="content-info-in row">
                    <div class="content-gd col-lg-6">
                        <h3 class="hny-title two">
                            Zašto su ovi kursevi drugačiji od ostalih sličnih?
                        </h3>
                    </div>
                    <div class="content-gd col-lg-6">


                    </div>

                </div>

            </div>
        </div>
    </section>

    <section class="w3l-team-main">
        <div class="ab-content-6-mian py-5">
            <div class="container-fluid py-lg-5">
                <div class="welcome-grids">
                    <div class="col-lg-10 offset-lg-1 text-justify">
                        <p>
                            Pripadam integrativnom psihodinamskom pravcu u koučingu i psihoterapiji, pa su i ovi kursevi
                            napravljeni u tom duhu: nije ideja da naučite neke šeme i obrasce ’kako se stvari rade’ već
                            kako biti u stanju na dubinskom nivou da učinite promene, da razvijete neophodne psihološke
                            veštine kako bi korekcija u komunikaciji i ponašanju bila za vas logična i prirodna. Zato
                            vas ovi kursevi uče da budete spremni za bilo koju situaciju gde će ove vaše sposobnosti
                            biti na probi.
                            Po profesiji sam doktor medicine, akreditovani psihoterapeut i lajf kouč. Radila sam na
                            različitim pozicijama, u različitim poslovnim okruženjima. Ovi kursevi su spoj znanja iz
                            različitih oblasti (medicine, psihologije, koučinga, biznisa...) i iz različitih uglova: kao
                            lekara, predavača i edukatora, psihoterapeuta, roditelja, zaposlenog u velikoj korporaciji,
                            zaposlenog u privatnoj praksi, preduzetnika, žene, partnerke, prijatelja. Zato su od koristi
                            u različitim uslovima i kontekstima.
                            Svi kursevi su akreditovani od strane Udruženja za psihoterapiju, savetovanje i koučing.
                        </p>

                        <p>
                            Ovi kursevi su napravljeni tako da vam uštede vreme i novac: umesto gomile knjiga koje biste
                            kupovali i čitali, istraživali i proveravali, dovoljno je da izdvojite vreme i novac samo za
                            ovaj kurs! I ako vam se učini skupim, budite sigurni da je do verzije koja je sada vama
                            dostupna na kursu, potrošeno mnogo više novca i vremena nego što možete i da pretpostavite!
                            Verovatno do ogromnog broja informacija koje vam ja serviram na ovom kursu, nikada ne biste
                            ni došli, ni uz mnogo knjiga, novca i vremena.
                            Zato je učešće na ovim kursevima vaša najbolja investicija i ušteda!
                        </p>


                        <p>Držala sam ove kurseve i uživo, pohađala sam i sama mnogo kurseva. Dešavalo se da tog dana
                            jednostavno ’nije moj dan’, potrošim vreme na organizaciju i odlazak, na gužvu u saobraćaju,
                            poremetim druge obaveze, i na kraju ne mogu se dovoljno posvetiti predavanju jer sam umorna
                            i loše koncentracije, i veći deo predavanja propustim idući za svojim mislima! Za sve to ima
                            leka: online predavanja koja su vam dostupna uvek, slušate ih koliko god puta želite,
                            vraćate šta propustite, zaustavite kad vam odgovara. Sva predavanja koja sam pohađala onlajn
                            i koja su bila organizovana na ovaj način, imala su mnogo više efekta! Manite se priče kako
                            je direktno predavanje najbolja opcija! Ima nekih prednosti, ali ovakve teme se najbolje
                            obrađuju na ovaj način. Posebno što vam neće faliti interakcija sa drugim polaznicima i sa
                            predavačem. A možemo i kafu da pijemo zajedno! Opustite se i uključite predavanje. Nećete
                            najviše naučiti u direktnom kontaktu, već onda kad ste spremni i raspoloženi za učenje! A
                            ovakav način rada vam to dozvoljava. </p>

                        <h1 class="text-violet"> Dakle, šta čekate? <a
                                href="{{route('course.subscription', ['course_id' => $course->id])}}#form-apply"
                                class=""> <u>Prijavite se!</u> </a> </h1>

                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
@endsection


@section('footer-scripts')

<script>
    $( document ).ready(function() {

    $(".course-content").find("ul").addClass("list-group");

    $(function () {

    $('.list-group li').each(function () {
        $(this).addClass('list-group-item');
    });
});

});

</script>
@endsection