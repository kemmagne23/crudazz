@extends('master')
@section('content')
  <h1>All posts</h1>

  <div class="card mt-4">



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




            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">image</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>

                    @foreach($posts as $post)
                  <tr>


                    <th scope="row"> <a href=" {{route('posts.show', $post->id)}}"> {{$post->id}} </a></th>
                    <td>  <a href=" {{route('posts.show', $post->id)}}"> {{$post->title}} </a></td>
                    <td>  <a href=" {{route('posts.show', $post->id)}}"><img src="{{ url('public/image/'.$post->image) }}" height="100" width="130"> </a></td>


                    <td><a href="{{route('posts.edit', $post->id)}}" class="btn btn-info">Edit</a>
                        <form onsubmit="return confirm('Are you sure you want to delete this post?')" class="d-inline-block" method="post" action="{{route('posts.destroy', $post->id)}}">
                          @csrf
                          @method('delete')
                          <button type="submit" class="btn btn-danger">Delete</button>
                        </form></td>


                  </tr>
                  @endforeach
                </tbody>
              </table>




  </div>




  <div class="mt-4">
    {{$posts->links()}}
  </div>
@endsection
