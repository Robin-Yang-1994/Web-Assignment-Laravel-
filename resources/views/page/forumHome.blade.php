@extends('layout')
@extends('layouts.app')
@section('content')

  <div class="container">
  <form action="/home/search" method="post" role="search">
    {{csrf_field()}}
      <div class="input-group">
        <input type="text" class="list-group-item" name="name" placeholder="Search Anime">
          <button type="submit" class="btn btn-primary">Search</button>
      </div>
  </form></div>

      @if(isset($result))
        @if(count ($result)== 0)
          <a class="list-group-item">No results found</a>
        @elseif (count ($result) >= 1)
        @foreach ($result as $value)
          <a class="list-group-item" href="/home/{{$value->id}}">{{$value->name}}</a> {{--runs same method as below--}}
        @endforeach
        @endif
      @endif

         @foreach ($errors->all() as $error)
          <a class="list-group-item">{{$error}}</a>
        @endforeach

            @if(isset($animes))
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

      <div align="center">
        <h1>Anime News</h1>
        <script type="text/javascript"
        src="http://output53.rssinclude.com/output?type=js&amp;id=1115579&amp;hash=8c053379a29528cb5581632ff999e9f2">
        </script>
      </div>

@endsection
