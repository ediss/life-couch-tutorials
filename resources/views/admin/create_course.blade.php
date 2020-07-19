@extends('layout.admin-dashboard')
@section('page-title')
Dodavanje kursa
@endsection

@section('content')
<form action="{{ route("admin.create-course") }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="card-body">
    <div class="row">
      <div class="col-3">
        <div class="form-group">
          <label>Naziv kursa</label>
          <input type="text" class="form-control" name="course_name" placeholder="Naziv kursa">
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
      <div class="col-3">
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
        <input type="date" class="form-control" name='course_available'>

      </div>

      <div class="col-6 text-center">
        <div class="form-group">
          <label>Kurs je aktivan do: </label>
          <input type="date" class="form-control" name='course_application_to'>
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
        <label>Premium paket</label>
        <input type="text" class="form-control" name="premium_package">
      </div>


      <div class="col-12 mt-5">
        <div class="row">
          <div class="col-6">
            <label>Rana prijava do <input type="date" name="aplication_to"> i placanje u celini</label>
            <input type="text" class="form-control" name="aplication_to_and_payfull">

          </div>
          <div class="col-6">
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
</form>



@endsection