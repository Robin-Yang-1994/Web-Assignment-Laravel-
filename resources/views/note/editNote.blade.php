@extends('layout')
@extends('layouts.app')

@section('content')

<div align="center" class="form-group">

    <h1>Edit Note</h1>
    <h2>{{$notes->anime->name}}</h2>
		<form method="POST" action="/edit/{{$notes->id}}">
			{{method_field('PATCH')}} {{--pass patch method as post, there is no patch method in laravel--}}
			{{csrf_field()}} {{--pass a token field validation--}}
      @if(count($errors))
			<ul>
        @foreach ($errors->all() as $error)
          {{$error}} {{--post any error messages if found required in the controller--}}
          @endforeach
			</ul>
		  @endif

			<textarea name="body" rows="4" cols="40">{{$notes->body}}</textarea>
      <br></br>
			<button type="Add" class="btn btn-primary">Update</button>
  </form><br>
    @if(Auth::guest()) {{--show a certain part of the view when user guest or user--}}
    @else
  <div class="form-group2">
  <form method="POST" action="/delete/{{$notes->id}}"> {{--delete note--}}
    {{csrf_field()}}
      <button type="Delete" class="btn btn-primary" style="width:120px;">Delete Post</button>
    </form>
  </div>
@endif
</div>

@stop
