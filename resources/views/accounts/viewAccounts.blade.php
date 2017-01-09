@extends('layout')
@extends('layouts.app')
@section('content')

<h1>Account details</h1>
<p>Name: {{$user->name}}</p>
<p>Email: {{$user->email}}</p>


<h1>My Post</h1>
@if(isset($own))
@foreach ($own as $notes)
  {{$notes->body}}
@endforeach
@endif

@endsection
