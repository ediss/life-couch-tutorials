@extends('layout.admin-dashboard')
@section('page-title')
    Dodeljivanje kursa korisniku
@endsection

@section('content')
<form action="{{  route('admin.add.user.to.course', ['course_id'=> $course_id])  }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="card-body">
    <div class="row">
      <div class="col-3">
        <div class="form-group">
          <label>Izaberi korisnika</label>
          <select class="selectpicker form-control" multiple data-live-search="true" name="users[]">

            @foreach ($users as $user)
            <option value="{{$user->id}}">{{ $user->email }}</option>
            @endforeach

          </select>


        </div>
      </div>
    </div>

  </div>
  <!-- /.card-body -->

  <div class="card-footer">
    <input type="submit" class="btn btn-success" value="Dodeli korisnika">
  </div>
</form>
@endsection