@extends('layout.admin-dashboard')
@section('page-title')
    Lista kurseva
@endsection

@section('content')

<div class="row mt-5 p-5">
  
    @foreach ($courses as $course)
    <div class=" col-lg-4">
        <div class="card">
            
            <div class="card-body">
              <h5 class="card-title">{{$course->name}}</h5>
              {{-- <p class="card-text">Broj pretplatnika : {{ count() }}</p> --}}
            </div>
            <div class="btn-group p-3" role="group" aria-label="Basic example">
                <a href="{{ route('admin.add.user.to.course', ['course_id'=> $course->id]) }}"  class="btn btn-primary m-1">Dodaj korisnika</a>
                <a href="{{ route('admin.edit.course',['course_id'=> $course->id]) }}"  class="btn btn-success m-1">Izmeni kurs</a>
                <a href="{{ route('admin.delete.course', ['course_id'=> $course->id]) }}" class="btn btn-danger m-1" onclick="return confirm('Da li ste sigurni?');">Ukloni kurs</a>
              </div>
            <div class="card-footer">
              <small class="text-muted">Aktivan do: </small>
            </div>
          </div>
    </div>
    
    @endforeach
</div>
 
@endsection