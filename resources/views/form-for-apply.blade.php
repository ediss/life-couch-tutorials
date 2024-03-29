@php
    if(Auth::user()) {
        return redirect()->route('homepage');
    }

@endphp
@extends('layout.app')

@section('title')

{{ $course->course_name }}
@endsection

@section('meta-img')
	<meta property="og:image" content="{{ url('assets/images/banners/background.png') }}" />
@endsection

@section('banner-title')
Prijava za kurs <br>
{{ $course->course_name }}
@endsection

@section('scroll-to')
#form-apply
@endsection

@section('content')
<div id="form-apply" class="mt-5">
    <div class="row mt-5">
        <div class="col-12">
            <div class="page-content add-banner">
                <div class="form-v1-content">
                    <div class="wizard-form">
                        <form action="{{route('course.subscription', ['course_id' => $course_id])}}" method="POST" class="form-register" id="course-apply">
                            @csrf
                            <input type="hidden" name="device_id" id="device_id_subscription">
                            <input type="hidden" name="course_name" value="{{ $course->course_name }}">
                            <div id="form-total">
                                <!-- SECTION 1 -->
                                <h2>
                                    <p class="step-icon"><span>01</span></p>
                                    <span class="step-text">Lične Informacije</span>
                                </h2>
                                <section>
                                    <div class="inner">
                                        <div class="wizard-header">
                                            <h3 class="heading">Lične Informacije</h3>
                                            <p>Polja sa zvezdicom (*) su obavezna </p>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-holder form-holder-2">
                                                <fieldset>
                                                    <legend>Ime i Prezime <span class="text-danger">*</span></legend>
                                                    <input type="text" class="form-control" id="first-name" name="name" placeholder="Ime i Prezime" required>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-holder form-holder-2">
                                                <fieldset>
                                                    <legend>E-mail adresa <span class="text-danger">*</span></legend>
                                                    <input type="text" name="email" id="your_email" class="form-control" placeholder="primer@email.com" required>
                                                </fieldset>
                                                <small id="emailHelp" class="form-text text- text-danger">Ukoliko ste se već prijavljivali
                                                    na neki kurs, potrebno je da se ulogujete kako biste se prijavili.</small>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-holder form-holder-2">
                                                <fieldset>
                                                    <legend>Država <span class="text-danger">*</span></legend>
                                                    <select name="countries" class="form-control" id="countries">
                                                        @foreach($countries as $country)
                                                            <option value="{{$country['name']}}" {{$country['name'] == 'Serbia' ? 'selected' : '' }}>{{$country['name']}}</option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-holder form-holder-2 form-group">
                                                <fieldset class="form-group">
                                                    <legend>Kontakt telefon: <span class="text-danger">*</span></legend>
                                                    <div class="form-group form-inline">

                                                        <input type="text" class="form-control input-sm" name="country_code" placeholder="+381" disabled id="phone_code">
                                                        <input type="text" class="form-control" id="your_phone" name="phone" placeholder="" required>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>

                                        @if (count($errors) > 0)
                                        <div class = "alert alert-danger">
                                           <ul>
                                              @foreach ($errors->all() as $error)
                                                 <li>{{ $error }}</li>
                                              @endforeach
                                           </ul>
                                        </div>
                                        @endif
                                    </div>
                                </section>
                                <!-- SECTION 2 -->
                                <h2>
                                    <p class="step-icon"><span>02</span></p>
                                    <span class="step-text">Opšte Informacije</span>
                                </h2>
                                <section>
                                    <div class="inner">
                                        <div class="wizard-header">
                                            <h3 class="heading">Opšte Informacije</h3>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-holder form-holder-2">
                                                <fieldset>
                                                    <legend>Pol</legend>
                                                    <div class="radio">
                                                        <label for=""><input type="radio" class="w-auto" name="gender" value="male" checked><span class="ml-1">Muški</span></label>
                                                    </div>
                                                    <div class="radio">
                                                        <label class=""><input type="radio" class="w-auto" name="gender" value="female"><span class="ml-1">Ženski</span> </label>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-holder form-holder-2">
                                                <fieldset>
                                                    <legend>Godina rođenja</legend>
                                                    <select name="yob" class="form-control">
                                                        @for ($year=2015; $year >= 1900; $year--)
                                                        <option value="{{$year}}">{{ $year }}</option>
                                                        @endfor
                                                    </select>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-holder form-holder-2">
                                                <fieldset>
                                                    <legend>Status veze</legend>
                                                    <div class="radio">
                                                        <label class=""><input type="radio" class="w-auto" name="relationship" value="Nisam u vezi" checked> Nisam u vezi</label>
                                                    </div>

                                                    <div class="radio">
                                                        <label class=""><input type="radio" class="w-auto" name="relationship" value="U vezi sam"> U vezi sam</label>
                                                    </div>

                                                    <div class="radio">
                                                        <label class=""><input type="radio" class="w-auto" name="relationship" value="U braku sam"> U braku sam</label>
                                                    </div>

                                                    <div class="radio">
                                                        <label class=""><input type="radio" class="w-auto" name="relationship" value="Komplikovano je"> Komplikovano je</label>
                                                    </div>

                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-holder form-holder-2 form-group">
                                                <fieldset class="form-group">
                                                    <legend>Zanimanje</legend>
                                                    <div class="form-group form-inline">
                                                        <input type="text" class="form-control" name="profession" placeholder="Vaše zanimanje">
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <!-- SECTION 3 -->
                                <h2>
                                    <p class="step-icon"><span>03</span></p>
                                    <span class="step-text">Prijava</span>
                                </h2>
                                <section>
                                    <div class="inner">
                                        <div class="wizard-header">
                                            <h3 class="heading">Prijava</h3>
                                            <p>Polja sa zvezdicom (*) su obavezna </p>
                                        </div>
                                        @if($course->is_free == 0)
                                        <div class="form-row">
                                            <div class="form-holder form-holder-2">
                                                <fieldset>
                                                    <legend>Način plaćanja <span class="text-danger">*</span></legend>
                                                    <div class="payment-country d-flex">
                                                        <div class="radio">
                                                            <label for="">
                                                                <input type="radio" class="w-auto" name="payment_country" value="Iz Srbije" checked>
                                                                <span class="">Iz Srbije</span>
                                                            </label>
                                                        </div>
                                                        <div class="radio ml-3">
                                                            <label class="">
                                                                <input type="radio" class="w-auto" name="payment_country" value="Iz inostranstva">
                                                                <span class="">Iz inostranstva</span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="payment-method-srb mt-3">
                                                        @if($course_price->payment_in_full != "")
                                                        <div class="radio">
                                                            <label class="">
                                                                <input type="radio" class="w-auto" name="payment_method" value="U celini">
                                                                <span class="ml-1">U celini</span>
                                                            </label>
                                                        </div>
                                                        @endif

                                                        @if($course_price->premium_package != "")
                                                        <div class="radio">
                                                            <label class="">
                                                                <input type="radio" class="w-auto" name="payment_method" value="Premium paket">
                                                                <span class="ml-1">Premium paket</span>
                                                            </label>
                                                        </div>
                                                        @endif
                                                        @if($course_price->aplication_to != "")
                                                        <div class="radio">
                                                            <label class="">
                                                                <input type="radio" class="w-auto" name="payment_method" value="Prijava i plaćanje do {{ date('d-M-Y', strtotime($course_price->aplication_to)) }}">
                                                                <span class="ml-1">Prijava i plaćanje do {{ date('d-M-Y', strtotime($course_price->aplication_to)) }}</span>
                                                            </label>
                                                        </div>
                                                        @endif

                                                        <small>U ratama:</small>
                                                        @if($course_price->number_of_rate != "")
                                                        <div class="radio">
                                                            <label class="">
                                                                <input type="radio" class="w-auto" name="payment_method" value="Broj rata: {{ $course_price->number_of_rate }}">
                                                                <span class="ml-1">Broj rata: {{ $course_price->number_of_rate }}</span>
                                                            </label>
                                                        </div>
                                                        @endif

                                                        @if($course_price->number_of_rate_2 != "")
                                                        <div class="radio">
                                                            <label class="">
                                                                <input type="radio" class="w-auto" name="payment_method" value="Broj rata: {{ $course_price->number_of_rate_2 }}">
                                                                <span class="ml-1">Broj rata: {{ $course_price->number_of_rate_2 }}</span>
                                                            </label>
                                                        </div>
                                                        @endif
                                                        @if($course_price->number_of_rate_3 != "")
                                                        <div class="radio">
                                                            <label class="">
                                                                <input type="radio" class="w-auto" name="payment_method" value="Broj rata: {{ $course_price->number_of_rate_3 }}">
                                                                <span class="ml-1">Broj rata: {{ $course_price->number_of_rate_3 }}</span>
                                                            </label>
                                                        </div>
                                                        @endif

                                                        @if($course_price->weekly_srb != "")
                                                        <div class="radio">
                                                            <label class="">
                                                                <input type="radio" class="w-auto" name="payment_method" value="Nedeljno">
                                                                <span class="ml-1">Nedeljno: {{ $course_price->weekly_srb_price }}</span>
                                                            </label>
                                                        </div>
                                                        @endif

                                                        @if($course_price->monthly_srb != "")
                                                        <div class="radio">
                                                            <label class="">
                                                                <input type="radio" class="w-auto" name="payment_method" value="Mesečno">
                                                                <span class="ml-1">Mesečno: {{ $course_price->monthly_srb_price }}</span>
                                                            </label>
                                                        </div>
                                                        @endif
                                                    </div>

                                                    <div class="payment-method-foreign-contry mt-3 d-none">
                                                        @if($course_price->payment_from_foreign_countries != "")
                                                        <div class="radio">
                                                            <label class="">
                                                                <input type="radio" class="w-auto" name="payment_method" value="U celini">
                                                                <span class="ml-1">U celini</span>
                                                            </label>
                                                        </div>
                                                        @endif

                                                        @if($course_price->foreign_countries_premium_package != "")
                                                        <div class="radio">
                                                            <label class="">
                                                                <input type="radio" class="w-auto" name="payment_method" value="Premium paket">
                                                                <span class="ml-1">Premium paket</span>
                                                            </label>
                                                        </div>
                                                        @endif
                                                        @if($course_price->foreign_countries_aplication_to != "")
                                                        <div class="radio">
                                                            <label class="">
                                                                <input type="radio" class="w-auto" name="payment_method" value="Prijava i plaćanje do {{ date('d-M-Y', strtotime($course_price->foreign_countries_aplication_to)) }}">
                                                                <span class="ml-1">Prijava i plaćanje do {{ date('d-M-Y', strtotime($course_price->foreign_countries_aplication_to)) }}</span>
                                                            </label>
                                                        </div>
                                                        @endif

                                                        <small>U ratama:</small>
                                                        @if($course_price->foreign_countries_number_of_rate != "")
                                                        <div class="radio">
                                                            <label class="">
                                                                <input type="radio" class="w-auto" name="payment_method" value="Broj rata: {{ $course_price->foreign_countries_number_of_rate }}">
                                                                <span class="ml-1">Broj rata: {{ $course_price->foreign_countries_number_of_rate }}</span>
                                                            </label>
                                                        </div>
                                                        @endif

                                                        @if($course_price->foreign_countries_number_of_rate_2 != "")
                                                        <div class="radio">
                                                            <label class="">
                                                                <input type="radio" class="w-auto" name="payment_method" value="Broj rata: {{ $course_price->foreign_countries_number_of_rate_2 }}">
                                                                <span class="ml-1">Broj rata: {{ $course_price->foreign_countries_number_of_rate_2 }}</span>
                                                            </label>
                                                        </div>
                                                        @endif
                                                        @if($course_price->foreign_countries_number_of_rate_3 != "")
                                                        <div class="radio">
                                                            <label class="">
                                                                <input type="radio" class="w-auto" name="payment_method" value="Broj rata: {{ $course_price->foreign_countries_number_of_rate_3 }}">
                                                                <span class="ml-1">Broj rata: {{ $course_price->foreign_countries_number_of_rate_3 }}</span>
                                                            </label>
                                                        </div>
                                                        @endif

                                                        @if($course_price->weekly_foreign != "")
                                                        <div class="radio">
                                                            <label class="">
                                                                <input type="radio" class="w-auto" name="payment_method" value="Nedeljno">
                                                                <span class="ml-1">Nedeljno: {{ $course_price->weekly_foreign_price }}</span>
                                                            </label>
                                                        </div>
                                                        @endif

                                                        @if($course_price->monthly_foreign != "")
                                                        <div class="radio">
                                                            <label class="">
                                                                <input type="radio" class="w-auto" name="payment_method" value="Mesečno">
                                                                <span class="ml-1">Mesečno: {{ $course_price->monthly_foreign_price }}</span>
                                                            </label>
                                                        </div>
                                                        @endif
                                                    </div>

                                                </fieldset>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="form-row">
                                            <div class="form-holder form-holder-2">
                                                <fieldset>
                                                    <legend>Lozinka <span class="text-danger">*</span></legend>
                                                    <input type="password" class="form-control" name="password"
                                                    placeholder="*******" required>
                                                </fieldset>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn text-white" style="background-color: #4fab40">Završi prijavu</button>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection


@section('footer-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.js"></script>

<script type="text/javascript">
$(document).ready(function () {
    var form = $("#course-apply").show();
    $("#form-total").steps({
        headerTag: "h2",
        bodyTag: "section",
        transitionEffect: "fade",
        enableAllSteps: false,
        stepsOrientation: "vertical",
        autoFocus: true,
        transitionEffectSpeed: 500,
        titleTemplate : '<div class="title">#title#</div>',
        labels: {
            previous : '<i class="fas fa-arrow-left"></i>',
            next : '<i class="fas fa-arrow-right"></i>',
            finish : '',
            current : ''
        },
        onStepChanging: function (event, currentIndex, newIndex){

        if (currentIndex > newIndex){
            return true;
        }

        form.validate({
            rules : {
                payment_method : "required",
            },

            messages : {
                name: {
                    required: ""
                },
                email: {
                    required: ""
                },
                phone: {
                    required: ""
                },
                password : {
                    required: ""
                },

                payment_method : {
                    required: ""
                }

            },
            highlight: function(element) {
                $(element).closest("fieldset").addClass("border border-danger");
            },
            unhighlight: function(element) {
                $(element).closest("fieldset").removeClass("border-danger").addClass("border-success");
            }

        }).settings.ignore = ":disabled,:hidden";
        return form.valid();
    },
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#countries').on('change', function(){
     var country = $(this).val();
     $.ajax({
           type:'POST',
           url:"{{ route('get.phone.code') }}",
           data:{country:country},
           success:function(data){
              $("#phone_code").val(data.success);
           }
        });
    });

    $("input[name=payment_country]:radio").on("change", function() {
        $('input[name="payment_method"]').prop('checked', false);

        if (this.value == 'Iz Srbije') {
            $(".payment-method-srb").removeClass("d-none");
            $(".payment-method-foreign-contry").addClass("d-none");
        }
        else {
            $(".payment-method-srb").addClass("d-none");
            $(".payment-method-foreign-contry").removeClass("d-none");
        }
    });
});


</script>
<script src="{{ asset("assets/js/apply-form-steps.js")}}"></script>

<script>
    

</script>


<script>
    var hash= '';
        if (window.requestIdleCallback) {
    requestIdleCallback(function () {
        new Fingerprint2().get(function(result, components){

           var device_id    = $("#device_id").val();
           var device_id_2  = $("#device_id_2").val();
           var device_id_3  = $("#device_id_subscription").val();




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