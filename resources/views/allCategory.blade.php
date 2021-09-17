@extends('layout.app')
@section('title','All-category')
@section('content')
  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 mx-auto">
        <a href="{{route('show.category')}}" class="btn btn-danger">Add Category</a>
        
        <br>
        <br>
        <h3>Category List</h3>
        <table class="table table-bordered ">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category Name</th>
                <th>Slug Name</th>
                <th>status</th>
                <th>Action</th>
            </tr>
            </thead>
           <tbody>
           @foreach($category as $categories)
            <tr>
            <td>{{$categories->id}}</td>
            <td>{{$categories->name}}</td>
            <td>{{$categories->slug}}</td>
            <td>{{$categories->status=== 1 ? 'active':'inactive'}}</td>
            <td>
            <a href="{{route('edit.category',$categories->id)}}" class='btn btn-sm btn-primary'>Edit</a>
            <a href="{{route('details.category',$categories->id)}}" class='btn btn-success'>Details</a>

           
          <form class='d-inline' action="{{route('delete.category',$categories->id)}}" method="post">
           @csrf
           @method('DELETE')
            <button type='submit' class='btn  btn-danger' onClick="return confirm('are you sure')">Delete</button>
          </form>


            </td>
            </tr>
            @endforeach
            </tbody>
           
  
        </table>  
        {!! $category->links() !!}
      </div>
    </div>
  </div>
  
@endsection