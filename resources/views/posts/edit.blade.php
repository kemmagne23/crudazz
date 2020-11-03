@extends('master')
@section('content')
<h2 class="my-3">Update the post</h2>
@if($errors->all())
  <div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </div>
@endif

@if (session()->has('message'))
  <div class="alert alert-success">
    {{session()->get('message')}}
  </div>
@endif

<form action="{{route('posts.update', $post->id)}}" method="post"  enctype="multipart/form-data">
  @csrf
  @method('put')
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" class="form-control" value='{{$post->title}}'>
  </div>
  <div class="row form-group">
    <div class="col-md-6">
    <label for="content">Content</label>

    <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{$post->content}}</textarea>

    </div>

    <div class="col-md-6">
        <label for="content">Image</label>


        <div class="col-md-4  offset-md-4">

    <img src="{{ url('public/image/'.$post->image) }}" height="200" width="320">

        </div>


        <div  class="col-md-4  offset-md-4" style="margin-top: 2rem;">
            <input type="file" name="fileUpload"  class="btn btn-primary">



    </div>

    </div>


  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-outline-info">update the post</button>
  </div>
</form>
@endsection

