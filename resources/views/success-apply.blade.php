@extends('layout.app')
@section('title')
Uspesna prijava
@endsection


@section('banner-title')
Uspešna Prijava

@endsection

@section('success')
<a href="#success" class="text-white"> <u>Vidi Više</u></a>
@endsection

@section('content')

<div id="success">

</div>

    <div class="row" style="margin-top:10%; margin-bottom:10%;">
        <div class="col-8 offset-2 text-justify box-shadow" style="padding:5%">
            <p class="">

                {{$gender == 'male' ? "Dragi" : "Draga"}}
                {{$user}},
            </p>
            <p>Hvala za prijavu na online kurs <b>{{ $course }}</b></p>

            <p>
                Nakon što izvršite uplatu, u skladu sa modelom plaćanja koji ste odabrali, dobićete odobrenje da pristupite platformi na kojoj se nalaze predavanja.
            </p>

            <p>
                Neće sva predavanja biti dostupna odjednom, već će biti postavljana u skladu sa dinamikom koja je dogovorena. Takođe, posle predavanja predviđena su i vežbanja u okviru interaktivnih grupa preko ZOOM-a koja se odvijaju u realnom vremenu, kao i komunikacija putem prepiski u zatvorenim fb grupama.
            </p>

            <p>
                Pozivam vas da maksimalno iskoristite sve pogodnosti koje ćete imati tokom trajanja kursa i vremena u kome je predviđeno da predavanja budu dostupna. Pitajte, komentarišite, istražujte, ne samo sa predavačem, već i sa ostalim polaznicima kursa. U toj razmeni informacija možete takođe još mnogo naučiti.
            </p>

            <p>
                Napominjem da predavanjima možete pristupiti tokom vremena trajanja kursa, u bilo koje vreme kad vam odgovara, ali je <b> pristup limitiran na dva uređaja</b>. Npr. ako najčešće koristite lap top, preporučujem da se logujete sa tog uređaja. Ukoliko želite da predavanjima pristupite i sa telefona, i to je moguće, ali kasnije vam neće biti omogućen pristup i sa trećeg uređaja! Ukoliko bude bilo kakvih problema, javite se i problem će biti rešen.
            </p>

            <p>
                Takođe, pristupate predavanjima isključivo sa email adrese koju ste dostavili prilikom prijave.
            </p>

            <p>
                <b>
                    Sav materijal koji čini ovaj kurs, intelektualna je svojina predavača i bilo kakva neovlašćena distribucija i umnožavanje, podleže sankcionisanju u skladu sa zakonom.
                </b>
            </p>

            <p>
                Zoom grupe u vezi određene teme zakazivaće se tokom interakcije u okviru fb grupe, pa je poželjno da i ukoliko niste korisnik ove društvene mreže, bar u ove svrhe otvorite nalog. Snimak rada grupe preko zoom-a ukoliko niste u mogućnosti da pratite direktno u predviđeno vreme, biće dostupan i kasnije, ali je više nego poželjno da prisustvujete direktnom radu.
            </p>

            <p>
                <h2 class="text-center">
                    Na ovom kursu ćete naučiti puno novih stvari. Spremite se, uskoro počinjemo sa radom!
                </h2>
            </p>

            <p>
                <h3 class="text-right">
                    Srdačan pozdrav, <br> Maja
                </h3>
            </p>

            <p class="text-center">
                <a href="{{ route('all-courses') }}" class="btn btn-success text-center btn-large mt-5 w-100">Nazad na kurseve</a>
            </p>
        
        </div>
    </div>










@endsection