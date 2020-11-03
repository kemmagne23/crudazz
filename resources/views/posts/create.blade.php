@extends('master')
@section('content')
<h2 class="my-3">Add a post</h2>
@if($errors->all())
  <div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </div>
@endif
<form action="{{route('posts.store')}}" method="post"  enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" class="form-control">
  </div>
  <div class="form-group">
    <label for="content">Content</label>
    <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
  </div>
  <div class="row">

    <div class="col-md-6">
        <input type="file" name="fileUpload"  class="btn btn-primary">
    </div>


    <div class="col-md-6">
        <button type="submit" class="btn btn-outline-info">Add a post</button>
    </div>


  </div>
</form>
@endsection

