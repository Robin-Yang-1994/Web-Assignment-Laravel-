@extends('layout')
@extends('layouts.app')
@section('content')


	<h1 align="center">Anime Information</h1>

  <h2 align="center">Anime: {{$anime->name}}
		<br>
		 Year: {{$anime->year}}</h2>

		@foreach ($anime->note as $notes)
		    <ul>
				<a method="POST" href="/home/{{$notes->id}}/edit">{{$notes->body}}</a>
				<p style="float:right; padding-right:50px;">Posted By: {{$notes->user->name}} On: {{$notes->created_at}}</p>
			</ul>
	  @endforeach

		@if (Auth::guest()){{--show this section below only if a user has been logged in--}}
		@else
						<hr>
							<div align="center"> {{--Add note form--}}
							<h3>Add new content to forum</h3>
							<form method="POST" action="/home/{{$anime->id}}/note">
							{{csrf_field()}}
							<textarea name="body" rows="4" cols="40"></textarea>
									<br/>
							<button type="Add" class="btn btn-primary">Add</button>
								@if(count($errors))
									<ul>
										@foreach ($errors->all() as $error)
										 <p>{{$error}}</p>
										@endforeach
									</ul>
								@endif
							</div>
		@endif
@stop
