@extends('layout')

<h1 class="well well-lg">All Image List</h1>
@foreach($pictures as $picture)
    <div class="table table-bordered bg-success">
      {{-- <img scr="{!! '/pictures/'.$picture->filepath !!}"> --}}
      <a target="_blank" href="{{$picture->filepath.'.jpg'}}">
      <img style="width:300px; height:200px;" src="{{$picture->filepath.'.jpg'}}"/></div></br>
      <a>Download:{{$picture->filename}}</a>
    </div>
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
        {{$error}}
      @endforeach
    </ul>
  @endif
</form>

@if(isset($success))
    <div class="alert alert-success"> {{$success}} </div>
@endif
