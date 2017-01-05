@extends('layout')

@section('content')

  <a href="http://localhost:8000/home">Home</a>

	<h1>Edit Note</h1>

	<div class="form-group">
		<form method="POST" action="/edit/{{$notes->id}}">
			{{method_field('PATCH')}}

			{{csrf_field()}}
			<textarea name="body" rows="4" cols="40">{{$notes->body}}</textarea>
      <br>
			<button type="Add" class="btn btn-primary">Update</button>
      @if(count($errors))
			<ul>
				@foreach ($errors->all() as $error)
					{{$error}}
				@endforeach
			</ul>
		@endif
  </div>


@stop
