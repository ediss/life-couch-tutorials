@extends('layout.admin-dashboard')
@section('page-title')
Dodavanje kursa
@endsection

@section('content')
{{-- <form action="{{ route("admin.create-course") }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="card-body">
  <div class="row">
    <div class="col-2">
      <div class="form-group">
        <label>Naziv kursa</label>
        <input type="text" class="form-control" name="course_name" placeholder="Naziv kursa">
      </div>
    </div>
    <div class="col-2">
      <div class="form-group">
        <label>Slug</label>
        <input type="text" class="form-control" name="course_slug" placeholder="Naziv-kursa-sa-crticama">
      </div>
    </div>
    <div class="col-3">
      <div class="form-group">
        <label>Intro Url</label>
        <input type="text" class="form-control" name="intro_url">
      </div>
    </div>

    <div class="col-3">
      <label>Kurs Url</label>
      <input type="text" class="form-control" name="course_url">
    </div>
    <div class="col-2">
      <div class="form-group">
        <label for="exampleInputFile">Naslovna Fotografija</label>
        <div class="input-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="cover_img">
            <label class="custom-file-label" for="exampleInputFile">Izaberite</label>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12">
      <label>Opis kursa</label>

      <textarea class="textarea form-control" placeholder="Place some text here" name="course_desc"
        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
    </div>

    <div class="col-12">
      <label>Program kursa</label>

      <textarea class="textarea form-control" placeholder="Place some text here" name="course_program"
        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
    </div>

    <div class="col-12">
      <label>Sadrzaj kursa</label>

      <textarea class="textarea form-control" placeholder="Place some text here" name="course_content"
        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
    </div>


    <div class="col-12">
      <label>Organizacija kursa</label>

      <textarea class="textarea form-control" placeholder="Place some text here" name="course_organisation"
        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
    </div>

    <div class="col-6 text-center">
      <label>Prijava aktivna do: </label>
      <input type="date" class="form-control" name='course_application_to'>

    </div>

    <div class="col-6 text-center">
      <div class="form-group">
        <label>Kurs je aktivan do: </label>
        <input type="date" class="form-control" name='course_available'>
      </div>

    </div>

    <div class="col-12 text-center">
      <label>
        <h1>Cenovnik</h1>
      </label>
    </div>

    <div class="col-4">
      <label>U celini</label>
      <input type="text" class="form-control" name="payment_in_full">
    </div>

    <div class="col-4">
      <label>Iz inostranstva</label>
      <input type="text" class="form-control" name="payment_from_foreign_countries">

    </div>

    <div class="col-4">
      <label>Iz inostranstva (u ratama)</label>
      <input type="text" class="form-control" name="payment_from_foreign_countries_in_rate">

    </div>




    <div class="col-12 mt-5">
      <div class="row">
        <div class="col-4">
          <label>Premium paket</label>
          <input type="text" class="form-control" name="premium_package">
        </div>
        <div class="col-4">
          <label>Rana prijava do <input type="date" name="aplication_to"> i placanje u celini</label>
          <input type="text" class="form-control" name="aplication_to_and_payfull">

        </div>
        <div class="col-4">
          <label>U <input type="number" name="number_of_rate"> rata</label>
          <input type="text" class="form-control" name="price_in_rate">
        </div>
      </div>
    </div>


  </div>




</div>
<!-- /.card-body -->

<div class="card-footer">
  <input type="submit" class="btn btn-success" value="Dodaj kurs">
</div>

@if (count($errors) > 0)

<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
</form> --}}


<div id="smartwizard">
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
  <form action="{{ route("admin.create-course") }}" method="POST" enctype="multipart/form-data">
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
              <label>Naziv kursa</label>
              <input type="text" class="form-control" name="course_name" placeholder="Naziv kursa">
            </div>
          </div>
          <div class="col-4">
            <div class="form-group">
              <label>Slug</label>
              <input type="text" class="form-control" name="course_slug" placeholder="Naziv-kursa-sa-crticama">
            </div>
          </div>
          <div class="col-4">
            <div class="form-group">
              <label>Intro Url</label>
              <input type="text" class="form-control" name="intro_url">
            </div>
          </div>

          <div class="col-4">
            <div class="form-group">
              <label>Kurs Url</label>
              <input type="text" class="form-control" name="course_url">
            </div>
          </div>
          <div class="col-4">
            <div class="form-group">
              <label for="exampleInputFile">Naslovna Fotografija</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="cover_img">
                  <label class="custom-file-label" for="exampleInputFile">Izaberite</label>
                </div>
              </div>
            </div>
          </div>

          <div class="col-4">
            <div class="form-group">
              <label>Prijava aktivna do: </label>
              <input type="date" class="form-control" name='course_application_to'>
            </div>
          </div>

          <div class="col-4">
            <div class="form-group">
              <label>Kurs je aktivan do: </label>
              <input type="date" class="form-control" name='course_available'>
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
                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </div>

              <div class="col-12">
                <label>Program kursa</label>

                <textarea class="textarea form-control" placeholder="Place some text here" name="course_program"
                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </div>

              <div class="col-12">
                <label>Sadrzaj kursa</label>

                <textarea class="textarea form-control" placeholder="Place some text here" name="course_content"
                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </div>


              <div class="col-12">
                <label>Organizacija kursa</label>

                <textarea class="textarea form-control" placeholder="Place some text here" name="course_organisation"
                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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
                          <input type="text" class="form-control" name="payment_in_full">
                        </div>
                      </div>

                      {{-- <div class="col-4">
                        <div class="form-group">
                          <label>Iz inostranstva</label>
                          <input type="text" class="form-control" name="payment_from_foreign_countries">
                        </div>

                      </div>

                      <div class="col-4">
                        <div class="form-group">
                          <label>Iz inostranstva (u ratama)</label>
                          <input type="text" class="form-control" name="payment_from_foreign_countries_in_rate">
                        </div>

                      </div> --}}

                      <div class="col-4">
                        <div class="form-group">
                          <label>Premium paket</label>
                          <input type="text" class="form-control" name="premium_package">
                        </div>
                      </div>

                      <div class="col-4">
                        <div class="form-group">
                          <label>Rana prijava do <input type="date" name="aplication_to"> i placanje u celini</label>
                          <input type="text" class="form-control" name="aplication_to_and_payfull">
                        </div>

                      </div>
                      <div class="col-12 mt-5 mb-5">

                        <h1>Opcije za rate</h1>

                      </div>
                      <div class="col-4">
                        <div class="form-group">
                          <label>U <input type="number" name="number_of_rate"> rata</label>
                          <input type="text" class="form-control" name="price_in_rate">
                          <small>Opcija 1 za rate</small>
                        </div>
                      </div>

                      <div class="col-4">
                        <div class="form-group">
                          <label>U <input type="number" name="number_of_rate_2"> rata</label>
                          <input type="text" class="form-control" name="price_in_rate_2">
                          <small>Opcija 2 za rate</small>
                        </div>
                      </div>

                      <div class="col-4">
                        <div class="form-group">
                          <label>U <input type="number" name="number_of_rate_3"> rata</label>
                          <input type="text" class="form-control" name="price_in_rate_3">
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
                          <input type="text" class="form-control" name="payment_from_foreign_countries">
                        </div>

                      </div>

                      <div class="col-4">
                        <div class="form-group">
                          <label>Premium paket</label>
                          <input type="text" class="form-control" name="foreign_countries_premium_package">
                        </div>
                      </div>

                      <div class="col-4">
                        <div class="form-group">
                          <label>Rana prijava do <input type="date" name="foreign_countries_aplication_to"> i placanje u celini</label>
                          <input type="text" class="form-control" name="foreign_countries_aplication_to_and_payfull">
                        </div>

                      </div>
                      <div class="col-12 mt-5 mb-5">

                        <h1>Opcije za rate</h1>

                      </div>
                      <div class="col-4">
                        <div class="form-group">
                          <label>U <input type="number" name="foreign_countries_number_of_rate"> rata</label>
                          <input type="text" class="form-control" name="payment_from_foreign_countries_in_rate">
                          <small>Opcija 1 za rate</small>
                        </div>
                      </div>

                      <div class="col-4">
                        <div class="form-group">
                          <label>U <input type="number" name="foreign_countries_number_of_rate_2"> rata</label>
                          <input type="text" class="form-control" name="payment_from_foreign_countries_in_rate_2">
                          <small>Opcija 2 za rate</small>
                        </div>
                      </div>

                      <div class="col-4">
                        <div class="form-group">
                          <label>U <input type="number" name="foreign_countries_number_of_rate_3"> rata</label>
                          <input type="text" class="form-control" name="payment_from_foreign_countries_in_rate_3">
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