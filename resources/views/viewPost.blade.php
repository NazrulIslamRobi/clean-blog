@extends('layout.app')
@section('title','All-category')
@section('content')
  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12  mx-auto">
      <a href="{{route('posts.create')}}" class="btn btn-dark">Write Post</a>
        
        <br>
        <br>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Author Name</th>
                <th>Category</th>
                <th>Title</th>
                <th>Decription</th>
                <th>publication Status</th>
                <th>Action</th>
            </tr>
           
           @foreach($posts as $post)
            <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->user->full_name}}</td>
            <td>{{$post->category->name}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->description}}</td>
            <td>{{$post->publication_status===1 ? 'active':'inactive'}}</td>
            <td>
            <a href="{{route('posts.edit',$post->id)}}" class='btn btn-sm btn-primary'>Edit</a>
            <a href="" class='btn btn-sm btn-danger' id="delete">Delete</a>
            <a href="{{route('posts.show',$post->id)}}" class='btn btn-success'>View</a>
            </td>
            </tr>
           @endforeach
          
        </table>
        {{$posts->links()}}
      </div>
    </div>
  </div>
@endsection