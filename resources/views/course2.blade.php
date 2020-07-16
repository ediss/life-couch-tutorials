@extends('layout.app')

@section('title')
{{ $course->name }}
@endsection

@section('banner-title')
{{ $course->name }}
@endsection

@section('content')

<div id="course-content">
    <section class="w3l-wecome-content-6">
        <!-- /content-6-section -->
        <div class="ab-content-6-mian py-5">
            <div class="container-fluid py-lg-5">
                <div class="welcome-grids row">

                    <div class="col-md-10 offset-1">
                        <div class="row">
                            @if(Auth::user())

                            @if(count($user_assigned_to_course) > 0)


                            @if($device == Auth::user()->device_id || $device == Auth::user()->device_id_2)
                            <h1>VALIDNE ADRESE i ima PRISTUP</h1>
                            <div class="col-lg-10 offset-1 welcome-image">
                                <!-- <img src="assets/images/ab.jpg" class="img-fluid" alt="" /> -->
                                <div style='padding:56.25% 0 0 0;position:relative;'>
                                    <iframe src='{{ $course->course_url }}' allowfullscreen frameborder='0'
                                        style='position:absolute;top:0;left:0;width:100%;height:100%;'>
                                    </iframe>
                                </div>
                                <div class="mt-5">
                                    {!! $course->course_content !!}
                                </div>
                            </div>
                            @else

                            <div class="col-8 offset-2">
                                <div class="alert alert-danger text-center" role="alert">
                                    Pokusavate da pristupite kursu sa trece ip adrese. Pristup je dozvoljen samo sa 2 ip
                                    adrese!
                                </div>
                            </div>

                            <div class="col-8 offset-2 text-center">
                                <h1>FORMA ZA POMOC UKOLIKO MISLI DA JE DOSLO DO GRESKE</h1>
                            </div>

                            @endif
                            @else
                            <div class="col-12">
                                <h1>LOGOVAN ALI NEMA PRISTUP</h1>
                            </div>

                            <div class="col-lg-6 welcome-image">
                                <!-- <img src="assets/images/ab.jpg" class="img-fluid" alt="" /> -->
                                <div style='padding:56.25% 0 0 0;position:relative;'>
                                    <iframe src='{{ $course->course_url }}' allowfullscreen frameborder='0'
                                        style='position:absolute;top:0;left:0;width:100%;height:100%;'>
                                    </iframe>
                                </div>

                                <div class="mt-5 ml-3">
                                    {!! $course->course_content !!}
                                </div>

                                <div class="mt-2">
                                    <form action="{{route('course.subscription', ['course_id' => $course->id])}}"
                                        method="POST">
                                        @csrf
                                        <input type="submit" class="btn btn-success btn-lg w-100" name=""
                                            value="Prijavi me">
                                    </form>
                                </div>
                            </div>

                            <div class="col-lg-6 mb-lg-0 mb-5">
                                <!-- <h6>About Us</h6> -->

                                <div class="course-desc">
                                    <h3 class="hny-title">
                                        {{$course->name}}
                                    </h3>
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                                role="tab" aria-controls="home" aria-selected="true">Opis Kursa</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                                role="tab" aria-controls="profile" aria-selected="false">Program
                                                Kursa</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="price-tab" data-toggle="tab" href="#price"
                                                role="tab" aria-controls="price" aria-selected="false">Cena</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" id="payment-slip-tab" data-toggle="tab"
                                                href="#payment-slip" role="tab" aria-controls="payment-slip"
                                                aria-selected="false">Primer
                                                Uplatnice</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">

                                        <div class="tab-pane fade show active my-4" id="home" role="tabpanel"
                                            aria-labelledby="home-tab">
                                            {!! $course->description !!}
                                        </div>
                                        <div class="tab-pane fade my-4" id="profile" role="tabpanel"
                                            aria-labelledby="profile-tab">
                                            {!! $course->plan_and_program !!}
                                        </div>
                                        <div class="tab-pane fade " id="price" role="tabpanel"
                                            aria-labelledby="price-tab">

                                            <p class="my-4">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">U celini</th>
                                                            <th scope="col">Iz inostranstva</th>
                                                            <th scope="col">Premium paket</th>
                                                            <th scope="col">Prijava do
                                                                {{ date('d-M-Y', strtotime($course_price->aplication_to)) }}
                                                            </th>
                                                            <th scope="col">U {{ $course_price->number_of_rate }} rata
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ $course_price->payment_in_full }}</td>
                                                            <td>{{ $course_price->payment_from_foreign_countries }}</td>
                                                            <td>{{ $course_price->premium_package }}</td>
                                                            <td>{{ $course_price->aplication_to_and_payfull }}</td>
                                                            <td>{{ $course_price->price_in_rate }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </p>
                                        </div>
                                        <div class="tab-pane fade my-4" id="payment-slip" role="tabpanel"
                                            aria-labelledby="uplatnica-tab">
                                            <div id="uplatnica">
                                                <div id="levo">
                                                    <div id="uplatnicanaslov">уплатилац</div>
                                                    <div id="uplatilac">
                                                        <p class="mt-1" style="font-size: 16px; margin: 10px">
                                                            {{Auth::user()->name}}
                                                            <br>
                                                            {{Auth::user()->email}}
                                                        </p>

                                                    </div>
                                                    <div id="svrhauplatenaslov">сврха уплате</div>
                                                    <div id="svrhauplate">
                                                        <p class="mt-3" style="margin: 10px; font-size: 16px">
                                                            {{$course->name}}
                                                        </p>
                                                    </div>
                                                    <div id="primalacnaslov">прималац</div>
                                                    <div id="primalac">
                                                        <p class="mt-3" style="margin: 10px; font-size: 16px">Maja
                                                            Vučković</p>
                                                    </div>
                                                </div>
                                                <div id="desno">
                                                    <!-- naslov -->
                                                    <div id="naslov">налог за уплату</div>
                                                    <!-- desna kolona -->
                                                    <div id="desnakolona">
                                                        <div id="kolonaiznos">
                                                            <div id="kolonaiznosnaslov">
                                                                <div id="sifraplacanjanaslov">шифра плаћања</div>
                                                                <div id="valutanaslov">валута</div>
                                                                <div id="iznosnaslov">износ</div>
                                                            </div>
                                                            <div id="kolonaiznosunos">
                                                                <!-- unos podataka -->
                                                                <div id="sifraplacanjaunos"> </div>
                                                                <div id="valutaunos">RSD </div>
                                                                <div id="iznosunos"> </div>
                                                            </div>
                                                        </div>

                                                        <!-- kraj prve kolone -->
                                                        <!-- početak srednje kolone -->
                                                        <div id="racunprimaoca">
                                                            <div id="racunprimaocanaslov">рачун примаоца</div>
                                                            <div id="racunprimaocaunos"> </div>
                                                        </div>
                                                        <!-- kraj srednje kolone -->
                                                        <!-- početak donje kolone -->
                                                        <div id="modelipozivnabr">
                                                            <div id="modelipozivbrnaslov">модел и позив на број
                                                                (одобрење)</div>
                                                            <div id="modelipozivunos">
                                                                <div id="modelunos"> </div>
                                                                <div id="pozivbrunos"> </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="footer">
                                                    <div id="pecatpotpis">печат и потпис уплатиоца</div>
                                                    <div id="mestounos">Beograd</div>
                                                    <div id="mestodatum">место и датум пријема</div>
                                                    <div id="datumvalute">датум валуте</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <!-- <div class="button-4-pink">
                                                                <div class="eff-4-pink"></div>
                                                                <a href="#"> Procitaj vise</a>
                                                            </div> -->
                                </div>

                            </div>
                            @endif

                            @else
                            <div class="col-lg-6 welcome-image">
                                <!-- <img src="assets/images/ab.jpg" class="img-fluid" alt="" /> -->
                                <div style='padding:56.25% 0 0 0;position:relative;'>
                                    <iframe src='{{ $course->course_url }}' allowfullscreen frameborder='0'
                                        style='position:absolute;top:0;left:0;width:100%;height:100%;'>
                                    </iframe>
                                </div>

                                <div class="mt-3 course-content">
                                    {!! $course->course_content !!}
                                </div>

                                <div class="mt-2">
                                    <a href="{{route('course.subscription', ['course_id' => $course->id])}}#form-apply"
                                        class="btn btn-success btn-lg w-100">Prijavi me</a>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-lg-0 mb-5">
                                <!-- <h6>About Us</h6> -->




                                <div class="course-desc">
                                    <h3 class="hny-title">
                                        {{$course->name}}
                                    </h3>
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                                role="tab" aria-controls="home" aria-selected="true">Opis Kursa</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                                role="tab" aria-controls="profile" aria-selected="false">Program
                                                Kursa</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact"
                                                role="tab" aria-controls="contact" aria-selected="false">Cena</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" id="payment-slip-tab" data-toggle="tab"
                                                href="#payment-slip" role="tab" aria-controls="payment-slip"
                                                aria-selected="false">Primer
                                                Uplatnice</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active my-4" id="home" role="tabpanel"
                                            aria-labelledby="home-tab">
                                            {!! $course->description !!}
                                        </div>
                                        <div class="tab-pane fade my-4" id="profile" role="tabpanel"
                                            aria-labelledby="profile-tab">
                                            {!! $course->plan_and_program !!}
                                        </div>
                                        <div class="tab-pane fade" id="contact" role="tabpanel"
                                            aria-labelledby="contact-tab">

                                            <p class="my-4">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">U celini</th>
                                                            <th scope="col">Iz inostranstva</th>
                                                            <th scope="col">Premium paket</th>
                                                            <th scope="col">Prijava do
                                                                {{ date('d-M-Y', strtotime($course_price->aplication_to)) }}
                                                            </th>
                                                            <th scope="col">U {{ $course_price->number_of_rate }} rata
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ $course_price->payment_in_full }}</td>
                                                            <td>{{ $course_price->payment_from_foreign_countries }}</td>
                                                            <td>{{ $course_price->premium_package }}</td>
                                                            <td>{{ $course_price->aplication_to_and_payfull }}</td>
                                                            <td>{{ $course_price->price_in_rate }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </p>
                                        </div>

                                        <div class="tab-pane fade my-4" id="payment-slip" role="tabpanel"
                                            aria-labelledby="uplatnica-tab">
                                            <div id="uplatnica">
                                                <div id="levo">
                                                    <div id="uplatnicanaslov">уплатилац</div>
                                                    <div id="uplatilac"><span style="font-size: 16px; margin: 10px">
                                                            Pera Peric </span>pera@gmail.com</div>
                                                    <div id="svrhauplatenaslov">сврха уплате</div>
                                                    <div id="svrhauplate"> <span style="margin: 10px; font-size: 16px">
                                                            {{$course->name}} </span></div>
                                                    <div id="primalacnaslov">прималац</div>
                                                    <div id="primalac"><span style="margin: 10px; font-size: 16px">
                                                            Maja Vučković </span> </div>
                                                </div>
                                                <div id="desno">
                                                    <!-- naslov -->
                                                    <div id="naslov">налог за уплату</div>
                                                    <!-- desna kolona -->
                                                    <div id="desnakolona">
                                                        <div id="kolonaiznos">
                                                            <div id="kolonaiznosnaslov">
                                                                <div id="sifraplacanjanaslov">шифра плаћања</div>
                                                                <div id="valutanaslov">валута</div>
                                                                <div id="iznosnaslov">износ</div>
                                                            </div>
                                                            <div id="kolonaiznosunos">
                                                                <!-- unos podataka -->
                                                                <div id="sifraplacanjaunos"> </div>
                                                                <div id="valutaunos">RSD </div>
                                                                <div id="iznosunos">
                                                                    {{$course_price->payment_in_full}},00 RSD </div>
                                                            </div>
                                                        </div>

                                                        <!-- kraj prve kolone -->
                                                        <!-- početak srednje kolone -->
                                                        <div id="racunprimaoca">
                                                            <div id="racunprimaocanaslov">рачун примаоца</div>
                                                            <div id="racunprimaocaunos"> </div>
                                                        </div>
                                                        <!-- kraj srednje kolone -->
                                                        <!-- početak donje kolone -->
                                                        <div id="modelipozivnabr">
                                                            <div id="modelipozivbrnaslov">модел и позив на број
                                                                (одобрење)</div>
                                                            <div id="modelipozivunos">
                                                                <div id="modelunos"> </div>
                                                                <div id="pozivbrunos"> </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="footer">
                                                    <div id="pecatpotpis">печат и потпис уплатиоца</div>
                                                    <div id="mestounos">Beograd</div>
                                                    <div id="mestodatum">место и датум пријема</div>
                                                    <div id="datumvalute">датум валуте</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="button-4-pink">
                                            <div class="eff-4-pink"></div>
                                            <a href="#"> Procitaj vise</a>
                                        </div> -->
                                </div>

                            </div>
                            @endif


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
                    <div class="col-10 offset-1">
                        <div class="row">
                            <div class="mission-gd-left col-lg-7">
                                <div class="grids-inn-ab">
                                    <div class="sub-mission one-top">
                                        <div class="mission-sec-gd">
                                            <img src="{{ asset("assets/images/p1.jpg") }}" alt="" class="img-fluid" />
                                        </div>
                                        <div class="mission-sec-gd">
                                            <img src="{{ asset("assets/images/p2.jpg") }}" alt="" class="img-fluid" />
                                        </div>

                                    </div>
                                    <div class="sub-mission">
                                        <div class="mission-sec-gd">
                                            <img src="{{ asset("assets/images/p6.jpg") }}" alt="" class="img-fluid" />
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
        <div class="team py-5">
            <div class="container py-lg-5">
                <div class="row team-row">
                    <div class="col-lg-12 text-justify">
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
        $(this).append('<i class="fa fa-play-circle fa-2x float-right"></i>');
        $(this).addClass('list-group-item');
    });
});

});

</script>



<script>
    var hash= '';
        if (window.requestIdleCallback) {
    requestIdleCallback(function () {
        new Fingerprint2().get(function(result, components){

           var device_id    = $("#device_id").val();
           var device_id_2  = $("#device_id_2").val();
           var device_id_3  = $("#device_id_subscription").val();

            if(result != device_id )


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

@endsection