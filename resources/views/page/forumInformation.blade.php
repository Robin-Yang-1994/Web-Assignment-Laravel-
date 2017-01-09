@extends('layout')

@section('content')


	<h1>Anime Information</h1>

  <h2>{{$anime->name}} {{$anime->year}}</h2>

		@foreach ($anime->note as $notes)

		    <ul>
				<a method="POST" href="/home/{{$notes->id}}/edit" class="list-group-item">{{$notes->body}}</a>
				<a href="#" style="float:right"> Username: {{$notes->user->name}} </a></li>
			</ul>

		  @endforeach


				<hr>
					<h3>Add new content to forum</h3>
				<form method="POST" action="/home/{{$anime->id}}/note">
						{{csrf_field()}}
						<textarea name="body" rows="4" cols="40"></textarea>
						<br/>

						<button type="Add" class="btn btn-primary">Add</button>
							@if(count($errors))
								<ul>
									@foreach ($errors->all() as $error)
										{{$error}}
									@endforeach
								</ul>
									@endif
								</div>
						  @stop
@endsection
