@extends('layout.app')
@section('title','Show-post')
@section('content')
  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12  mx-auto">
      <a href="{{route('posts.index')}}" class="btn btn-dark">All Post</a>
        <ol>
            <li>ID :{{ $post->id }}</li>
            <li>Author Name :{{$post->category->name}}</li>
            <li>Category Name :{{$post->user->full_name}}</li>
            <li>Title :{{$post->title}}:</li>
            <li>Description :{{$post->description}}</li>
            <li>Publiction Status :{{$post->publication_status}}</li>

        </ol>

      </div>
    </div>
  </div>
@endsection