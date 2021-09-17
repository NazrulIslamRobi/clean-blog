@extends('layout.app')
@section('title','category-details')

@section('content')

<div class="container">
  
<ol>
        <li>ID : {{$category->id}}</li>
        <li>Category Name: {{$category->name}}</li>
        <li>Slug Name : {{$category->slug}}</li>
        <li>Status : {{$category->status}}</li>
        <li>created_at : {{$category->created_at}}</li>
    
    </ol>



<h3>posts under this {{$category->name}}</h3>

<table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Author Name</th>
                <th>Category</th>
                <th>Title</th>
                <th>Decription</th>
                <th>publication Status</th>
            </tr>
           
           @foreach($category->posts as $post )
           
            <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->user->full_name}}</td>
            <td>{{$category->name}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->description}}</td>
            <td>{{$post->publication_status===1 ? 'active':'inactive'}}</td>
            </tr>
           @endforeach
        
        </table>
   
    <a href="{{route('index.category')}}" class="btn btn-info">All Category</a>
</div>
@endsection