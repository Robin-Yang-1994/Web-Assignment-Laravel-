@extends('layout')
@extends('layouts.app')

@section('content')

  {{-- <a href="http://localhost:8000/home">Home</a> --}}
<div align="center" class="form-group">

    <h1>Edit Note</h1>
    <h2>{{$notes->anime->name}}</h2>
		<form method="POST" action="/edit/{{$notes->id}}">
			{{method_field('PATCH')}}

			{{csrf_field()}}

      @if(count($errors))
			<ul>
        @foreach ($errors->all() as $error){{$error}}
          @endforeach
			</ul>
		  @endif
			<textarea name="body" rows="4" cols="40">{{$notes->body}}</textarea>
      <br></br>
			<button type="Add" class="btn btn-primary">Update</button>
  </form><br>
@if(Auth::guest())
@else
  <div class="form-group2">
  <form method="POST" action="/delete/{{$notes->id}}">
    {{csrf_field()}}
      <button type="Delete" class="btn btn-primary">Delete Post</button>
    </form>
  </div>
@endif
</div>

@stop
