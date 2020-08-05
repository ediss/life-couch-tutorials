@extends('layout.app')

@section('title')
{{ $course_name }}
@endsection

@section('banner-title')
Prijava za kurs <br>
{{ $course_name }}
@endsection

@section('content')
<div id="form-apply" class="mt-5">
    <div class="row mt-5">

        <div class="col-8 offset-2 box-shadow p-5">
            @include('flash-message')
            <small id="emailHelp" class="form-text text- text-danger">Sva polja su obavezna.</small>
            <form action="{{route('course.subscription', ['course_id' => $course_id])}}" method="POST">
                @csrf
                <input type="hidden" name="device_id" id="device_id_subscription">
                <input type="hidden" name="course_name" value="{{ $course_name }}">
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
                    <label>Pol:</label> <br>
                    <div class="radio">
                        <label class=""><input type="radio" name="gender" value="male" checked>Muski</label>
                    </div>

                    <div class="radio">
                        <label class=""><input type="radio" name="gender" value="female">Zenski</label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Status veze:</label> <br>
                    <div class="radio">
                        <label class=""><input type="radio" name="relationship" value="Nisam u vezi" checked> Nisam u vezi</label>
                    </div>

                    <div class="radio">
                        <label class=""><input type="radio" name="relationship" value="U vezi sam"> U vezi sam</label>
                    </div>

                    <div class="radio">
                        <label class=""><input type="radio" name="relationship" value="U braku sam"> U braku sam</label>
                    </div>

                    <div class="radio">
                        <label class=""><input type="radio" name="relationship" value="Komplikovano je"> Komplikovano je</label>
                    </div>

                </div>

                <div class="form-group">
                    <label>Zanimanje</label>
                    <input type="text" class="form-control" name="profession" placeholder="Vase zanimanje">
                </div>

                <div class="form-group">
                    <label>Zemlja</label>


                        <select name="countries" class="form-control" id="countries">
                            @foreach($countries as $country)
                                <option value="{{$country['name']}}" {{$country['name'] == 'Serbia' ? 'selected' : '' }}>{{$country['name']}}</option>
                            @endforeach
                        </select>
                </div>

                <div class="form-group">
                    <label>Kontakt telefon:</label>
                    <div class="form-group form-inline">

                        <input type="text" class="form-control input-sm" name="country_code" placeholder="+381" disabled id="phone_code">
                        <input type="text" class="form-control" name="phone" placeholder="Vas broj telefona" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>E-mail adresa</label>
                    <input type="email" class="form-control" name="email" aria-describedby="emailHelp"
                        placeholder="nikola@gmail.com">
                    <small id="emailHelp" class="form-text text- text-danger">Ukoliko ste se vec prijavljivali
                        na neki kurs, potrebno je da se ulogujete kako biste se prijavili.</small>
                </div>

                <div class="form-group">
                    <label>Lozinka</label>
                    <input type="password" class="form-control" name="password"
                        placeholder="*******">
                </div>



                <div class="modal-footer">
                 <a href="{{ url()->previous() }}" class="btn btn-secondary btn-lg">Odustani</a>
                    <button type="submit" class="btn btn-success btn-lg">Prijavi me</button>
                </div>

            </form>

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
    </div>
</div>
@endsection


@section('footer-scripts')

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
<script type="text/javascript">

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
</script>


@endsection