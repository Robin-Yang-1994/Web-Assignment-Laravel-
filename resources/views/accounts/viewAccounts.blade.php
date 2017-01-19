@extends('layout')
@extends('layouts.app')
@section('content')


<div align="center">

  <h1>Account details</h1> {{--show user details--}}
    <p>Name: {{$user->name}}</p>
    <p>Email: {{$user->email}}</p>

    <h1>My Posts</h1> {{--show the notes the user has posted--}}
      @if(isset($own))
        @foreach ($own as $notes)
          <li>
            <a href="/home/{{$notes->id}}/edit">{{$notes->body}}</a>
          </li>
        @endforeach
      @endif
</div>


@endsection
