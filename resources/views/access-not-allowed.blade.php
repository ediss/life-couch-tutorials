@extends('layout.app')

@section('content')

<div class="col-8 offset-2" id="scroll-section">
    <div class="alert alert-danger text-center" role="alert" style="margin-top:25%">
        Pokusavate da pristupite kursu sa treceg uredjaja. Pristup je dozvoljen samo za 2 
        uredjaja!
    </div>
</div>

<div class="col-8 offset-2 text-center">
<h1>UKOLIKO SMATRATE DA JE DOŠLO DO GREŠKE MOLIMO  <br> <i> <u> <a href="{{route('contact')}}#contact">KONTAKTIRAJTE NAS</a> </u> </i></h1>
</div>
@endsection