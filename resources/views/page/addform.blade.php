@extends('layout')
@extends('layouts.app')

@section('content')

  <div align="center"> {{--Add anime form--}}
    <h1>Add New Anime</h1>
    <form method="POST" action="/add/anime">
      {{csrf_field()}}
      <h3>Anime Name</h3>
      <input type="text" name="name" rows="1" cols="40">

      <h3>Year</h3>
      <input type="text" name="year" rows="1" cols="40"></br></br>

    <button type="Add" class="btn btn-primary" style="width:120px;">Add</button>
  </form><br/>

    @if(count($errors))
        @foreach ($errors->all() as $error)
        <p>{{$error}}</p> {{-- show error message if found required in the controller--}}
        @endforeach
    @endif
  </div>

@stop
