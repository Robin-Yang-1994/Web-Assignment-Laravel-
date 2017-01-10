@extends('layout')

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
