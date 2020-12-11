@extends('layout.app')

@section('banner-title')
{{ "Naziv Kursa" }}
@endsection

@section('content')
<div id="course-content">


    @if(Auth::guest())
        <section class="w3l-wecome-content-6">
            <!-- /content-6-section -->
            <div class="ab-content-6-mian py-5">
                <div class="container-fluid py-lg-5">
                    <div class="welcome-grids row">

                        <div class="col-md-10 offset-md-1">
                            <div class="row">
                                <div class="col-lg-6 welcome-image">
                                    <!-- <img src="assets/images/ab.jpg" class="img-fluid" alt="" /> -->
                                    <div style='padding:56.25% 0 0 0;position:relative;'>
                                        <iframe src='{{ $course->course_url }}' allowfullscreen frameborder='0'
                                            style='position:absolute;top:0;left:0;width:100%;height:100%;'>
                                        </iframe>
                                    </div>

                                    <div class="mt-5">
                                        {!! $course->course_content !!}
                                    </div>

                                    <div class="mt-2">
                                        <button class="btn btn-success btn-lg w-100"  data-toggle="modal" data-target="#exampleModal">Prijavi me</button>
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
                                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#how-to-apply"
                                                    role="tab" aria-controls="contact" aria-selected="false">Kako se
                                                    prijaviti ?</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                                aria-labelledby="home-tab">
                                                {!! $course->description !!}
                                            </div>
                                            <div class="tab-pane fade" id="profile" role="tabpanel"
                                                aria-labelledby="profile-tab">
                                                {!! $course->plan_and_program !!}
                                            </div>
                                            <div class="tab-pane fade" id="contact" role="tabpanel"
                                                aria-labelledby="contact-tab">

                                                <p class="my-4">
                                                    ovde cemo ubaciti cenovnik
                                                </p>
                                            </div>

                                            <div class="tab-pane fade" id="how-to-apply" role="tabpanel"
                                                aria-labelledby="contact-tab">
                                                <p class="my-4">
                                                    ovde cemo da ubacimo video snimak da vide kako ide prijava
                                                </p>
                                            </div>
                                        </div>

                                        <!-- <div class="button-4-pink">
                                                <div class="eff-4-pink"></div>
                                                <a href="#"> Procitaj vise</a>
                                            </div> -->
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

                            <h1>Dakle, šta čekate? Prijavite se!</h1>

                        </div>
                    </div>
                </div>
            </div>

        </section>

    @elseif(Auth::user())

        @if($user_ip == Auth::user()->ip_address || $user_ip == Auth::user()->ip_address_2)
        <h1 class="text-center">LOGOVAN JE</h1>
        <section class="w3l-wecome-content-6">
            <!-- /content-6-section -->
            <div class="ab-content-6-mian py-5">
                <div class="container-fluid py-lg-5">
                    <div class="welcome-grids row">

                        <div class="col-md-10 offset-md-1">
                            <div class="row">
                                <div class="col-lg-6 welcome-image">
                                    <!-- <img src="assets/images/ab.jpg" class="img-fluid" alt="" /> -->
                                    <div style='padding:56.25% 0 0 0;position:relative;'>
                                        <iframe src='{{ $course->course_url }}' allowfullscreen frameborder='0'
                                            style='position:absolute;top:0;left:0;width:100%;height:100%;'>
                                        </iframe>
                                    </div>

                                    <div class="mt-5">
                                        {!! $course->course_content !!}
                                    </div>

                                    <div class="mt-3">
                                        @if(count($user_assigned_to_course) == 0)
                                        <form action="{{route("course.subscription")}}" method="POST">
                                            @csrf
                                            <input type="submit" class="btn btn-success btn-lg w-100" name="" value="Prijavi me">
                                        </form>

                                        @else
                                            <h1 class="text-center">ima pristup</h1>
                                        @endif


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
                                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#how-to-apply"
                                                    role="tab" aria-controls="contact" aria-selected="false">Kako se
                                                    prijaviti ?</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                                aria-labelledby="home-tab">
                                                {!! $course->description !!}
                                            </div>
                                            <div class="tab-pane fade" id="profile" role="tabpanel"
                                                aria-labelledby="profile-tab">
                                                {!! $course->plan_and_program !!}
                                            </div>
                                            <div class="tab-pane fade" id="contact" role="tabpanel"
                                                aria-labelledby="contact-tab">

                                                <p class="my-4">
                                                    ovde cemo ubaciti cenovnik
                                                </p>
                                            </div>

                                            <div class="tab-pane fade" id="how-to-apply" role="tabpanel"
                                                aria-labelledby="contact-tab">
                                                <p class="my-4">
                                                    ovde cemo da ubacimo video snimak da vide kako ide prijava
                                                </p>
                                            </div>
                                        </div>

                                        <!-- <div class="button-4-pink">
                                                <div class="eff-4-pink"></div>
                                                <a href="#"> Procitaj vise</a>
                                            </div> -->
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


        @else
        <div class="row">
            <div class="col-8 offset-2 mt-4">
                <div class="alert alert-danger text-center" role="alert">
                    Pokusavate da pristupite kursu sa trece ip adrese. Pristup je dozvoljen samo sa 2 ip adrese!
                </div>
            </div>
        </div>
        @endif


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

                        <h1>Dakle, šta čekate? Prijavite se!</h1>

                    </div>
                </div>
            </div>
        </div>

    </section>

    @endif

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Prijava za kurs: {{ $course->name }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route("course.subscription")}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Ime i Prezime</label>
                    <input type="text" class="form-control" name="name" placeholder="Nikola Petrovic">
                </div>

                <div class="form-group">
                    <label>Godina rodjenja</label>
                    <select name="yob" class="form-control">
                         @for ($year=2015; $year >= 1900; $year--)
                            <option value="{{$year}}">{{ $year }}</option>
                         @endfor
                    </select>
                </div>

                <div class="form-group">
                    <label>Status veze:</label> <br>
                    <div class="radio">
                        <label class=""><input type="radio" name="relationship" checked> Nisam u vezi</label>
                    </div>

                    <div class="radio">
                        <label class=""><input type="radio" name="relationship"> U vezi sam</label>
                    </div>

                    <div class="radio">
                        <label class=""><input type="radio" name="relationship"> U braku sam</label>
                    </div>

                    <div class="radio">
                        <label class=""><input type="radio" name="relationship"> Komplikovano je</label>
                    </div>

                </div>

                <div class="form-group">
                    <label>Zanimanje</label>
                    <input type="text" class="form-control" name="profession" placeholder="Vase zanimanje">
                </div>

                <div class="form-group">
                    <label>Zivim u:</label>
                    <div class="radio">
                        <label class=""><input type="radio" name="country" checked> Srbiji</label>
                    </div>

                    <div class="radio">
                        <label class=""><input type="radio" name="country"> Van Srbije</label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Email address</label>
                    <input type="email" class="form-control"  name="email" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text- text-danger">Ukoliko ste se vec prijavljivali na neki kurs, potrebno je da se ulogujete kako biste se prijavili.</small>
                </div>

                <div class="form-group">
                    <label>Kontakt telefon:</label>
                    <input type="text" class="form-control" name="phone" placeholder="Vase broj telefona">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Odustani</button>
                    <button type="submit" class="btn btn-primary">Prijavi me</button>
                  </div>
            </form>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection