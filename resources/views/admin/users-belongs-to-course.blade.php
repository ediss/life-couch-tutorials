@extends('layout.admin-dashboard')
@section('page-title')
Lista Korisnika
@endsection

@section('content')
@php
$counter = 0;
@endphp
<table class="table">

    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Ime</th>
            <th scope="col">Email</th>
            <th scope="col">Naziv Kursa</th>
        </tr>
    </thead>
    <tbody>

        
        @foreach($users as $user)
        @php $counter ++; @endphp
        <tr>
            <th scope="row">{{$counter }}</th>
            <td>
                @if($user->users()->exists())
                    {{ $user->users->name }}
                @else
                    <p class='text-danger'> Korisnik je obrisan </p>
                @endif
            </td>
            <td>{{$user->users()->exists() ? $user->users->email : ''}}</td>
            <td>{{$user->courses->name}}</td>

        </tr>
        @endforeach
    </tbody>
</table>
@endsection