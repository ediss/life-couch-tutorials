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
    @if (isset($anchor))
        <input type="hidden" name="anchor" value="{{ $anchor }}">
    @endif
</div>

    <div class="row" style="margin-top:10%; margin-bottom:10%;">
        <div class="col-8 offset-2 text-justify box-shadow" style="padding:5%">

            @if($course->is_free == 0)
                @include('partial.succes-apply-paid-course')
            @else
                @include('partial.succes-apply-free-course')
            @endif

            <p class="text-center">
                <a href="{{ route('all-courses') }}" class="btn btn-success text-center btn-large mt-5 w-100">Nazad na kurseve</a>
            </p>
        
        </div>
    </div>

@endsection

@section('footer-scripts')

<script>

$(function () {
    if ( $( "[name='anchor']" ).length ) {
        window.location = '#' + $( "[name='anchor']" ).val();
    }
});
</script>
    
@endsection