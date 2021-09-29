@extends('layout.admin-dashboard')
@section('page-title')
    Lista korisnika
@endsection

@section('content')

<div class="row mt-5 p-5">

    <div class="col-12">
        <div class="col-12">
          @include('flash-message')
        </div>
      </div>
  
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>Ime</th>
                <th>E-mail</th>
                <th>Akcije</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
                @if($user->role_id == 1)
                    @continue
                @endif
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td><a class="btn btn-sm btn-danger" href="{{ route('admin.delete.user', ['user_id' => $user->id]) }}">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    
</div>
 
@endsection