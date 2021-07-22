@extends('layout.app')
@section('title')
Kontakt
@endsection

@section('meta-desc')
Za sva dodatna pitanja budite slobodni da me kontaktirate!
@endsection

@section('meta-img')
	<meta property="og:image" content="{{ url('assets/images/banners/background.png') }}" />
@endsection

@section('breadcrumb-item')
Kontakt
@endsection
@section('banner-title')
Kontakt
@endsection

@section('scroll-to')
#contact
@endsection

@section('content')

<div id="contact" class="mt-5"></div>
<section class="w3l-features-1 box-shadow add-banner mt-5">

    <div class="container contact-form">
        <div class="contact-image ">
            <i class="fa fa-paper-plane fa-5x"></i>
            <!-- <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact" /> -->
            <div class="m-5">
                @include('flash-message')
            </div>
        </div>
        <form action="{{ route('contact') }}" method="POST">
            @csrf
            <h1 class="hny-title text-center">Za sva dodatna pitanja budite slobodni da me kontaktirate!</h1>
            <div class="row mt-4">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <input type="text" name="txtName" class="form-control" placeholder="Ime i Prezime *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="email" name="txtEmail" class="form-control" placeholder="E-mail adresa*"
                            value="" />
                    </div>


                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <textarea name="txtMsg" class="form-control" placeholder="Vaša Poruka *"
                            style="width: 100%; height: 95px;"></textarea>
                    </div>

                </div>
                <div class="col-12 text-center mt-3">
                    <div class="form-group">
                        <input type="submit" name="btnSubmit" class="btnContact" value="Pošalji" />
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

@endsection