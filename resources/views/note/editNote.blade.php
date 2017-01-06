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
  </form>
  </div>

  <div class="form-group2">
  <form method="POST" action="/delete/{{$notes->id}}">
    {{csrf_field()}}
      <button type="Delete" class="btn btn-primary">Delete Post</button>
    </form>
  </div>

@stop
