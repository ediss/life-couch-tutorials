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
        @dd($users)
        <tr>
            <th scope="row">{{$counter }}</th>
            <td>{{$user->users->name}}</td>
            <td>{{$user->users->email}}</td>
            <td>{{$user->courses->name}}</td>

        </tr>
        @endforeach
    </tbody>
</table>
@endsection