@extends('layout')
@extends('layouts.app')
@section('content')

<h1>All Image List</h1>
@foreach($pictures as $picture)
    <div class="form-group">
      <a target="_blank" href="{{$picture->filepath.'.jpg'}}">
      <img style="width:300px; height:200px;" src="{{$picture->filepath.'.jpg'}}"/></div>
      <a href="{{$picture->filepath.'.jpg'}}" download>Download: {{$picture->filename}}</a>
    </div> {{--finds and display images saved in the public tmp folder--}}
@endforeach

<form action="/upload" method="post" enctype="multipart/form-data">
  {{csrf_field()}}
    <h3>Select image to upload:</h3>
    <input type="file" name="file">
    <h3>File name:</h3>
    <textarea name="filename" rows="1" cols="10"></textarea></br>
    <input type="submit" value="Upload Image" name="submit">
    @if(count($errors))
    <ul>
      @foreach ($errors->all() as $error)
        <p>{{$error}}</p>
      @endforeach
    </ul>
  @endif
</form>

@if(isset($success))
    <div class="alert alert-success">
      <p>{{$sucess()}}</p>
    </div>
@endif

@stop
