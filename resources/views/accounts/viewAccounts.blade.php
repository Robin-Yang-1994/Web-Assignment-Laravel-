@extends('layout')
@extends('layouts.app')
@section('content')

<h1>Account details</h1>
@if(isset($user))
<p>Name: {{$user->name}}</p>
<p>Email: {{$user->email}}</p>
@endif

<form method="POST" action="/profile/notes">
  {{csrf_field()}}
  <button type="Add" class="btn btn-lg btn-info collapsed" data-toggle="collapse"
          data-target="#demo">Show MyPost</button> {{--need to check on this--}}
    <div id="demo" class="collapse">
      @if(isset($own))
        @foreach ($own as $notes)
          <p>{{$notes->body}}</p>
    @endforeach
  @endif
  </div>
</form>

@endsection
