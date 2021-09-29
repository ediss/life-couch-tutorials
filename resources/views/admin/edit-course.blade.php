@extends('layout.admin-dashboard')
@section('page-title')
Izmena kursa
@endsection

@section('content')

<div id="smartwizard-edit">
  <ul class="nav">
    <li>
      <a class="nav-link" href="#step-1">
        <strong> Step 1 </strong>
        <p>Opšti podaci o kursu</p>


      </a>
    </li>
    <li>
      <a class="nav-link" href="#step-2">
        <strong> Step 2 </strong>
        <p>Dodatni podaci o kursu</p>
      </a>
    </li>
    <li>
      <a class="nav-link" href="#step-3">
        <strong> Step 3 </strong>
        <p>Opcije plaćanja</p>
      </a>
    </li>

  </ul>
  <form action="{{ route("admin.edit.course", ['course_id' => $course->id]) }}" method="POST"
    enctype="multipart/form-data">
    @csrf

    <div class="col-12">
      <div class="col-12">
        @include('flash-message')
      </div>
    </div>
    <div class="tab-content h-auto">

      <div id="step-1" class="tab-pane" role="tabpanel">
        <div class="row flex-column justify-content-center align-items-center mt-5">

          <div class="col-4">
            <div class="form-group">
              <label>Vrsta kursa</label>
              
              <div class="radio">
                <label for="">
                  <input type="radio" name="is_free" value="0" {{ $course->is_free == 0 ? 'checked' : '' }} >
                    <span class="">Placeni kurs</span>
                </label>
              </div>

              <div class="radio">
                <label for="">
                  <input type="radio" name="is_free" value="1" {{ $course->is_free == 1 ? 'checked' : '' }}>
                    <span class="">Radionica</span>
                </label>
              </div>
            </div>
          </div>

          <div class="col-4">
            <div class="form-group">
              <label>Naziv kursa</label>
              <input type="text" class="form-control" name="course_name" value="{{$course->name}}">
            </div>
          </div>
          <div class="col-4">
            <div class="form-group">
              <label>Slug</label>
              <input type="text" class="form-control" name="course_slug" value="{{$course->slug}}">
            </div>
          </div>
          <div class="col-4">
            <div class="form-group">
              <label>Intro Url</label>
              <input type="text" class="form-control" name="intro_url" value="{{$course->intro_url}}">
            </div>
          </div>

          <div class="col-4">
            <div class="form-group">
              <label>Kurs Url</label>
              <input type="text" class="form-control" name="course_url" value="{{$course->course_url}}">
            </div>
          </div>
          <div class="col-4">
            <div class="form-group">
              <label for="exampleInputFile">Naslovna Fotografija</label>
              <div class="input-group">
                <p><img src="{{ url($course->cover_img) }}" style="max-width: 50%"></p>
                <div class="custom-file">
                  <label class="form-control-label"><b>Naslovna fotografija </b></label>
                  <p><input type="file" name="cover_img" id="cover_img" /></p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-4">
            <div class="form-group">
              <label>Prijava aktivna do: </label>
              <input type="date" class="form-control" name='course_application_to'
                value="{{$course->course_application_to}}">
            </div>
          </div>

          <div class="col-4">
            <div class="form-group">
              <label>Kurs je aktivan do: </label>
              <input type="date" class="form-control" name='course_available' value="{{$course->course_available}}">
            </div>

          </div>
        </div>
      </div>
      <div id="step-2" class="tab-pane" role="tabpanel">
        <div class="row mt-5">
          <div class="col-10 offset-1">
            <div class="row">
              <div class="col-12">
                <label>Opis kursa</label>

                <textarea class="textarea form-control" placeholder="Place some text here" name="course_desc"
                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                  {{$course->description}}
                </textarea>
              </div>

              <div class="col-12">
                <label>Program kursa</label>

                <textarea class="textarea form-control" placeholder="Place some text here" name="course_program"
                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                  {{$course->plan_and_program}}
                </textarea>
              </div>

              <div class="col-12">
                <label>Sadrzaj kursa</label>

                <textarea class="textarea form-control" placeholder="Place some text here" name="course_content"
                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                  {{$course->course_content}}
                </textarea>
              </div>


              <div class="col-12">
                <label>Organizacija kursa</label>

                <textarea class="textarea form-control" placeholder="Place some text here" name="course_organisation"
                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                  {{$course->course_organisation}}
                </textarea>
              </div>
            </div>
          </div>

        </div>
      </div>
      <div id="step-3" class="tab-pane" role="tabpanel">
        <div class="row mt-5">
          <div class="col-10 offset-1">
            <div class="row ">

              <div class="col-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="from-serbia-tab" data-toggle="tab" href="#from-serbia" role="tab"
                      aria-controls="from-serbia" aria-selected="true">Iz Srbije</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="foreign-countries-tab" data-toggle="tab" href="#foreign-countries"
                      role="tab" aria-controls="foreign-countries" aria-selected="false">Iz inostranstva</a>
                  </li>
                </ul>
              </div>

              <div class="col-12">
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="from-serbia" role="tabpanel"
                    aria-labelledby="from-serbia-tab">
                    <div class="row mt-5">


                      <div class="col-4">
                        <div class="form-group">
                          <label>U celini</label>
                          <input type="text" class="form-control" name="payment_in_full"
                            value="{{$course_price->payment_in_full}}">
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                          <label>Premium paket</label>
                          <input type="text" class="form-control" name="premium_package"
                            value="{{$course_price->premium_package}}">
                        </div>
                      </div>


                      <div class="col-4">
                        <div class="form-group">
                          <label>Rana prijava do <input type="date" name="aplication_to"
                              value="{{$course_price->aplication_to}}"> i placanje u celini</label>
                          <input type="text" class="form-control" name="aplication_to_and_payfull"
                            value="{{$course_price->aplication_to_and_payfull}}">
                        </div>

                      </div>

                      <div class="col-4">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="1" name="weekly_srb" id="defaultCheck1"
                            {{ ($course_price->weekly_srb == "1") ? "checked" : ""}}>
                          <label class="form-check-label" for="defaultCheck1">
                            Nedeljno
                          </label>
                        </div>

                        <div class="form-group">
                          <input type="text" class="form-control" name="weekly_srb_price" value="{{ $course_price->weekly_srb_price }}">
                        </div>
                      </div>

                      <div class="col-4">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="1" name="monthly_srb"
                            id="defaultCheck2" {{ ($course_price->monthly_srb == "1") ? "checked" : ""}}>
                          <label class="form-check-label" for="defaultCheck2">
                            Mesečno
                          </label>
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control" name="monthly_srb_price" value="{{ $course_price->monthly_srb_price }}">
                        </div>
                      </div>



                      <div class="col-12 mt-5 mb-5">

                        <h1>Opcije za rate</h1>

                      </div>
                      <div class="col-4">
                        <div class="form-group">
                          <label>U <input type="number" name="number_of_rate" value="{{$course_price->number_of_rate}}">
                            rata</label>
                          <input type="text" class="form-control" name="price_in_rate"
                            value="{{$course_price->price_in_rate}}">
                          <small>Opcija 1 za rate</small>
                        </div>
                      </div>

                      <div class="col-4">
                        <div class="form-group">
                          <label>U <input type="number" name="number_of_rate_2"
                              value="{{$course_price->number_of_rate_2}}"> rata</label>
                          <input type="text" class="form-control" name="price_in_rate_2"
                            value="{{$course_price->price_in_rate_2}}">
                          <small>Opcija 2 za rate</small>
                        </div>
                      </div>

                      <div class="col-4">
                        <div class="form-group">
                          <label>U <input type="number" name="number_of_rate_3"
                              value="{{$course_price->number_of_rate_3}}"> rata</label>
                          <input type="text" class="form-control" name="price_in_rate_3"
                            value="{{$course_price->price_in_rate_3}}">
                          <small>Opcija 3 za rate</small>
                        </div>
                      </div>
                    </div>
                  </div>



                  <!--IZ INOSTRANSTVA-->
                  <div class="tab-pane fade" id="foreign-countries" role="tabpanel"
                    aria-labelledby="foreign-countries-tab">
                    <div class="row mt-5">




                      <div class="col-4">
                        <div class="form-group">
                          <label>U celini</label>
                          <input type="text" class="form-control" name="payment_from_foreign_countries"
                            value="{{$course_price->payment_from_foreign_countries}}">
                        </div>

                      </div>

                      <div class="col-4">
                        <div class="form-group">
                          <label>Premium paket</label>
                          <input type="text" class="form-control" name="foreign_countries_premium_package"
                            value="{{$course_price->foreign_countries_premium_package}}">
                        </div>
                      </div>


                      <div class="col-4">
                        <div class="form-group">
                          <label>Rana prijava do <input type="date" name="foreign_countries_aplication_to"
                              value="{{$course_price->foreign_countries_aplication_to}}"> i placanje u
                            celini</label>
                          <input type="text" class="form-control" name="foreign_countries_aplication_to_and_payfull"
                            value="{{$course_price->foreign_countries_aplication_to_and_payfull}}">
                        </div>
                      </div>

                      <div class="col-4">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="1" name="weekly_foreign"
                            id="defaultCheck1" {{ ($course_price->weekly_foreign == "1") ? "checked" : ""}}>
                          <label class="form-check-label" for="defaultCheck1">
                            Nedeljno
                          </label>
                        </div>

                        <div class="form-group">
                          <input type="text" class="form-control" name="weekly_foreign_price" value="{{ $course_price->weekly_foreign_price }}">
                        </div>
                      </div>

                      <div class="col-4">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="1" name="monthly_foreign"
                            id="defaultCheck2" {{ ($course_price->monthly_foreign == "1") ? "checked" : ""}}>
                          <label class="form-check-label" for="defaultCheck2">
                            Mesečno
                          </label>
                        </div>

                        <div class="form-group">
                          <input type="text" class="form-control" name="monthly_foreign_price" value="{{ $course_price->monthly_foreign_price }}">
                        </div>
                      </div>





                      <div class="col-12 mt-5 mb-5">

                        <h1>Opcije za rate</h1>

                      </div>
                      <div class="col-4">
                        <div class="form-group">
                          <label>U <input type="number" name="foreign_countries_number_of_rate"
                              value="{{$course_price->foreign_countries_number_of_rate}}"> rata</label>
                          <input type="text" class="form-control" name="payment_from_foreign_countries_in_rate"
                            value="{{$course_price->payment_from_foreign_countries_in_rate}}">
                          <small>Opcija 1 za rate</small>
                        </div>
                      </div>

                      <div class="col-4">
                        <div class="form-group">
                          <label>U <input type="number" name="foreign_countries_number_of_rate_2"
                              value="{{$course_price->foreign_countries_number_of_rate_2}}"> rata</label>
                          <input type="text" class="form-control" name="payment_from_foreign_countries_in_rate_2"
                            value="{{$course_price->payment_from_foreign_countries_in_rate_2}}">
                          <small>Opcija 2 za rate</small>
                        </div>
                      </div>

                      <div class="col-4">
                        <div class="form-group">
                          <label>U <input type="number" name="foreign_countries_number_of_rate_3"
                              value="{{$course_price->foreign_countries_number_of_rate_3}}"> rata</label>
                          <input type="text" class="form-control" name="payment_from_foreign_countries_in_rate_3"
                            value="{{$course_price->payment_from_foreign_countries_in_rate_3}}">
                          <small>Opcija 3 za rate</small>
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



    </div>
  </form>

</div>
@endsection