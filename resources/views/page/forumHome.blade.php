@extends('layout')
@extends('layouts.app')
@section('content')

@if(Session::has('message')) {{--if user logged it, display the messaged passed by controller--}}
  <div class="alert">
    {{Session::get('message')}}
  </div>
@endif

  <div class="container">
  <form action="/home/search" method="post" role="search"> {{--search bar--}}
    {{csrf_field()}}
      <div class="input-group">
        <input type="search" class="list-group-item" name="name" placeholder="Search Anime">
          <button type="submit" class="btn btn-primary">Search</button>
      </div>
  </form></div>

      @if(isset($result))
        @if(count ($result)== 0)
          <a class="list-group-item">No results found</a> {{--display error message if no results found--}}
        @elseif (count ($result) >= 1)
        @foreach ($result as $value) {{--diplay the result if above or equal 1--}}
          <a class="list-group-item" href="/home/{{$value->id}}">{{$value->name}}</a> {{--show anime results--}}
        @endforeach
        <p>Total Results:{{count($result)}}</p> {{--count each result and display total results found--}}
        @endif
      @endif

         @foreach ($errors->all() as $error) {{--error message for empty field or none matched--}}
          <a class="list-group-item">{{$error}}</a>
        @endforeach

            @if(isset($animes)) {{--if anime object is passed, show the 5 latest anime--}}
                <h1>Latest Animes</h1>
              @foreach ($animes as $anime)
                <div>
                  <a class="list-group-item" href="/home/{{$anime->id}}">{{$anime->name}}</a>
                </div>
              </div>
              @endforeach
            @endif
        </div>
      </br>

      <div align="center"> {{--some anime new for the audience done by java script in Reddit--}}
        <h1>Anime News</h1>
        <script type="text/javascript"
        src="http://output53.rssinclude.com/output?type=js&amp;id=1115579&amp;hash=8c053379a29528cb5581632ff999e9f2">
        </script>
      </div>

@endsection
